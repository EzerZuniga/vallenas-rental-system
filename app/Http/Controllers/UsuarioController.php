<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Actividad;

class UsuarioController extends Controller
{
    public function dashboard()
    {
        $usuario = auth()->user();

        $stats = [
            'proyectos_asignados' => $usuario->proyectos()->count(),
            'proyectos_activos' => $usuario->proyectos()->where('estado', 'en_progreso')->count(),
        ];

        return view('usuarios.dashboard', compact('usuario', 'stats'));
    }

    public function perfil()
    {
        $usuario = auth()->user();
        return view('usuarios.perfil', compact('usuario'));
    }

    public function actualizarPerfil(Request $request)
    {
        $usuario = auth()->user();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'empresa' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'avatar.image' => 'El archivo debe ser una imagen',
            'avatar.max' => 'La imagen no debe superar 2MB',
        ]);

        $data = $request->only(['nombre', 'apellido', 'telefono', 'empresa', 'cargo']);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '_' . $usuario->_id . '.' . $avatar->extension();
            $avatar->storeAs('avatars', $filename, 'public');
            $data['avatar'] = $filename;
        }

        $usuario->update($data);

        return back()->with('success', 'Perfil actualizado exitosamente.');
    }

    public function cambiarPassword(Request $request)
    {
        $request->validate([
            'password_actual' => 'required',
            'password' => 'required|min:6|confirmed',
        ], [
            'password_actual.required' => 'La contraseña actual es obligatoria',
            'password.required' => 'La nueva contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        $usuario = auth()->user();

        if (!Hash::check($request->password_actual, $usuario->password)) {
            return back()->withErrors(['password_actual' => 'La contraseña actual es incorrecta']);
        }

        $usuario->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Contraseña actualizada exitosamente.');
    }

    public function configuracion()
    {
        $usuario = auth()->user();
        return view('usuarios.configuracion', compact('usuario'));
    }

    public function actualizarConfiguracion(Request $request)
    {
        $usuario = auth()->user();

        $preferencias = [
            'notificaciones_email' => $request->boolean('notificaciones_email'),
            'notificaciones_sms' => $request->boolean('notificaciones_sms'),
            'idioma' => $request->input('idioma', 'es'),
            'tema' => $request->input('tema', 'light'),
        ];

        $usuario->update([
            'preferencias' => $preferencias,
        ]);

        return back()->with('success', 'Configuración actualizada exitosamente.');
    }

    public function index(Request $request)
    {
        $query = Usuario::query();

        if ($request->has('rol') && $request->rol) {
            $query->where('rol', $request->rol);
        }

        if ($request->has('buscar') && $request->buscar) {
            $buscar = $request->buscar;
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                    ->orWhere('apellido', 'like', "%{$buscar}%")
                    ->orWhere('email', 'like', "%{$buscar}%");
            });
        }

        $usuarios = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.gestion-usuarios', compact('usuarios'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id . ',_id',
            'rol' => 'required|in:admin,manager,operator,client',
            'estado' => 'required|in:activo,inactivo,suspendido',
        ]);

        $usuario->update($request->all());

        return back()->with('success', 'Usuario actualizado exitosamente.');
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed',
            'rol' => 'required|in:admin,manager,operator,client',
        ]);

        $data = $request->only(['nombre', 'apellido', 'email', 'rol']);
        $data['password'] = Hash::make($request->password);
        $data['estado'] = $request->input('estado', 'activo');

        $usuario = Usuario::create($data);

        // Registrar actividad
        Actividad::create([
            'usuario_id' => auth()->id(),
            'accion' => 'Creó usuario: ' . $usuario->getNombreCompletoAttribute(),
            'modulo' => 'Usuarios',
            'icono' => 'user-plus',
            'metadata' => ['usuario_id' => $usuario->id],
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);

        if ($usuario->_id == auth()->id()) {
            return back()->withErrors(['error' => 'No puedes eliminar tu propia cuenta.']);
        }

        $usuario->delete();

        return back()->with('success', 'Usuario eliminado exitosamente.');
    }
}
