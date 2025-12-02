@extends('layouts.app')

@section('title', 'Nuestros Proyectos - ETC Vallenas')
@section('description', 'Conoce los más de 450 proyectos completados con éxito por ETC Vallenas en todo el Perú.')

@section('content')
    <section class="py-5 bg-gradient-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">Nuestros Proyectos</h1>
                    <p class="lead mb-0">Más de 450 proyectos completados exitosamente en todo el Perú</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="bg-white p-4 rounded-3 shadow d-inline-block">
                        <i class="fas fa-building text-primary fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-light">
        <div class="container">
            <form action="{{ route('proyectos.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <input type="text" name="buscar" class="form-control" placeholder="Buscar proyectos..."
                            value="{{ request('buscar') }}">
                    </div>
                    <div class="col-lg-3 col-md-6">
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
                        <select name="estado" class="form-select">
                            <option value="">Todos los estados</option>
                            <option value="completado" {{ request('estado') == 'completado' ? 'selected' : '' }}>Completado
                            </option>
                            <option value="en_progreso" {{ request('estado') == 'en_progreso' ? 'selected' : '' }}>En
                                progreso</option>
                            <option value="pausado" {{ request('estado') == 'pausado' ? 'selected' : '' }}>Pausado</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
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
            @if ($proyectos->count() > 0)
                <div class="row g-4">
                    @foreach ($proyectos as $proyecto)
                        <div class="col-xl-4 col-md-6">
                            <div class="card border-0 shadow h-100 transition-all">
                                <div class="position-relative">
                                    @if ($proyecto->imagenes && count($proyecto->imagenes) > 0)
                                        <img src="{{ Storage::url('proyectos/' . $proyecto->imagenes[0]) }}"
                                            class="card-img-top" alt="{{ $proyecto->nombre }}"
                                            style="height: 250px; object-fit: cover;">
                                    @else
                                        <div class="bg-primary text-white d-flex align-items-center justify-content-center"
                                            style="height: 250px;">
                                            <i class="fas fa-building fa-5x opacity-25"></i>
                                        </div>
                                    @endif

                                    <span class="position-absolute top-0 end-0 m-3">
                                        @if ($proyecto->estado == 'completado')
                                            <span class="badge bg-success">Completado</span>
                                        @elseif($proyecto->estado == 'en_progreso')
                                            <span class="badge bg-primary">En Progreso</span>
                                        @else
                                            <span class="badge bg-warning">Pausado</span>
                                        @endif
                                    </span>
                                </div>

                                <div class="card-body p-4">
                                    <span class="badge bg-secondary mb-2">
                                        {{ ucfirst(str_replace('_', ' ', $proyecto->tipo)) }}
                                    </span>

                                    <h5 class="card-title fw-bold mb-2">{{ $proyecto->nombre }}</h5>

                                    <p class="text-muted small mb-3">
                                        <i class="fas fa-user me-1"></i>{{ $proyecto->cliente }}
                                        <br>
                                        <i class="fas fa-map-marker-alt me-1"></i>{{ $proyecto->ubicacion }}
                                    </p>

                                    <div class="mb-3">
                                        @php
                                            $fechaInicio =
                                                $proyecto->fecha_inicio instanceof \Carbon\Carbon
                                                    ? $proyecto->fecha_inicio
                                                    : \Carbon\Carbon::parse($proyecto->fecha_inicio);
                                            $fechaFin = null;
                                            if ($proyecto->fecha_fin) {
                                                $fechaFin =
                                                    $proyecto->fecha_fin instanceof \Carbon\Carbon
                                                        ? $proyecto->fecha_fin
                                                        : \Carbon\Carbon::parse($proyecto->fecha_fin);
                                            }
                                        @endphp
                                        <small class="text-muted d-block">
                                            <i class="fas fa-calendar me-1"></i>Inicio: {{ $fechaInicio->format('d/m/Y') }}
                                        </small>
                                        @if ($fechaFin)
                                            <small class="text-muted d-block">
                                                <i class="fas fa-calendar-check me-1"></i>Fin:
                                                {{ $fechaFin->format('d/m/Y') }}
                                            </small>
                                        @endif
                                    </div>

                                    @if ($proyecto->avance_porcentaje)
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <small class="text-muted">Progreso</small>
                                                <small
                                                    class="fw-bold text-primary">{{ $proyecto->avance_porcentaje }}%</small>
                                            </div>
                                            <div class="progress" style="height: 8px;">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    style="width: {{ $proyecto->avance_porcentaje }}%"
                                                    aria-valuenow="{{ $proyecto->avance_porcentaje }}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($proyecto->presupuesto)
                                        <p class="mb-3 fw-semibold text-primary">
                                            S/ {{ number_format($proyecto->presupuesto, 2) }}
                                        </p>
                                    @endif

                                    <a href="{{ route('proyectos.show', $proyecto->id) }}"
                                        class="btn btn-outline-primary w-100">
                                        <i class="fas fa-eye me-2"></i>Ver Detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $proyectos->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-search fa-4x text-muted mb-3"></i>
                    <h3 class="mb-3">No se encontraron proyectos</h3>
                    <p class="text-muted mb-4">Intenta con otros criterios de búsqueda</p>
                    <a href="{{ route('proyectos.index') }}" class="btn btn-primary">
                        <i class="fas fa-redo me-2"></i>Ver Todos
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="h1 fw-bold mb-3">¿Tienes un proyecto en mente?</h2>
                    <p class="lead mb-0">Contáctanos y te ayudaremos a hacer realidad tu proyecto</p>
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
