@extends('layouts.admin')

@section('title', 'Crear Usuario - Panel Admin')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card p-4">
                        <h4 class="mb-3">Crear Usuario</h4>
                        <form action="{{ route('admin.usuarios.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" required
                                    value="{{ old('nombre') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellido</label>
                                <input type="text" name="apellido" class="form-control" required
                                    value="{{ old('apellido') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required
                                    value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rol</label>
                                <select name="rol" class="form-select">
                                    <option value="client">Cliente</option>
                                    <option value="operator">Operador</option>
                                    <option value="manager">Manager</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-primary">Crear usuario</button>
                                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
