@extends('layouts.app')

@section('title', 'Nuestra Historia - ETC Vallenas')

@section('content')
    <section class="py-5 bg-gradient-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">Nuestra Historia</h1>
                    <p class="lead mb-0">Un camino de esfuerzo, dedicación y compromiso con Cusco</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-5 align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6Qb4Nu3N_nnoYZwaj4R9Li90GYNkbH9Sw8Q&s') }}"
                                alt="Fundación 2008" class="img-fluid rounded shadow">
                        </div>
                        <div class="col-lg-6">
                            <span class="badge bg-primary mb-3">2008</span>
                            <h3 class="fw-bold mb-3">Los Inicios</h3>
                            <p class="text-muted mb-4">
                                ETC Vallenas nace en Cusco con la visión de Fernando Vallenas de ofrecer
                                soluciones confiables en alquiler de maquinaria pesada. Iniciamos con
                                solo 3 equipos y mucha determinación.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Primera excavadora
                                    adquirida</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Primer contrato con
                                    constructora local</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Equipo de 5
                                    colaboradores</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mb-5 align-items-center flex-lg-row-reverse">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="{{ url('https://www.certificacionescchsl.com/wp-content/uploads/2022/06/capacitacion-certificacion-operador-cargador-frontal.jpg') }}"
                                alt="Expansión 2012" class="img-fluid rounded shadow">
                        </div>
                        <div class="col-lg-6">
                            <span class="badge bg-success mb-3">2012</span>
                            <h3 class="fw-bold mb-3">Crecimiento y Expansión</h3>
                            <p class="text-muted mb-4">
                                Alcanzamos los 20 equipos en nuestra flota y expandimos nuestros servicios
                                al sector minero. Inauguramos nuestro primer taller de mantenimiento.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>20 equipos en
                                    operación</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Taller de
                                    mantenimiento propio</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Ingreso al sector
                                    minero</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mb-5 align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWZpp9uxGKrES8z3fF9ZazHsIMwW9vWh09zA&s') }}"
                                alt="Certificaciones 2016" class="img-fluid rounded shadow">
                        </div>
                        <div class="col-lg-6">
                            <span class="badge bg-warning mb-3">2016</span>
                            <h3 class="fw-bold mb-3">Certificaciones Internacionales</h3>
                            <p class="text-muted mb-4">
                                Obtuvimos las primeras certificaciones ISO 9001 y OHSAS 18001,
                                consolidándonos como empresa líder en calidad y seguridad.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Certificación ISO
                                    9001:2015</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Certificación OHSAS
                                    18001</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>50+ proyectos
                                    completados</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row mb-5 align-items-center flex-lg-row-reverse">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5oecAGceMEKcZuCKmcCaFuZFSwA0y4BDcbQ&s') }}"
                                alt="Tecnología 2020" class="img-fluid rounded shadow">
                        </div>
                        <div class="col-lg-6">
                            <span class="badge bg-info mb-3">2020</span>
                            <h3 class="fw-bold mb-3">Transformación Digital</h3>
                            <p class="text-muted mb-4">
                                Implementamos sistemas de rastreo GPS en todos nuestros equipos y
                                lanzamos nuestra plataforma digital para gestión de proyectos.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Sistema GPS en toda
                                    la flota</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Plataforma digital
                                    operativa</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>70+ equipos modernos
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="{{ url('https://www.rumbominero.com/wp-content/uploads/2025/12/Maquinarias-U-Guil-Cusco-compressed.jpg') }}"
                                alt="Actualidad 2024" class="img-fluid rounded shadow">
                        </div>
                        <div class="col-lg-6">
                            <span class="badge bg-danger mb-3">2024</span>
                            <h3 class="fw-bold mb-3">Líderes en el Sur del Perú</h3>
                            <p class="text-muted mb-4">
                                Hoy contamos con más de 85 equipos de última generación, un equipo de
                                100+ colaboradores y presencia en los principales proyectos de la región.
                            </p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>85+ equipos de
                                    última tecnología</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>100+ colaboradores
                                </li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>450+ proyectos
                                    completados</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>280+ clientes
                                    satisfechos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="h1 fw-bold mb-3">Nuestros Valores nos Definen</h2>
            <p class="text-muted lead mb-4">Conoce los principios que guían nuestro trabajo diario</p>
            <a href="{{ route('empresa.valores') }}" class="btn btn-primary btn-lg px-4 py-3 fw-semibold">
                <i class="fas fa-heart me-2"></i>Ver Nuestros Valores
            </a>
        </div>
    </section>
@endsection
