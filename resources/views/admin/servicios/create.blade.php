@extends('layouts.admin')

@section('title', 'Crear Servicio - Panel Admin')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card p-4">
                        <h4 class="mb-3">Crear Servicio</h4>
                        <form action="{{ route('admin.servicios.store') }}" method="POST">
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
                                <label class="form-label">Descripción corta</label>
                                <textarea name="descripcion_corta" class="form-control" rows="3">{{ old('descripcion_corta') }}</textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-info">Crear servicio</button>
                                <a href="{{ route('admin.servicios.index') }}"
                                    class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
