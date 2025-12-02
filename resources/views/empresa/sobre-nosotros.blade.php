@extends('layouts.app')

@section('title', 'Sobre Nosotros - ETC Vallenas')
@section('description',
    'ETC Vallenas: más de 15 años ofreciendo alquiler de maquinaria pesada con foco en seguridad,
    calidad y servicio en Cusco y sur del Perú.')

@section('content')
    <style>
        .btn-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
        }

        .icon-circle-sm {
            width: 64px;
            height: 64px;
        }

        .icon-circle-lg {
            width: 90px;
            height: 90px;
        }
    </style>
    <header class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9">
                    <div class="mb-3">
                        <i class="fas fa-users fa-3x" aria-hidden="true"></i>
                    </div>
                    <h1 class="display-5 fw-bold mb-2">Sobre ETC Vallenas</h1>
                    <p class="lead mb-0">Alquiler de maquinaria pesada y soluciones integrales para proyectos en Cusco y el
                        sur del Perú.</p>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <figure class="mb-0">
                        <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBFYbMtf4UvJNQgGM5SFK_nMjOHPphIVtgKw&s') }}"
                            alt="Equipo ETC Vallenas" class="img-fluid rounded shadow-sm w-100">
                        <figcaption class="mt-3 d-inline-block bg-primary text-white px-3 py-2 rounded">
                            <strong class="d-block">15+ años</strong>
                            <small>Experiencia en obra</small>
                        </figcaption>
                    </figure>
                </div>

                <div class="col-lg-6">
                    <span class="badge bg-secondary mb-2">Nuestra Empresa</span>
                    <h2 class="h1 fw-bold mb-3">Quiénes Somos</h2>
                    <p class="text-muted mb-3">
                        <strong>ETC Vallenas</strong> es una compañía peruana con base en Cusco especializada en
                        alquiler de maquinaria pesada para construcción, minería e infraestructura. Combinamos
                        flota moderna, servicios técnicos certificados y procesos orientados a la seguridad y la
                        eficiencia para garantizar resultados confiables en cada proyecto.
                    </p>

                    <ul class="list-unstyled text-muted mb-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"
                                aria-hidden="true"></i><strong>Flota</strong>: +40 equipos disponibles y mantenimiento
                            propio.</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"
                                aria-hidden="true"></i><strong>Clientes</strong>: +50 proyectos con clientes satisfechos.
                        </li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"
                                aria-hidden="true"></i><strong>Cobertura</strong>: Operamos en Cusco y zonas del sur del
                            Perú.</li>
                    </ul>

                    <p class="text-muted mb-0">
                        Nuestro compromiso es ofrecer soluciones seguras, puntuales y rentables que permitan
                        a nuestros clientes avanzar en sus obras con confianza.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <article class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3"
                                style="width:64px;height:64px;">
                                <i class="fas fa-bullseye fa-lg" aria-hidden="true"></i>
                            </div>
                            <h3 class="h5 fw-bold">Misión</h3>
                            <p class="text-muted mb-0">Proveer alquiler y soporte técnico de maquinaria pesada para impulsar
                                proyectos de infraestructura, garantizando seguridad, disponibilidad y eficiencia operativa.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-md-6">
                    <article class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-3"
                                style="width:64px;height:64px;">
                                <i class="fas fa-eye fa-lg" aria-hidden="true"></i>
                            </div>
                            <h3 class="h5 fw-bold">Visión</h3>
                            <p class="text-muted mb-0">Ser referentes en el sur del país por nuestra calidad operativa,
                                innovación en servicios y compromiso con el desarrollo sostenible hacia 2030.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <span class="badge bg-secondary mb-2">Nuestros Valores</span>
                <h2 class="h3 fw-bold">Lo que nos guía</h2>
                <p class="text-muted">Principios claros que orientan cada decisión y proceso.</p>
            </div>

            <div class="row g-3">
                @php
                    $valores = [
                        [
                            'icon' => 'fa-shield-alt',
                            'color' => 'primary',
                            'title' => 'Integridad',
                            'text' => 'Actuamos con honestidad y responsabilidad.',
                        ],
                        [
                            'icon' => 'fa-trophy',
                            'color' => 'success',
                            'title' => 'Excelencia',
                            'text' => 'Orientados a la calidad en cada entrega.',
                        ],
                        [
                            'icon' => 'fa-handshake',
                            'color' => 'warning',
                            'title' => 'Compromiso',
                            'text' => 'Cumplimos plazos y acuerdos.',
                        ],
                        [
                            'icon' => 'fa-hard-hat',
                            'color' => 'danger',
                            'title' => 'Seguridad',
                            'text' => 'Prioridad absoluta en cada operación.',
                        ],
                        [
                            'icon' => 'fa-lightbulb',
                            'color' => 'info',
                            'title' => 'Innovación',
                            'text' => 'Mejoramos procesos con tecnología.',
                        ],
                        [
                            'icon' => 'fa-leaf',
                            'color' => 'success',
                            'title' => 'Sostenibilidad',
                            'text' => 'Responsables con el entorno y la comunidad.',
                        ],
                    ];
                @endphp

                @foreach ($valores as $v)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-4">
                                <div class="rounded-circle bg-{{ $v['color'] }} text-white d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width:64px;height:64px;">
                                    <i class="fas {{ $v['icon'] }} fa-lg" aria-hidden="true"></i>
                                </div>
                                <h5 class="fw-bold mb-2">{{ $v['title'] }}</h5>
                                <p class="text-muted mb-0">{{ $v['text'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <span class="badge bg-secondary mb-2">Nuestro Equipo</span>
                <h2 class="h3 fw-bold">Profesionales al servicio de tu proyecto</h2>
                <p class="text-muted">Equipo técnico y operativo con experiencia comprobada.</p>
            </div>

            <div class="row g-4">
                @php
                    $equipo = [
                        [
                            'name' => 'Fernando Vallenas',
                            'role' => 'Director General',
                            'color' => 'primary',
                            'bio' => 'Ingeniero Civil con +20 años en construcción y gestión de equipos.',
                        ],
                        [
                            'name' => 'María González',
                            'role' => 'Gerente de Operaciones',
                            'color' => 'success',
                            'bio' => 'Especialista en logística y gestión de flota.',
                        ],
                        [
                            'name' => 'Carlos Huamán',
                            'role' => 'Jefe de Mantenimiento',
                            'color' => 'warning',
                            'bio' => 'Experto en mantenimiento preventivo y correctivo.',
                        ],
                        [
                            'name' => 'Ana Quispe',
                            'role' => 'Gerente Comercial',
                            'color' => 'info',
                            'bio' => 'Lidera desarrollo comercial y relaciones B2B.',
                        ],
                    ];
                @endphp

                @foreach ($equipo as $p)
                    <div class="col-sm-6 col-xl-3">
                        <div class="card border-0 shadow-sm h-100 text-center">
                            <div class="card-body p-4">
                                <div
                                    class="rounded-circle bg-{{ $p['color'] }} text-white mx-auto mb-3 d-flex align-items-center justify-content-center icon-circle-lg">
                                    <i class="fas fa-user fa-lg" aria-hidden="true"></i>
                                </div>
                                <h5 class="fw-bold mb-1">{{ $p['name'] }}</h5>
                                <p class="text-{{ $p['color'] }} small mb-2">{{ $p['role'] }}</p>
                                <p class="text-muted small mb-3">{{ $p['bio'] }}</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#"
                                        class="btn btn-sm btn-outline-{{ $p['color'] }} rounded-circle btn-icon"
                                        aria-label="LinkedIn {{ $p['name'] }}" title="LinkedIn {{ $p['name'] }}">
                                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                    </a>
                                    <a href="#"
                                        class="btn btn-sm btn-outline-{{ $p['color'] }} rounded-circle btn-icon"
                                        aria-label="Email {{ $p['name'] }}"
                                        title="Enviar correo a {{ $p['name'] }}">
                                        <i class="fas fa-envelope" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 mb-3">
                    <h2 class="h3 fw-bold mb-1">Números que nos respaldan</h2>
                    <p class="opacity-75 mb-4">Experiencia y capacidad comprobadas</p>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <div>
                        <h3 class="display-6 fw-bold mb-1">50+</h3>
                        <p class="mb-0 opacity-75">Proyectos</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div>
                        <h3 class="display-6 fw-bold mb-1">40+</h3>
                        <p class="mb-0 opacity-75">Equipos</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div>
                        <h3 class="display-6 fw-bold mb-1">40+</h3>
                        <p class="mb-0 opacity-75">Clientes</p>
                    </div>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <div>
                        <h3 class="display-6 fw-bold mb-1">15+</h3>
                        <p class="mb-0 opacity-75">Años</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="h4 fw-bold mb-2">¿Listo para trabajar con nosotros?</h3>
                    <p class="text-muted mb-0">Únete a las empresas que ya confían en ETC Vallenas. Estamos listos para
                        apoyar tu siguiente proyecto.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ route('contacto.index') }}" class="btn btn-warning btn-lg px-4 me-2" role="button"
                        aria-label="Contáctanos">
                        <i class="fas fa-envelope me-2" aria-hidden="true"></i>Contáctanos
                    </a>
                    <a href="{{ route('maquinaria.index') }}" class="btn btn-outline-light btn-lg px-4" role="button"
                        aria-label="Ver equipos">
                        <i class="fas fa-truck-monster me-2" aria-hidden="true"></i>Ver equipos
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
