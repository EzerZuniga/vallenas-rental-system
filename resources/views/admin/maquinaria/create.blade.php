@extends('layouts.app')

@section('title', 'Crear Maquinaria - Panel Admin')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card p-4">
                        <h4 class="mb-3">Crear Maquinaria</h4>
                        <form action="{{ route('admin.maquinaria.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" required
                                    value="{{ old('nombre') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tipo</label>
                                <input type="text" name="tipo" class="form-control" required
                                    value="{{ old('tipo') }}">
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label class="form-label">Marca</label>
                                    <input type="text" name="marca" class="form-control" required
                                        value="{{ old('marca') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Modelo</label>
                                    <input type="text" name="modelo" class="form-control" required
                                        value="{{ old('modelo') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Año</label>
                                <input type="number" name="año" class="form-control" min="1990"
                                    max="{{ date('Y') + 1 }}" value="{{ old('año') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imágenes</label>
                                <input type="file" name="imagenes[]" class="form-control" multiple accept="image/*">
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-success">Guardar</button>
                                <a href="{{ route('admin.maquinaria.index') }}"
                                    class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
