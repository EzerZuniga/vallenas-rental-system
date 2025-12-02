@extends('layouts.app')

@section('title', 'Sobre Nosotros - ETC Vallenas')
@section('description', 'Conoce más sobre ETC Vallenas, empresa líder en alquiler de maquinaria pesada en Cusco con más
    de 15 años de experiencia.')

@section('content')
    <section class="py-5 bg-gradient-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-5 fw-bold mb-4">Sobre ETC Vallenas</h1>
                    <p class="lead mb-4">
                        Más de 15 años liderando el sector de alquiler de maquinaria pesada en Cusco,
                        brindando soluciones confiables para construcción y minería.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('empresa.historia') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                            <i class="fas fa-book me-2"></i>Nuestra Historia
                        </a>
                        <a href="{{ route('contacto.index') }}" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                            <i class="fas fa-envelope me-2"></i>Contáctanos
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgCkTIIvFq5o4rNKwKHxtbY9HuS5-SEB9C4Dp6MvKuxoQBWJ7DDQRBEr_LSoyddxNa4cY&usqp=CAU') }}"
                        alt="ETC Vallenas" class="img-fluid rounded-3 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-truck-monster fa-2x"></i>
                            </div>
                            <h3 class="fw-bold text-primary mb-1">85+</h3>
                            <p class="text-muted mb-0">Equipos Disponibles</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-project-diagram fa-2x"></i>
                            </div>
                            <h3 class="fw-bold text-success mb-1">450+</h3>
                            <p class="text-muted mb-0">Proyectos Completados</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <h3 class="fw-bold text-warning mb-1">280+</h3>
                            <p class="text-muted mb-0">Clientes Satisfechos</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-danger text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-calendar-alt fa-2x"></i>
                            </div>
                            <h3 class="fw-bold text-danger mb-1">15+</h3>
                            <p class="text-muted mb-0">Años de Experiencia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="card border-0 shadow h-100 transition-all">
                        <div class="card-body p-5 text-center">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center"
                                style="width: 100px; height: 100px;">
                                <i class="fas fa-bullseye fa-3x"></i>
                            </div>
                            <h3 class="fw-bold mb-4">Nuestra Misión</h3>
                            <p class="text-muted">
                                Proporcionar soluciones integrales en alquiler de maquinaria pesada,
                                garantizando equipos de última generación, operadores certificados y
                                un servicio de excelencia que supere las expectativas de nuestros clientes
                                en los sectores de construcción y minería.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow h-100 transition-all">
                        <div class="card-body p-5 text-center">
                            <div class="bg-secondary text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center"
                                style="width: 100px; height: 100px;">
                                <i class="fas fa-eye fa-3x"></i>
                            </div>
                            <h3 class="fw-bold mb-4">Nuestra Visión</h3>
                            <p class="text-muted">
                                Ser la empresa líder en el sur del Perú en servicios de maquinaria pesada,
                                reconocida por nuestra innovación tecnológica, compromiso con la seguridad y
                                excelencia operacional, contribuyendo al desarrollo sostenible de la región.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h1 fw-bold mb-3">¿Por Qué Elegirnos?</h2>
                <p class="text-muted lead">Razones que nos hacen tu mejor opción</p>
            </div>

            <div class="row g-4">
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow h-100 transition-all">
                        <div class="card-body p-4 text-center">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-shield-alt fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Equipos Certificados</h4>
                            <p class="text-muted">
                                Toda nuestra flota cuenta con certificaciones vigentes y
                                mantenimiento preventivo constante.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow h-100 transition-all">
                        <div class="card-body p-4 text-center">
                            <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-users-cog fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Personal Capacitado</h4>
                            <p class="text-muted">
                                Operadores con certificación nacional e internacional,
                                expertos en seguridad y eficiencia operativa.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow h-100 transition-all">
                        <div class="card-body p-4 text-center">
                            <div class="bg-warning text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-clock fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Disponibilidad 24/7</h4>
                            <p class="text-muted">
                                Soporte técnico y atención al cliente las 24 horas del día,
                                los 7 días de la semana.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow h-100 transition-all">
                        <div class="card-body p-4 text-center">
                            <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-dollar-sign fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Precios Competitivos</h4>
                            <p class="text-muted">
                                Tarifas justas y flexibles adaptadas a las necesidades
                                de cada proyecto.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow h-100 transition-all">
                        <div class="card-body p-4 text-center">
                            <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-leaf fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Compromiso Ambiental</h4>
                            <p class="text-muted">
                                Equipos con tecnología ECO para reducir el impacto
                                ambiental en cada operación.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow h-100 transition-all">
                        <div class="card-body p-4 text-center">
                            <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="fas fa-handshake fa-2x"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Confianza y Experiencia</h4>
                            <p class="text-muted">
                                Más de 15 años respaldando proyectos exitosos en
                                construcción y minería.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="h1 fw-bold mb-4">¿Listo para tu Próximo Proyecto?</h2>
                    <p class="lead mb-4">
                        Contáctanos hoy y descubre cómo podemos ayudarte a alcanzar tus objetivos
                    </p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center">
                        <a href="{{ route('contacto.index') }}" class="btn btn-light btn-lg px-4 py-3 fw-semibold">
                            <i class="fas fa-envelope me-2"></i>Solicitar Cotización
                        </a>
                        <a href="{{ route('maquinaria.index') }}"
                            class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                            <i class="fas fa-truck-monster me-2"></i>Ver Maquinaria
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
