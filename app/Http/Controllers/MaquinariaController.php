<?php

namespace App\Http\Controllers;

use App\Models\Maquinaria;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaquinariaController extends Controller
{
    public function index(Request $request)
    {
        $query = Maquinaria::query();

        if ($request->has('tipo') && $request->tipo) {
            $query->where('tipo', $request->tipo);
        }

        if ($request->has('disponibilidad') && $request->disponibilidad) {
            $query->where('disponibilidad', $request->disponibilidad);
        }

        if ($request->has('buscar') && $request->buscar) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }

        $ordenar = $request->get('ordenar', 'nombre');
        $direccion = $request->get('direccion', 'asc');
        $query->orderBy($ordenar, $direccion);

        $maquinaria = $query->paginate(12);
        $tipos = Maquinaria::distinct('tipo')->pluck('tipo');

        return view('maquinaria.index', compact('maquinaria', 'tipos'));
    }

    public function create()
    {
        return view('admin.maquinaria.create');
    }

    public function show($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);

        $relacionadas = Maquinaria::where('tipo', $maquinaria->tipo)
            ->where('id', '!=', $id)
            ->where('disponibilidad', 'disponible')
            ->limit(4)
            ->get();

        return view('maquinaria.detalle', compact('maquinaria', 'relacionadas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'año' => 'required|integer|min:1990|max:' . (date('Y') + 1),
            'tarifa_hora' => 'nullable|numeric|min:0',
            'tarifa_dia' => 'nullable|numeric|min:0',
            'imagenes.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'tipo.required' => 'El tipo es obligatorio',
            'marca.required' => 'La marca es obligatoria',
            'modelo.required' => 'El modelo es obligatorio',
            'año.required' => 'El año es obligatorio',
            'año.integer' => 'El año debe ser un número',
            'imagenes.*.image' => 'Los archivos deben ser imágenes',
            'imagenes.*.max' => 'Las imágenes no deben superar 5MB',
        ]);

        $codigo = 'MAQ-' . strtoupper(substr($request->tipo, 0, 3)) . '-' . str_pad(Maquinaria::count() + 1, 4, '0', STR_PAD_LEFT);

        $data = $request->except('imagenes');
        $data['codigo'] = $codigo;
        $data['estado'] = $data['estado'] ?? 'operativo';
        $data['disponibilidad'] = $data['disponibilidad'] ?? 'disponible';

        if ($request->hasFile('imagenes')) {
            $imagenes = [];
            foreach ($request->file('imagenes') as $imagen) {
                $path = $imagen->store('maquinaria', 'public');
                $imagenes[] = basename($path);
            }
            $data['imagenes'] = $imagenes;
        }

        $maquinaria = Maquinaria::create($data);

        Actividad::create([
            'usuario_id' => auth()->id(),
            'accion' => 'Creó maquinaria: ' . $maquinaria->nombre,
            'modulo' => 'Maquinaria',
            'icono' => 'truck-monster',
            'metadata' => ['maquinaria_id' => $maquinaria->id],
        ]);

        return redirect()->route('admin.maquinaria.index')
            ->with('success', 'Maquinaria creada exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $maquinaria = Maquinaria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
        ]);

        $data = $request->except('imagenes');

        if ($request->hasFile('imagenes')) {
            $imagenes = $maquinaria->imagenes ?? [];
            foreach ($request->file('imagenes') as $imagen) {
                $path = $imagen->store('maquinaria', 'public');
                $imagenes[] = basename($path);
            }
            $data['imagenes'] = $imagenes;
        }

        $maquinaria->update($data);

        return redirect()->route('admin.maquinaria.index')
            ->with('success', 'Maquinaria actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);

        if ($maquinaria->imagenes) {
            foreach ($maquinaria->imagenes as $imagen) {
                Storage::disk('public')->delete('maquinaria/' . $imagen);
            }
        }

        $maquinaria->delete();

        return redirect()->route('admin.maquinaria.index')
            ->with('success', 'Maquinaria eliminada exitosamente.');
    }
}
