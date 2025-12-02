<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Maquinaria;
use App\Models\Usuario;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index(Request $request)
    {
        $query = Proyecto::with('responsable');

        if ($request->has('tipo') && $request->tipo) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->has('estado') && $request->estado) {
            $query->where('estado', $request->estado);
        }

        if ($request->has('buscar') && $request->buscar) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }

        $proyectos = $query->orderBy('created_at', 'desc')->paginate(12);
        $tipos = Proyecto::distinct('tipo')->pluck('tipo');

        return view('proyectos.index', compact('proyectos', 'tipos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $maquinaria = Maquinaria::all();
        return view('admin.proyectos.create', compact('usuarios', 'maquinaria'));
    }

    public function show($id)
    {
        $proyecto = Proyecto::with('responsable', 'maquinaria')->findOrFail($id);

        $relacionados = Proyecto::where('tipo', $proyecto->tipo)
            ->where('_id', '!=', $id)
            ->limit(3)
            ->get();

        return view('proyectos.detalle', compact('proyecto', 'relacionados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'cliente' => 'required|string|max:255',
            'ubicacion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_estimada_fin' => 'required|date|after:fecha_inicio',
            'presupuesto' => 'nullable|numeric|min:0',
        ], [
            'nombre.required' => 'El nombre del proyecto es obligatorio',
            'tipo.required' => 'El tipo de proyecto es obligatorio',
            'cliente.required' => 'El nombre del cliente es obligatorio',
            'ubicacion.required' => 'La ubicación es obligatoria',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria',
            'fecha_estimada_fin.required' => 'La fecha estimada de fin es obligatoria',
            'fecha_estimada_fin.after' => 'La fecha de fin debe ser posterior a la fecha de inicio',
        ]);

        $codigo = 'PROY-' . date('Y') . '-' . str_pad(Proyecto::count() + 1, 4, '0', STR_PAD_LEFT);

        $data = $request->all();
        $data['codigo'] = $codigo;
        $data['estado'] = $data['estado'] ?? 'planificacion';
        $data['responsable_id'] = auth()->id();
        $data['responsable_nombre'] = auth()->user()->nombre_completo;
        $data['moneda'] = $data['moneda'] ?? 'PEN';
        $data['avance_porcentaje'] = 0;

        $proyecto = Proyecto::create($data);

        Actividad::create([
            'usuario_id' => auth()->id(),
            'accion' => 'Creó proyecto: ' . $proyecto->nombre,
            'modulo' => 'Proyectos',
            'icono' => 'folder-plus',
            'metadata' => ['proyecto_id' => $proyecto->id],
        ]);

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'estado' => 'required|string',
        ]);

        $proyecto->update($request->all());

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('admin.proyectos.index')
            ->with('success', 'Proyecto eliminado exitosamente.');
    }

    public function actualizarAvance(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $request->validate([
            'avance_porcentaje' => 'required|integer|min:0|max:100',
        ]);

        $proyecto->update([
            'avance_porcentaje' => $request->avance_porcentaje,
        ]);

        if ($request->avance_porcentaje == 100) {
            $proyecto->update([
                'estado' => 'completado',
                'fecha_fin' => now(),
            ]);
        }

        return back()->with('success', 'Avance actualizado exitosamente.');
    }
}
