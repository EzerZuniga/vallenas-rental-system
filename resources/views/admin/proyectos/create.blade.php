@extends('layouts.admin')

@section('title', 'Crear Proyecto - Panel Admin')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card p-4">
                        <h4 class="mb-3">Crear Proyecto</h4>
                        <form action="{{ route('admin.proyectos.store') }}" method="POST">
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
                            <div class="mb-3">
                                <label class="form-label">Cliente</label>
                                <input type="text" name="cliente" class="form-control" required
                                    value="{{ old('cliente') }}">
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label class="form-label">Fecha inicio</label>
                                    <input type="date" name="fecha_inicio" class="form-control" required
                                        value="{{ old('fecha_inicio') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Fecha estimada fin</label>
                                    <input type="date" name="fecha_estimada_fin" class="form-control" required
                                        value="{{ old('fecha_estimada_fin') }}">
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">Crear proyecto</button>
                                <a href="{{ route('admin.proyectos.index') }}"
                                    class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
