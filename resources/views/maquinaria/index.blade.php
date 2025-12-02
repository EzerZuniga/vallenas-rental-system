@extends('layouts.app')

@section('title', 'Catálogo de Maquinaria - ETC Vallenas')
@section('description',
    'Explora nuestro amplio catálogo de más de 85 equipos de maquinaria pesada disponibles para
    alquiler en Cusco, Perú.')

@section('content')
    <section class="py-5 bg-gradient-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">Nuestra Maquinaria</h1>
                    <p class="lead mb-0">Más de 85 equipos de última generación disponibles para tu proyecto</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="bg-white p-4 rounded-3 shadow d-inline-block">
                        <i class="fas fa-truck-monster text-primary fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-light">
        <div class="container">
            <form action="{{ route('maquinaria.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre..."
                            value="{{ request('buscar') }}">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <select name="tipo" class="form-select">
                            <option value="">Todos los tipos</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo }}" {{ request('tipo') == $tipo ? 'selected' : '' }}>
                                    {{ ucfirst($tipo) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <select name="disponibilidad" class="form-select">
                            <option value="">Todas las disponibilidades</option>
                            <option value="disponible" {{ request('disponibilidad') == 'disponible' ? 'selected' : '' }}>
                                Disponible</option>
                            <option value="en_uso" {{ request('disponibilidad') == 'en_uso' ? 'selected' : '' }}>En uso
                            </option>
                            <option value="mantenimiento"
                                {{ request('disponibilidad') == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
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
            @php
                // Seguridad: comprobar si $maquinaria es contable/iterable antes de usar count() o foreach
                $hasItems = false;
                if (is_countable($maquinaria)) {
                    $hasItems = count($maquinaria) > 0;
                } elseif (is_object($maquinaria) && method_exists($maquinaria, 'count')) {
                    // Paginadores y colecciones Eloquent
                    $hasItems = $maquinaria->count() > 0;
                } elseif (is_iterable($maquinaria)) {
                    $hasItems = count((array) $maquinaria) > 0;
                }
            @endphp

            @if ($hasItems)
                <div class="row g-4">
                    @foreach ($maquinaria as $equipo)
                        <div class="col-xl-4 col-md-6">
                            <div class="card border-0 shadow h-100 transition-all">
                                <div class="position-relative">
                                    @php
                                        $hasImages = false;
                                        if (!empty($equipo->imagenes) && is_countable($equipo->imagenes)) {
                                            $hasImages = count($equipo->imagenes) > 0;
                                        }
                                    @endphp
                                    @if ($hasImages)
                                        <img src="{{ Storage::url('maquinaria/' . $equipo->imagenes[0]) }}"
                                            class="card-img-top" alt="{{ $equipo->nombre }}"
                                            style="height: 250px; object-fit: cover;">
                                    @else
                                        <div class="bg-primary text-white d-flex align-items-center justify-content-center"
                                            style="height: 250px;">
                                            <i class="fas fa-truck-monster fa-5x opacity-25"></i>
                                        </div>
                                    @endif

                                    <span class="position-absolute top-0 end-0 m-3">
                                        @if ($equipo->disponibilidad == 'disponible')
                                            <span class="badge bg-success">Disponible</span>
                                        @elseif($equipo->disponibilidad == 'en_uso')
                                            <span class="badge bg-warning">En uso</span>
                                        @else
                                            <span class="badge bg-danger">Mantenimiento</span>
                                        @endif
                                    </span>
                                </div>

                                <div class="card-body p-4">
                                    <span class="badge bg-primary mb-2">{{ ucfirst($equipo->tipo) }}</span>

                                    <h5 class="card-title fw-bold mb-2">{{ $equipo->nombre }}</h5>

                                    <p class="text-muted mb-3">
                                        <i class="fas fa-industry me-1"></i>{{ $equipo->marca }}
                                        <span class="mx-2">|</span>
                                        <i class="fas fa-tag me-1"></i>{{ $equipo->modelo }}
                                    </p>

                                    <div class="mb-3">
                                        <small class="text-muted d-block">
                                            <i class="fas fa-calendar me-1"></i>Año: {{ $equipo->año }}
                                        </small>
                                        @if ($equipo->potencia)
                                            <small class="text-muted d-block">
                                                <i class="fas fa-bolt me-1"></i>{{ $equipo->potencia }}
                                            </small>
                                        @endif
                                    </div>

                                    @if ($equipo->tarifa_dia)
                                        <div class="mb-3">
                                            <p class="mb-0 fw-bold text-primary">
                                                Desde S/ {{ number_format($equipo->tarifa_dia, 2) }}<span
                                                    class="text-muted fw-normal"> /día</span>
                                            </p>
                                        </div>
                                    @endif

                                    <a href="{{ route('maquinaria.show', $equipo->id) }}"
                                        class="btn btn-outline-primary w-100">
                                        <i class="fas fa-eye me-2"></i>Ver Detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    @if (is_object($maquinaria) && method_exists($maquinaria, 'links'))
                        {{ $maquinaria->links() }}
                    @endif
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-search fa-4x text-muted mb-3"></i>
                    <h3 class="mb-3">No se encontraron resultados</h3>
                    <p class="text-muted mb-4">Intenta con otros criterios de búsqueda</p>
                    <a href="{{ route('maquinaria.index') }}" class="btn btn-primary">
                        <i class="fas fa-redo me-2"></i>Ver Todo
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="h1 fw-bold mb-3">¿No encuentras lo que buscas?</h2>
                    <p class="lead mb-0">Contáctanos y te ayudaremos a encontrar el equipo perfecto para tu proyecto</p>
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
