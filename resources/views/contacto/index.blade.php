@extends('layouts.app')

@section('title', 'Contacto - ETC Vallenas')
@section('description',
    'Contáctanos para más información sobre alquiler de maquinaria pesada y servicios de
    construcción en Cusco, Perú.')

@section('content')
    <section class="py-5 bg-gradient-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">Contáctanos</h1>
                    <p class="lead mb-0">Estamos listos para atender tus consultas y ayudarte con tu proyecto</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="bg-white p-4 rounded-3 shadow d-inline-block">
                        <i class="fas fa-envelope text-primary fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="card border-0 shadow">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="fw-bold mb-4">Envíanos un mensaje</h3>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('contacto.enviar') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nombre <span class="text-danger">*</span></label>
                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            value="{{ old('nombre') }}" required>
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Teléfono <span class="text-danger">*</span></label>
                                        <input type="tel" name="telefono"
                                            class="form-control @error('telefono') is-invalid @enderror"
                                            value="{{ old('telefono') }}" required>
                                        @error('telefono')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Empresa</label>
                                        <input type="text" name="empresa" class="form-control"
                                            value="{{ old('empresa') }}">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Asunto <span class="text-danger">*</span></label>
                                        <select name="asunto" class="form-select @error('asunto') is-invalid @enderror"
                                            required>
                                            <option value="">Seleccionar...</option>
                                            <option value="cotizacion"
                                                {{ old('asunto') == 'cotizacion' ? 'selected' : '' }}>Solicitar Cotización
                                            </option>
                                            <option value="alquiler" {{ old('asunto') == 'alquiler' ? 'selected' : '' }}>
                                                Alquiler de Maquinaria</option>
                                            <option value="servicio" {{ old('asunto') == 'servicio' ? 'selected' : '' }}>
                                                Información de Servicios</option>
                                            <option value="proyecto" {{ old('asunto') == 'proyecto' ? 'selected' : '' }}>
                                                Consulta sobre Proyecto</option>
                                            <option value="otro" {{ old('asunto') == 'otro' ? 'selected' : '' }}>Otro
                                            </option>
                                        </select>
                                        @error('asunto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Mensaje <span class="text-danger">*</span></label>
                                        <textarea name="mensaje" class="form-control @error('mensaje') is-invalid @enderror" rows="5" required>{{ old('mensaje') }}</textarea>
                                        @error('mensaje')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-lg px-4 py-3 fw-semibold">
                                            <i class="fas fa-paper-plane me-2"></i>Enviar Mensaje
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Información de Contacto</h5>

                            <div class="mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Dirección</h6>
                                        <p class="text-muted mb-0">
                                            Av. almodena 123<br>
                                            Cusco, Perú
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Teléfono</h6>
                                        <p class="text-muted mb-0">
                                            <a href="tel:+51984123456" class="text-decoration-none">+51 984 123 456</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="text-muted mb-0">
                                            <a href="mailto:vallenasfernando43@gmail.com" class="text-decoration-none">
                                                vallenasfernando43@gmail.com
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="d-flex align-items-start">
                                    <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1">Horario de Atención</h6>
                                        <p class="text-muted mb-0">
                                            Lunes - Viernes: 8:00 AM - 6:00 PM<br>
                                            Sábados: 8:00 AM - 1:00 PM<br>
                                            Domingos: Cerrado
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Síguenos en Redes Sociales</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="https://facebook.com/etcvallenas"
                                    class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://instagram.com/etcvallenas"
                                    class="btn btn-danger rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://linkedin.com/company/etcvallenas"
                                    class="btn btn-info rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://wa.me/51984123456"
                                    class="btn btn-success rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 50px; height: 50px;" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h3 class="fw-bold mb-2">Encuéntranos</h3>
                <p class="text-muted">Visítanos en nuestra oficina en Cusco</p>
            </div>
            <div class="card border-0 shadow overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d487.32958682773445!2d-71.96788789228498!3d-13.531952999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916dd5f3d9e1e5bb%3A0x8a9b4d4b5f5e5e5e!2sAv.%20Los%20Incas%20123%2C%20Cusco!5e0!3m2!1ses!2spe!4v1234567890123!5m2!1ses!2spe"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" title="Ubicación de ETC Vallenas en Cusco">
                </iframe>
            </div>
        </div>
    </section>
@endsection
