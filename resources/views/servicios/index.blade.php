@extends('layouts.app')

@section('title', 'Nuestros Servicios - ETC Vallenas')
@section('description', 'Conoce todos los servicios que ETC Vallenas ofrece para tu proyecto: alquiler de maquinaria,
    transporte, y más.')

@section('content')
    <section class="py-5 bg-gradient-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">Nuestros Servicios</h1>
                    <p class="lead mb-0">Soluciones completas para proyectos de construcción y movimiento de tierras</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="bg-white p-4 rounded-3 shadow d-inline-block">
                        <i class="fas fa-tools text-primary fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-light">
        <div class="container">
            <form action="{{ route('servicios.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-lg-5 col-md-6">
                        <input type="text" name="buscar" class="form-control" placeholder="Buscar servicios..."
                            value="{{ request('buscar') }}">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <select name="tipo" class="form-select">
                            <option value="">Todos los tipos</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo }}" {{ request('tipo') == $tipo ? 'selected' : '' }}>
                                    {{ ucfirst(str_replace('_', ' ', $tipo)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search me-2"></i>Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            @if ($servicios->count() > 0)
                <div class="row g-4">
                    @foreach ($servicios as $servicio)
                        <div class="col-xl-4 col-md-6">
                            <div
                                class="card border-0 shadow h-100 transition-all {{ $servicio->destacado ? 'border-primary border-3' : '' }}">
                                @if ($servicio->destacado)
                                    <div class="position-absolute top-0 start-50 translate-middle">
                                        <span class="badge bg-primary">Destacado</span>
                                    </div>
                                @endif

                                @if ($servicio->imagen)
                                    <img src="{{ Storage::url('servicios/' . $servicio->imagen) }}" class="card-img-top"
                                        alt="{{ $servicio->nombre }}" style="height: 250px; object-fit: cover;">
                                @else
                                    <div class="bg-primary text-white d-flex align-items-center justify-content-center"
                                        style="height: 250px;">
                                        <i class="fas fa-tools fa-5x opacity-25"></i>
                                    </div>
                                @endif

                                <div class="card-body p-4">
                                    <span class="badge bg-secondary mb-2">
                                        {{ ucfirst(str_replace('_', ' ', $servicio->tipo)) }}
                                    </span>

                                    <h5 class="card-title fw-bold mb-3">{{ $servicio->nombre }}</h5>

                                    @if ($servicio->descripcion_corta)
                                        <p class="text-muted mb-3">
                                            {{ Str::limit($servicio->descripcion_corta, 100) }}
                                        </p>
                                    @endif

                                    @php
                                        $caracteristicas = $servicio->caracteristicas;
                                        if (is_string($caracteristicas)) {
                                            $decoded = json_decode($caracteristicas, true);
                                            if (is_array($decoded)) {
                                                $caracteristicas = $decoded;
                                            } else {
                                                $caracteristicas = array_filter(
                                                    array_map('trim', explode(',', $caracteristicas)),
                                                );
                                            }
                                        } elseif (is_null($caracteristicas)) {
                                            $caracteristicas = [];
                                        }
                                    @endphp

                                    @if (is_array($caracteristicas) && count($caracteristicas) > 0)
                                        <ul class="list-unstyled mb-3">
                                            @foreach (array_slice($caracteristicas, 0, 3) as $caracteristica)
                                                <li class="mb-1">
                                                    <i class="fas fa-check text-success me-2"></i>
                                                    <small class="text-muted">{{ $caracteristica }}</small>
                                                </li>
                                            @endforeach
                                            @if (count($caracteristicas) > 3)
                                                <li class="text-muted">
                                                    <small>+ {{ count($caracteristicas) - 3 }} más</small>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif

                                    @if ($servicio->precio_base)
                                        <div class="mb-3">
                                            <p class="mb-0 fw-bold text-primary">
                                                Desde S/ {{ number_format($servicio->precio_base, 2) }}
                                            </p>
                                        </div>
                                    @endif

                                    <a href="{{ route('servicios.show', $servicio->id) }}"
                                        class="btn {{ $servicio->destacado ? 'btn-primary' : 'btn-outline-primary' }} w-100">
                                        <i class="fas fa-info-circle me-2"></i>Ver Detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $servicios->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-search fa-4x text-muted mb-3"></i>
                    <h3 class="mb-3">No se encontraron servicios</h3>
                    <p class="text-muted mb-4">Intenta con otros criterios de búsqueda</p>
                    <a href="{{ route('servicios.index') }}" class="btn btn-primary">
                        <i class="fas fa-redo me-2"></i>Ver Todos
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h1 fw-bold mb-3">¿Por qué elegirnos?</h2>
                <p class="text-muted lead">Calidad y experiencia a tu servicio</p>
            </div>
            <div class="row g-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-certificate fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Certificados</h5>
                            <p class="text-muted mb-0">Personal calificado y equipos certificados</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Disponibilidad</h5>
                            <p class="text-muted mb-0">Atención y soporte en todo momento</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-shield-alt fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Seguridad</h5>
                            <p class="text-muted mb-0">Cumplimiento de normas de seguridad</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow text-center h-100">
                        <div class="card-body p-4">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-headset fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Soporte</h5>
                            <p class="text-muted mb-0">Asesoría técnica personalizada</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="h1 fw-bold mb-3">¿Necesitas un servicio personalizado?</h2>
                    <p class="lead mb-0">Contáctanos y diseñaremos la solución perfecta para tu proyecto</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                        <i class="fas fa-envelope me-2"></i>Contáctanos
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
