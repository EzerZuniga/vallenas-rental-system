@extends('layouts.app')

@section('title', 'ETC Vallenas - Alquiler de Maquinaria Pesada | Cusco, Perú')
@section('description',
    'Empresa líder en alquiler de maquinaria pesada en Cusco. Más de 15 años de experiencia en
    construcción, minería y proyectos industriales.')

    @push('styles')
        <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "ETC Vallenas",
        "url": "http://127.0.0.1:8000/",
        "logo": "{{ asset('assets/images/logo.svg') }}",
        "description": "Empresa líder en alquiler de maquinaria pesada en Cusco, Perú",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Av. Los Incas 123",
            "addressLocality": "Cusco",
            "addressCountry": "PE"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+51-984-123-456",
            "contactType": "customer service",
            "email": "vallenasfernando43@gmail.com"
        }
    }
    </script>
    @endpush

@section('content')
    <!-- Hero Carousel - Premium Design -->
    <section class="hero-carousel" role="region" aria-label="Carrusel de maquinaria pesada">
        <div class="carousel-container">
            <div class="carousel-slides">
                <!-- Slide 1 -->
                <div class="carousel-slide active">
                    <img src="{{ asset('assets/images/carruseles/volvo1.jpg') }}"
                        alt="Excavadora Volvo en proyecto de construcción" loading="eager">
                    <div class="carousel-content">
                        <div class="container">
                            <h2>Maquinarias que impulsan tus proyectos</h2>
                            <p>ETC Vallenas | Alquiler de maquinaria pesada en Cusco con más de 15 años de experiencia</p>
                            <div class="carousel-actions">
                                <a href="{{ route('maquinaria.index') }}" class="carousel-btn carousel-btn-primary">
                                    <i class="fas fa-truck-monster"></i>
                                    Ver Maquinaria
                                </a>
                                <a href="{{ route('contacto.index') }}" class="carousel-btn carousel-btn-secondary">
                                    <i class="fas fa-paper-plane"></i>
                                    Solicitar Cotización
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-slide">
                    <img src="{{ asset('assets/images/carruseles/volvo2.jpg') }}" alt="Equipos Volvo de última generación"
                        loading="lazy">
                    <div class="carousel-content">
                        <div class="container">
                            <h2>Equipos de última generación</h2>
                            <p>Tecnología Volvo para maximizar la eficiencia y seguridad en cada proyecto</p>
                            <div class="carousel-actions">
                                <a href="{{ route('maquinaria.index') }}" class="carousel-btn carousel-btn-primary">
                                    <i class="fas fa-cogs"></i>
                                    Explorar Equipos
                                </a>
                                <a href="{{ route('proyectos.index') }}" class="carousel-btn carousel-btn-secondary">
                                    <i class="fas fa-project-diagram"></i>
                                    Ver Proyectos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-slide">
                    <img src="{{ asset('assets/images/carruseles/volvo3.jpg') }}" alt="Maquinaria Volvo en operación"
                        loading="lazy">
                    <div class="carousel-content">
                        <div class="container">
                            <h2>Calidad y confianza garantizada</h2>
                            <p>Más de 450 proyectos completados exitosamente con la mejor maquinaria del mercado</p>
                            <div class="carousel-actions">
                                <a href="{{ route('servicios.index') }}" class="carousel-btn carousel-btn-primary">
                                    <i class="fas fa-check-circle"></i>
                                    Nuestros Servicios
                                </a>
                                <a href="{{ route('contacto.index') }}" class="carousel-btn carousel-btn-secondary">
                                    <i class="fas fa-phone-alt"></i>
                                    Contactar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Controls -->
            <button class="carousel-nav carousel-nav-prev" aria-label="Slide anterior" type="button">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-nav carousel-nav-next" aria-label="Slide siguiente" type="button">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <!-- Nuestros Servicios -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h2 fw-bold mb-3" style="color: #0b1b2e;">Nuestros Servicios</h2>
                <p class="text-muted mb-0">Soluciones integrales para tus proyectos de construcción y minería</p>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 h-100" style="background-color: #f5f0eb;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-hard-hat" style="font-size: 3rem; color: #0b1b2e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #0b1b2e;">Alquiler de Excavadoras</h5>
                            <p class="text-muted small mb-3">Equipos de última generación para excavación y movimiento de
                                tierra</p>
                            <a href="{{ route('maquinaria.index') }}" class="btn btn-sm px-4"
                                style="background-color: #ef6c2c; color: white; border: none;">
                                Ver Maquinaria <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 h-100" style="background-color: #f5f0eb;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-truck-loading" style="font-size: 3rem; color: #0b1b2e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #0b1b2e;">Cargadores Frontales</h5>
                            <p class="text-muted small mb-3">Potentes cargadores para trabajos de alta exigencia y
                                rendimiento</p>
                            <a href="{{ route('maquinaria.index') }}" class="btn btn-sm px-4"
                                style="background-color: #ef6c2c; color: white; border: none;">
                                Ver Maquinaria <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 h-100" style="background-color: #f5f0eb;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-tractor" style="font-size: 3rem; color: #0b1b2e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #0b1b2e;">Motoniveladoras</h5>
                            <p class="text-muted small mb-3">Precisión en nivelación de terrenos y construcción de
                                carreteras</p>
                            <a href="{{ route('maquinaria.index') }}" class="btn btn-sm px-4"
                                style="background-color: #ef6c2c; color: white; border: none;">
                                Ver Maquinaria <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 h-100" style="background-color: #f5f0eb;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-truck-monster" style="font-size: 3rem; color: #0b1b2e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #0b1b2e;">Volquetes</h5>
                            <p class="text-muted small mb-3">Transporte eficiente de materiales para proyectos de gran
                                escala</p>
                            <a href="{{ route('maquinaria.index') }}" class="btn btn-sm px-4"
                                style="background-color: #ef6c2c; color: white; border: none;">
                                Ver Maquinaria <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 h-100" style="background-color: #f5f0eb;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-road" style="font-size: 3rem; color: #0b1b2e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #0b1b2e;">Construcción de Carreteras</h5>
                            <p class="text-muted small mb-3">Servicios especializados en infraestructura vial y caminos</p>
                            <a href="{{ route('servicios.index') }}" class="btn btn-sm px-4"
                                style="background-color: #ef6c2c; color: white; border: none;">
                                Ver Servicios <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 h-100" style="background-color: #f5f0eb;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-wrench" style="font-size: 3rem; color: #0b1b2e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #0b1b2e;">Mantenimiento Especializado</h5>
                            <p class="text-muted small mb-3">Servicio técnico certificado para mantener tu maquinaria
                                operativa</p>
                            <a href="{{ route('servicios.index') }}" class="btn btn-sm px-4"
                                style="background-color: #ef6c2c; color: white; border: none;">
                                Ver Servicios <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 h-100" style="background-color: #f5f0eb;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-users-cog" style="font-size: 3rem; color: #0b1b2e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #0b1b2e;">Operadores Certificados</h5>
                            <p class="text-muted small mb-3">Personal calificado con experiencia en manejo de maquinaria
                                pesada</p>
                            <a href="{{ route('servicios.index') }}" class="btn btn-sm px-4"
                                style="background-color: #ef6c2c; color: white; border: none;">
                                Ver Servicios <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card border-0 h-100" style="background-color: #f5f0eb;">
                        <div class="card-body p-4 text-center">
                            <div class="mb-3">
                                <i class="fas fa-file-contract" style="font-size: 3rem; color: #0b1b2e;"></i>
                            </div>
                            <h5 class="fw-bold mb-3" style="color: #0b1b2e;">Contratos Flexibles</h5>
                            <p class="text-muted small mb-3">Planes de alquiler adaptados a las necesidades de tu proyecto
                            </p>
                            <a href="{{ route('contacto.index') }}" class="btn btn-sm px-4"
                                style="background-color: #ef6c2c; color: white; border: none;">
                                Cotizar Ahora <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('servicios.index') }}" class="btn btn-lg px-5"
                    style="background-color: #0b1b2e; color: white; border: none;">
                    Ver Todos los Servicios <i class="fas fa-chevron-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5" style="background-color: #1a2332;">
        <div class="container">
            <div class="row g-4">
                <div class="col-6 col-lg-3">
                    <div class="card bg-transparent h-100 text-center" style="border: 2px solid #ef6c2c;">
                        <div class="card-body py-4 px-3">
                            <div class="mb-3">
                                <i class="fas fa-truck-monster" style="font-size: 3.5rem; color: #ef6c2c;"></i>
                            </div>
                            <h3 class="fw-bold text-white mb-2" style="font-size: 2rem;">10+</h3>
                            <p class="text-white mb-0 small">Maquinarias Vendidas</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card bg-transparent h-100 text-center" style="border: 2px solid #ef6c2c;">
                        <div class="card-body py-4 px-3">
                            <div class="mb-3">
                                <i class="fas fa-handshake" style="font-size: 3.5rem; color: #ef6c2c;"></i>
                            </div>
                            <h3 class="fw-bold text-white mb-2" style="font-size: 2rem;">50+</h3>
                            <p class="text-white mb-0 small">Maquinarias Alquiladas</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card bg-transparent h-100 text-center" style="border: 2px solid #ef6c2c;">
                        <div class="card-body py-4 px-3">
                            <div class="mb-3">
                                <i class="fas fa-users" style="font-size: 3.5rem; color: #ef6c2c;"></i>
                            </div>
                            <h3 class="fw-bold text-white mb-2" style="font-size: 2rem;">750+</h3>
                            <p class="text-white mb-0 small">Clientes Satisfechos</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="card bg-transparent h-100 text-center" style="border: 2px solid #ef6c2c;">
                        <div class="card-body py-4 px-3">
                            <div class="mb-3">
                                <i class="fas fa-award" style="font-size: 3.5rem; color: #ef6c2c;"></i>
                            </div>
                            <h3 class="fw-bold text-white mb-2" style="font-size: 2rem;">15+</h3>
                            <p class="text-white mb-0 small">Años de Experiencia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ¿Por qué elegir ETC Vallenas? -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h2 fw-bold mb-3" style="color: #0b1b2e;">¿Por qué elegir ETC Vallenas?</h2>
                <p class="text-muted mb-0">Experiencia y confiabilidad en cada proyecto</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px; background-color: #1e90ff;">
                                <i class="fas fa-certificate" style="font-size: 1.5rem; color: white;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Certificaciones ISO</h5>
                            <p class="text-muted mb-0">Equipos certificados que cumplen con los más altos estándares de
                                calidad y seguridad industrial.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px; background-color: #28a745;">
                                <i class="fas fa-clock" style="font-size: 1.5rem; color: white;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Disponibilidad 24/7</h5>
                            <p class="text-muted mb-0">Soporte técnico y atención al cliente las 24 horas del día, los 7
                                días de la semana.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px; background-color: #ffc107;">
                                <i class="fas fa-tools" style="font-size: 1.5rem; color: white;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Mantenimiento Preventivo</h5>
                            <p class="text-muted mb-0">Programa riguroso de mantenimiento para garantizar el óptimo
                                funcionamiento de cada equipo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px; background-color: #17a2b8;">
                                <i class="fas fa-user-tie" style="font-size: 1.5rem; color: white;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Operadores Certificados</h5>
                            <p class="text-muted mb-0">Personal altamente capacitado y con experiencia en el manejo de
                                maquinaria pesada.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px; background-color: #dc3545;">
                                <i class="fas fa-shield-alt" style="font-size: 1.5rem; color: white;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Seguro Integral</h5>
                            <p class="text-muted mb-0">Todos nuestros equipos cuentan con seguro contra todo riesgo para tu
                                tranquilidad.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 60px; height: 60px; background-color: #6c757d;">
                                <i class="fas fa-handshake" style="font-size: 1.5rem; color: white;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Contratos Flexibles</h5>
                            <p class="text-muted mb-0">Planes de alquiler adaptados a las necesidades de cada proyecto,
                                desde horas hasta meses.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sectores que Atendemos -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h2 fw-bold mb-3" style="color: #0b1b2e;">Sectores que Atendemos</h2>
                <p class="text-muted mb-0">Soluciones especializadas para cada industria</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: #f8f9fa;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="rounded p-3" style="background-color: #e7f3ff;">
                                    <i class="fas fa-building" style="font-size: 1.5rem; color: #1e90ff;"></i>
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Construcción</h5>
                                    <p class="text-muted mb-0">Edificaciones residenciales, comerciales e industriales con
                                        maquinaria especializada.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: #f8f9fa;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="rounded p-3" style="background-color: #e8f5e9;">
                                    <i class="fas fa-gem" style="font-size: 1.5rem; color: #28a745;"></i>
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Minería</h5>
                                    <p class="text-muted mb-0">Equipos robustos para operaciones mineras en superficie y
                                        subterráneas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: #f8f9fa;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="rounded p-3" style="background-color: #fff8e1;">
                                    <i class="fas fa-road" style="font-size: 1.5rem; color: #ffc107;"></i>
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Infraestructura</h5>
                                    <p class="text-muted mb-0">Carreteras, puentes, túneles y proyectos de infraestructura
                                        vial.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Maquinaria Destacada -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h2 fw-bold mb-3" style="color: #0b1b2e;">Maquinaria Destacada</h2>
                <p class="text-muted mb-0">Equipos Volvo de última generación disponibles para alquiler</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: white;">
                        <div class="position-relative">
                            <div class="ratio ratio-4x3" style="background-color: #6c757d;">
                                <div class="d-flex align-items-center justify-content-center text-white">
                                    <i class="fas fa-truck-monster" style="font-size: 4rem; opacity: 0.3;"></i>
                                </div>
                            </div>
                            <span class="badge position-absolute top-0 end-0 m-3"
                                style="background-color: #28a745;">Disponible</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Excavadora Volvo EC380</h5>
                            <p class="text-muted mb-3">Excavadora hidráulica de 38 toneladas, ideal para movimientos de
                                tierra y excavaciones profundas.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3 text-muted">
                                <span><i class="fas fa-weight-hanging me-1"></i> 38 ton</span>
                                <span><i class="fas fa-gas-pump me-1"></i> Diesel</span>
                                <span><i class="fas fa-calendar me-1"></i> 2022</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-0 small text-muted">Desde</p>
                                    <h5 class="fw-bold mb-0" style="color: #1e90ff;">S/ 450/día</h5>
                                </div>
                                <a href="{{ route('maquinaria.index') }}" class="btn btn-sm px-4"
                                    style="background-color: #ef6c2c; color: white; border: none;">
                                    Ver detalles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: white;">
                        <div class="position-relative">
                            <div class="ratio ratio-4x3" style="background-color: #6c757d;">
                                <div class="d-flex align-items-center justify-content-center text-white">
                                    <i class="fas fa-truck-loading" style="font-size: 4rem; opacity: 0.3;"></i>
                                </div>
                            </div>
                            <span class="badge position-absolute top-0 end-0 m-3"
                                style="background-color: #28a745;">Disponible</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Cargador Frontal L120H</h5>
                            <p class="text-muted mb-3">Cargador frontal Volvo con capacidad de 3.5 m³, perfecto para carga
                                y descarga de materiales.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3 text-muted">
                                <span><i class="fas fa-box me-1"></i> 3.5 m³</span>
                                <span><i class="fas fa-gas-pump me-1"></i> Diesel</span>
                                <span><i class="fas fa-calendar me-1"></i> 2023</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-0 small text-muted">Desde</p>
                                    <h5 class="fw-bold mb-0" style="color: #1e90ff;">S/ 380/día</h5>
                                </div>
                                <a href="{{ route('maquinaria.index') }}" class="btn btn-sm px-4"
                                    style="background-color: #ef6c2c; color: white; border: none;">
                                    Ver detalles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: white;">
                        <div class="position-relative">
                            <div class="ratio ratio-4x3" style="background-color: #6c757d;">
                                <div class="d-flex align-items-center justify-content-center text-white">
                                    <i class="fas fa-truck" style="font-size: 4rem; opacity: 0.3;"></i>
                                </div>
                            </div>
                            <span class="badge position-absolute top-0 end-0 m-3"
                                style="background-color: #ffc107;">Alquilado</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Volquete Volvo A40G</h5>
                            <p class="text-muted mb-3">Camión articulado con capacidad de 38 toneladas para transporte de
                                materiales pesados.</p>
                            <div class="d-flex justify-content-between align-items-center mb-3 text-muted">
                                <span><i class="fas fa-weight-hanging me-1"></i> 38 ton</span>
                                <span><i class="fas fa-gas-pump me-1"></i> Diesel</span>
                                <span><i class="fas fa-calendar me-1"></i> 2021</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-0 small text-muted">Desde</p>
                                    <h5 class="fw-bold mb-0" style="color: #1e90ff;">S/ 520/día</h5>
                                </div>
                                <button class="btn btn-sm px-4"
                                    style="background-color: white; color: #6c757d; border: 1px solid #dee2e6;" disabled>
                                    No disponible
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('maquinaria.index') }}" class="btn btn-lg px-5"
                    style="background-color: #0b1b2e; color: white; border: none;">
                    Ver Todo el Catálogo <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Proceso de Alquiler -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h2 fw-bold mb-3" style="color: #0b1b2e;">Proceso de Alquiler Simple</h2>
                <p class="text-muted mb-0">Alquila tu maquinaria en 4 pasos sencillos</p>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="text-center">
                        <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px; background-color: #e7f3ff;">
                            <span class="fw-bold" style="font-size: 2rem; color: #1e90ff;">1</span>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Selecciona</h5>
                        <p class="text-muted mb-0">Elige el equipo que necesitas de nuestro catálogo completo</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="text-center">
                        <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px; background-color: #e7f3ff;">
                            <span class="fw-bold" style="font-size: 2rem; color: #1e90ff;">2</span>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Cotiza</h5>
                        <p class="text-muted mb-0">Recibe una cotización personalizada en menos de 24 horas</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="text-center">
                        <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px; background-color: #e7f3ff;">
                            <span class="fw-bold" style="font-size: 2rem; color: #1e90ff;">3</span>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Contrata</h5>
                        <p class="text-muted mb-0">Firma el contrato y coordina la fecha de entrega del equipo</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="text-center">
                        <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px; background-color: #e7f3ff;">
                            <span class="fw-bold" style="font-size: 2rem; color: #1e90ff;">4</span>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #0b1b2e;">Utiliza</h5>
                        <p class="text-muted mb-0">Recibe tu maquinaria lista para operar en tu proyecto</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h2 fw-bold mb-3" style="color: #0b1b2e;">Lo que Dicen Nuestros Clientes</h2>
                <p class="text-muted mb-0">Testimonios reales de empresas que confían en nosotros</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: white;">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                            </div>
                            <p class="text-muted mb-4">"Excelente servicio y maquinaria de primera calidad. Trabajamos con
                                ETC Vallenas en varios proyectos de construcción y siempre cumplen con los plazos
                                establecidos."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px; background-color: #1e90ff;">
                                    <i class="fas fa-user" style="color: white; font-size: 1.2rem;"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-0" style="color: #0b1b2e;">Carlos Mendoza</h6>
                                    <small class="text-muted">Constructora del Sur SAC</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: white;">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                            </div>
                            <p class="text-muted mb-4">"La mejor opción en alquiler de maquinaria en Cusco. Sus equipos
                                están siempre en óptimas condiciones y el soporte técnico es excepcional."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px; background-color: #28a745;">
                                    <i class="fas fa-user" style="color: white; font-size: 1.2rem;"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-0" style="color: #0b1b2e;">María Torres</h6>
                                    <small class="text-muted">Minera Andina Corp.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100" style="background-color: white;">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                                <i class="fas fa-star" style="color: #ffc107;"></i>
                            </div>
                            <p class="text-muted mb-4">"Confiabilidad y profesionalismo en cada proyecto. Los recomendamos
                                ampliamente para cualquier trabajo que requiera maquinaria pesada especializada."</p>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px; background-color: #ffc107;">
                                    <i class="fas fa-user" style="color: white; font-size: 1.2rem;"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-0" style="color: #0b1b2e;">Jorge Quispe</h6>
                                    <small class="text-muted">Infraestructura Vial SAC</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h2 fw-bold mb-3" style="color: #0b1b2e;">Preguntas Frecuentes</h2>
                <p class="text-muted mb-0">Respuestas a las dudas más comunes</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item border-0 mb-3" style="background-color: #e7f3ff;">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1"
                                    style="background-color: #e7f3ff; color: #0b1b2e;">
                                    ¿Cuál es el tiempo mínimo de alquiler?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="background-color: white;">
                                    Ofrecemos planes flexibles desde alquiler por horas hasta contratos mensuales. El tiempo
                                    mínimo de alquiler varía según el tipo de maquinaria, pero generalmente es de 4 horas
                                    para equipos estándar.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3" style="background-color: #f8f9fa;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false"
                                    aria-controls="faq2" style="background-color: #f8f9fa; color: #0b1b2e;">
                                    ¿Incluyen operador certificado?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="background-color: white;">
                                    Sí, todos nuestros servicios pueden incluir operadores certificados con amplia
                                    experiencia. También ofrecemos la opción de alquiler sin operador si cuentas con
                                    personal capacitado.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3" style="background-color: #f8f9fa;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false"
                                    aria-controls="faq3" style="background-color: #f8f9fa; color: #0b1b2e;">
                                    ¿Qué incluye el servicio de mantenimiento?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="background-color: white;">
                                    Todos nuestros equipos cuentan con mantenimiento preventivo y correctivo incluido. En
                                    caso de fallas técnicas, realizamos el reemplazo del equipo sin costo adicional.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3" style="background-color: #f8f9fa;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false"
                                    aria-controls="faq4" style="background-color: #f8f9fa; color: #0b1b2e;">
                                    ¿Trabajan en zonas alejadas de Cusco?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="background-color: white;">
                                    Sí, brindamos servicio en toda la región de Cusco y zonas aledañas. Para proyectos en
                                    ubicaciones remotas, coordinamos el transporte y logística necesaria.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 mb-3" style="background-color: #f8f9fa;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false"
                                    aria-controls="faq5" style="background-color: #f8f9fa; color: #0b1b2e;">
                                    ¿Qué requisitos necesito para alquilar?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body" style="background-color: white;">
                                    Para empresas: RUC activo, carta fianza o garantía, y contrato firmado. Para personas
                                    naturales: DNI, garantía y firma de contrato. Nuestro equipo te asesorará en todo el
                                    proceso.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background-color: #ef6c2c;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0">
                    <h3 class="h2 fw-bold text-white mb-3">¿Listo para empezar tu proyecto?</h3>
                    <p class="text-white mb-0">Solicita una cotización personalizada y recibe asesoría especializada en
                        minutos.</p>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <a href="{{ route('contacto.index') }}" class="btn btn-lg px-5 py-3 fw-bold"
                        style="background-color: white; color: #0b1b2e; border: none;">
                        <i class="fas fa-phone me-2"></i>Contactar Ahora
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
