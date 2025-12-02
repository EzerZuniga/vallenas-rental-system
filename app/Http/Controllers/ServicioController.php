<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index(Request $request)
    {
        $query = Servicio::where('estado', 'activo');

        if ($request->has('tipo') && $request->tipo) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->has('categoria') && $request->categoria) {
            $query->where('categoria', $request->categoria);
        }

        $servicios = $query->orderBy('nombre', 'asc')->paginate(12);
        $tipos = Servicio::distinct('tipo')->pluck('tipo');

        return view('servicios.index', compact('servicios', 'tipos'));
    }

    public function create()
    {
        return view('admin.servicios.create');
    }

    public function show($id)
    {
        $servicio = Servicio::where('estado', 'activo')->findOrFail($id);

        $relacionados = Servicio::where('tipo', $servicio->tipo)
            ->where('id', '!=', $id)
            ->where('estado', 'activo')
            ->limit(3)
            ->get();

        return view('servicios.detalle', compact('servicio', 'relacionados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'descripcion_corta' => 'required|string|max:500',
            'precio_base' => 'nullable|numeric|min:0',
        ], [
            'nombre.required' => 'El nombre del servicio es obligatorio',
            'tipo.required' => 'El tipo de servicio es obligatorio',
            'descripcion_corta.required' => 'La descripción corta es obligatoria',
            'descripcion_corta.max' => 'La descripción corta no debe superar 500 caracteres',
        ]);

        $codigo = 'SER-' . strtoupper(substr($request->tipo, 0, 3)) . '-' . str_pad(Servicio::count() + 1, 4, '0', STR_PAD_LEFT);

        $data = $request->all();
        $data['codigo'] = $codigo;
        $data['estado'] = $data['estado'] ?? 'activo';
        $data['disponibilidad'] = $data['disponibilidad'] ?? 'disponible';
        $data['moneda'] = $data['moneda'] ?? 'PEN';
        $data['popularidad'] = 0;

        $servicio = Servicio::create($data);

        Actividad::create([
            'usuario_id' => auth()->id(),
            'accion' => 'Creó servicio: ' . $servicio->nombre,
            'modulo' => 'Servicios',
            'icono' => 'plus-circle',
            'metadata' => ['servicio_id' => $servicio->id],
        ]);

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio creado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
        ]);

        $servicio->update($request->all());

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio eliminado exitosamente.');
    }

    public function incrementarPopularidad($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->increment('popularidad');

        return response()->json(['success' => true]);
    }
}
