@extends('layouts.simple')

@section('title', 'Configuración - ETC Vallenas')

@section('content')
    <section class="py-4 bg-light">
        <div class="container">
            <h1 class="h3 fw-bold mb-0">Configuración</h1>
            <p class="text-muted mb-0">Personaliza tus preferencias y ajustes de la cuenta</p>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="card border-0 shadow">
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="#notificaciones" class="list-group-item list-group-item-action active"
                                    data-bs-toggle="list">
                                    <i class="fas fa-bell me-2"></i>Notificaciones
                                </a>
                                <a href="#privacidad" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="fas fa-lock me-2"></i>Privacidad
                                </a>
                                <a href="#seguridad" class="list-group-item list-group-item-action" data-bs-toggle="list">
                                    <i class="fas fa-shield-alt me-2"></i>Seguridad
                                </a>
                                <a href="#preferencias" class="list-group-item list-group-item-action"
                                    data-bs-toggle="list">
                                    <i class="fas fa-cog me-2"></i>Preferencias
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <form action="{{ route('usuario.actualizar-configuracion') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="notificaciones">
                                <div class="card border-0 shadow">
                                    <div class="card-body p-4">
                                        <h5 class="fw-bold mb-4"><i class="fas fa-bell me-2"></i>Notificaciones</h5>

                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-3">Email</h6>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="notificaciones[email_nuevos_servicios]" value="1" checked>
                                                <label class="form-check-label">Nuevos servicios y promociones</label>
                                            </div>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="notificaciones[email_actualizaciones]" value="1" checked>
                                                <label class="form-check-label">Actualizaciones de proyectos</label>
                                            </div>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="notificaciones[email_newsletter]" value="1">
                                                <label class="form-check-label">Newsletter mensual</label>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-3">Sistema</h6>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="notificaciones[sistema_mensajes]" value="1" checked>
                                                <label class="form-check-label">Mensajes y comunicaciones</label>
                                            </div>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="notificaciones[sistema_alertas]" value="1" checked>
                                                <label class="form-check-label">Alertas importantes</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="privacidad">
                                <div class="card border-0 shadow">
                                    <div class="card-body p-4">
                                        <h5 class="fw-bold mb-4"><i class="fas fa-lock me-2"></i>Privacidad</h5>

                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-3">Visibilidad del Perfil</h6>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio"
                                                    name="privacidad[visibilidad_perfil]" value="publico"
                                                    id="perfilPublico">
                                                <label class="form-check-label" for="perfilPublico">
                                                    <strong>Público</strong>
                                                    <small class="text-muted d-block">Tu perfil es visible para
                                                        todos</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio"
                                                    name="privacidad[visibilidad_perfil]" value="privado" id="perfilPrivado"
                                                    checked>
                                                <label class="form-check-label" for="perfilPrivado">
                                                    <strong>Privado</strong>
                                                    <small class="text-muted d-block">Solo visible para
                                                        administradores</small>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-3">Compartir Información</h6>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="privacidad[compartir_empresa]" value="1">
                                                <label class="form-check-label">Mostrar información de mi empresa</label>
                                            </div>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox"
                                                    name="privacidad[compartir_telefono]" value="1">
                                                <label class="form-check-label">Mostrar mi número de teléfono</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="seguridad">
                                <div class="card border-0 shadow">
                                    <div class="card-body p-4">
                                        <h5 class="fw-bold mb-4"><i class="fas fa-shield-alt me-2"></i>Seguridad</h5>

                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-3">Contraseña</h6>
                                            <p class="text-muted mb-3">
                                                Última actualización:
                                                {{ Auth::user()->updated_at->format('d/m/Y') }}
                                            </p>
                                            <a href="{{ route('usuario.perfil') }}" class="btn btn-outline-primary">
                                                <i class="fas fa-key me-2"></i>Cambiar Contraseña
                                            </a>
                                        </div>

                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-3">Autenticación en Dos Pasos</h6>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    name="seguridad[autenticacion_dos_pasos]" value="1">
                                                <label class="form-check-label">Activar autenticación en dos pasos</label>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <h6 class="fw-bold mb-3">Sesiones Activas</h6>
                                            <div class="list-group">
                                                <div class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <i class="fas fa-desktop text-primary me-2"></i>
                                                            <strong>Windows PC</strong>
                                                            <small class="text-muted d-block">Última actividad: Hoy a las
                                                                10:30 AM</small>
                                                        </div>
                                                        <span class="badge bg-success">Actual</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="preferencias">
                                <div class="card border-0 shadow">
                                    <div class="card-body p-4">
                                        <h5 class="fw-bold mb-4"><i class="fas fa-cog me-2"></i>Preferencias</h5>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Idioma</label>
                                                <select class="form-select" name="preferencias[idioma]">
                                                    <option value="es" selected>Español</option>
                                                    <option value="en">English</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Zona Horaria</label>
                                                <select class="form-select" name="preferencias[zona_horaria]">
                                                    <option value="America/Lima" selected>Lima (GMT-5)</option>
                                                    <option value="America/New_York">Nueva York (GMT-4)</option>
                                                    <option value="Europe/Madrid">Madrid (GMT+1)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Formato de Fecha</label>
                                                <select class="form-select" name="preferencias[formato_fecha]">
                                                    <option value="dd/mm/yyyy" selected>DD/MM/YYYY</option>
                                                    <option value="mm/dd/yyyy">MM/DD/YYYY</option>
                                                    <option value="yyyy-mm-dd">YYYY-MM-DD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i>Guardar Cambios
                            </button>
                            <a href="{{ route('usuario.dashboard') }}" class="btn btn-outline-secondary ms-2">
                                <i class="fas fa-arrow-left me-2"></i>Volver al Dashboard
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
