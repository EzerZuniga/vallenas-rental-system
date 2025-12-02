<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\MaquinariaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login');
        Route::get('/registro', 'showRegister')->name('registro');
        Route::post('/registro', 'register');
        // Recuperación de contraseña (alias a las convenciones de Laravel)
        Route::get('/recuperar-password', 'showForgotPassword')->name('password.request');
        Route::post('/recuperar-password', 'sendResetLink')->name('password.email');
    });
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::controller(EmpresaController::class)->prefix('empresa')->name('empresa.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/historia', 'historia')->name('historia');
    Route::get('/valores', 'valores')->name('valores');
    Route::get('/certificaciones', 'certificaciones')->name('certificaciones');
    Route::get('/sobre-nosotros', 'sobreNosotros')->name('sobre-nosotros');
});

Route::controller(ServicioController::class)->prefix('servicios')->name('servicios.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show')->whereNumber('id');
});

Route::controller(MaquinariaController::class)->prefix('maquinaria')->name('maquinaria.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show')->whereNumber('id');
});

Route::controller(ProyectoController::class)->prefix('proyectos')->name('proyectos.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}', 'show')->name('show')->whereNumber('id');
});

Route::controller(BlogController::class)->prefix('blog')->name('blog.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('show')->where('slug', '[a-z0-9\-]+');
});

// Newsletter (temporario): evita error de ruta no definida
Route::post('/newsletter/subscribe', function () {
    return redirect()->back()->with('success', '¡Gracias por suscribirte!');
})->name('newsletter.subscribe');

Route::prefix('contacto')->name('contacto.')->group(function () {
    Route::get('/', function () {
        return view('contacto.index');
    })->name('index');

    // Procesa el formulario de contacto
    Route::post('/enviar', function (\Illuminate\Http\Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string|max:120',
            'email' => 'required|email',
            'telefono' => 'required|string|max:30',
            'empresa' => 'nullable|string|max:150',
            'asunto' => 'required|string|in:cotizacion,alquiler,servicio,proyecto,otro',
            'mensaje' => 'required|string|max:2000',
        ]);

        // Aquí podrías enviar correo o guardar en BD. Por ahora, solo confirmamos.
        return back()->with('success', '¡Gracias! Hemos recibido tu mensaje y te contactaremos pronto.');
    })->name('enviar');

    Route::get('/soporte', function () {
        return view('contacto.soporte');
    })->name('soporte');

    Route::post('/soporte', function (\Illuminate\Http\Request $request) {
        $data = $request->validate([
            'tipo_solicitud' => 'required|string',
            'prioridad' => 'required|string',
            'nombre' => 'required|string|max:120',
            'email' => 'required|email',
            'telefono' => 'required|string|max:30',
            'empresa' => 'nullable|string|max:150',
            'equipo_afectado' => 'nullable|string|max:200',
            'asunto' => 'required|string|max:200',
            'descripcion' => 'required|string|max:2000',
            'archivo' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        ]);

        // Aquí podrías procesar el archivo, enviar correo o guardar en BD
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            // $path = $archivo->store('soporte', 'public');
        }

        return back()->with('success', '¡Ticket creado exitosamente! Te contactaremos pronto. Número de ticket: #' . rand(1000, 9999));
    })->name('soporte.store');

    Route::get('/ubicacion', function () {
        return view('contacto.ubicacion');
    })->name('ubicacion');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UsuarioController::class, 'dashboard'])->name('usuario.dashboard');

    Route::controller(UsuarioController::class)->group(function () {
        Route::prefix('perfil')->name('usuario.')->group(function () {
            Route::get('/', 'perfil')->name('perfil');
            Route::put('/', 'actualizarPerfil')->name('actualizar-perfil');
            Route::post('/cambiar-password', 'cambiarPassword')->name('cambiar-password');
        });

        Route::prefix('configuracion')->name('usuario.')->group(function () {
            Route::get('/', 'configuracion')->name('configuracion');
            Route::put('/', 'actualizarConfiguracion')->name('actualizar-configuracion');
        });
    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::prefix('usuarios')->name('usuarios.')->controller(UsuarioController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update')->whereNumber('id');
        Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
    });

    Route::prefix('maquinaria')->name('maquinaria.')->group(function () {
        Route::get('/', [AdminController::class, 'gestionMaquinaria'])->name('index');
        Route::get('/create', [MaquinariaController::class, 'create'])->name('create');
        Route::controller(MaquinariaController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update')->whereNumber('id');
            Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
        });
    });

    Route::prefix('proyectos')->name('proyectos.')->group(function () {
        Route::get('/', [AdminController::class, 'gestionProyectos'])->name('index');
        Route::get('/create', [ProyectoController::class, 'create'])->name('create');
        Route::controller(ProyectoController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update')->whereNumber('id');
            Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
            Route::patch('/{id}/avance', 'actualizarAvance')->name('avance')->whereNumber('id');
        });
    });

    Route::prefix('servicios')->name('servicios.')->group(function () {
        Route::get('/', [AdminController::class, 'gestionServicios'])->name('index');
        Route::get('/create', [ServicioController::class, 'create'])->name('create');
        Route::controller(ServicioController::class)->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update')->whereNumber('id');
            Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');
        });
    });

    Route::get('/reportes', [AdminController::class, 'reportes'])->name('reportes');
});
