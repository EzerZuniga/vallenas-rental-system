<footer class="footer-modern text-white" role="contentinfo">
    <div class="footer-modern__overlay" aria-hidden="true"></div>
    <div class="container-fluid position-relative py-3 py-lg-4 px-3 px-md-4 px-lg-5 footer-container">
        <div class="row g-3">
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <a href="{{ route('home') }}" class="d-inline-flex align-items-center mb-2 brand-logo-link"
                    aria-label="ETC Vallenas - Ir al inicio">
                    <div class="maquiperu-logo-exact d-flex align-items-center">
                        <svg class="site-logo w-100 h-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 -18 820 210"
                            role="img" aria-labelledby="logoTitleFooter logoDescFooter"
                            preserveAspectRatio="xMinYMid meet">
                            <style>
                                <![CDATA[
                                .brand-text {
                                    font-family: 'Bebas Neue', 'Oswald', 'Montserrat', Arial, sans-serif;
                                    font-weight: 700;
                                    fill: #ffffff;
                                    font-size: 120px;
                                    letter-spacing: 1px
                                }

                                .brand-sub {
                                    font-family: 'Plus Jakarta Sans', 'Inter', Arial, sans-serif;
                                    font-weight: 700;
                                    fill: rgba(255, 255, 255, 0.9);
                                    font-size: 24px;
                                    letter-spacing: 1.2px
                                }
                                ]]>
                            </style>
                            <g transform="translate(6,0)">
                                <text class="brand-text" x="0" y="82">ETC VALLENAS</text>
                                <text class="brand-sub" x="0" y="112">MAQUINARIAS Y EQUIPOS DEL CUSCO S.A.</text>
                            </g>
                        </svg>
                    </div>
                </a>
                <p class="text-white-50 pe-lg-3 pe-xl-4 mb-3">
                    Somos la red integral de alquiler, servicios y soporte de maquinaria pesada que impulsa proyectos
                    de minería, construcción e infraestructura en el sur del Perú.
                </p>
                <div class="d-flex flex-wrap gap-2" aria-label="Redes sociales">
                    <a href="https://facebook.com/etcvallenas" target="_blank" rel="noopener noreferrer"
                        aria-label="Facebook" class="social-btn">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                    <a href="https://instagram.com/etcvallenas" target="_blank" rel="noopener noreferrer"
                        aria-label="Instagram" class="social-btn">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="https://linkedin.com/company/etcvallenas" target="_blank" rel="noopener noreferrer"
                        aria-label="LinkedIn" class="social-btn">
                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                    </a>
                    <a href="https://wa.me/51984123456" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"
                        class="social-btn">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-2 col-xl-2">
                <h6 class="text-uppercase fw-semibold letter-spacing-2 small mb-2">Navegación</h6>
                <nav aria-label="Enlaces principales">
                    <ul class="list-unstyled mb-0 footer-links">
                        <li><a href="{{ route('home') }}" class="footer-link">Inicio</a></li>
                        <li><a href="{{ route('empresa.index') }}" class="footer-link">Empresa</a></li>
                        <li><a href="{{ route('maquinaria.index') }}" class="footer-link">Maquinaria</a></li>
                        <li><a href="{{ route('proyectos.index') }}" class="footer-link">Proyectos</a></li>
                        <li><a href="{{ route('blog.index') }}" class="footer-link">Blog</a></li>
                        <li><a href="{{ route('contacto.index') }}" class="footer-link">Contacto</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-12 col-sm-6 col-lg-3 col-xl-3">
                <h6 class="text-uppercase fw-semibold letter-spacing-2 small mb-2">Servicios destacados</h6>
                <ul class="list-unstyled text-white-50 mb-4 footer-services">
                    <li>
                        <a href="{{ route('servicios.index') }}?tipo=alquiler" class="footer-link">Alquiler de
                            maquinaria pesada</a>
                    </li>
                    <li>
                        <a href="{{ route('servicios.index') }}?tipo=mantenimiento" class="footer-link">Mantenimiento
                            preventivo y correctivo</a>
                    </li>
                    <li>
                        <a href="{{ route('servicios.index') }}?tipo=consultoria" class="footer-link">Consultoría y
                            ingeniería de proyectos</a>
                    </li>
                    <li>
                        <a href="{{ route('servicios.index') }}?tipo=transporte" class="footer-link">Transporte y
                            logística especializada</a>
                    </li>
                    <li>
                        <a href="{{ route('servicios.index') }}?tipo=reparaciones" class="footer-link">Reparaciones
                            in situ y emergencias</a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-6 col-lg-3 col-xl-3 ms-lg-auto pe-lg-0">
                <h6 class="text-uppercase fw-semibold letter-spacing-2 small mb-2">Contacto directo</h6>
                <div class="footer-contact card bg-transparent border border-light rounded-4 mb-2">
                    <div class="card-body p-2">
                        <ul class="list-unstyled mb-0 text-white-50 footer-contact-list">
                            <li>
                                <i class="fas fa-map-marker-alt text-warning me-3" aria-hidden="true"></i>
                                Cusco, Perú
                            </li>
                            <li>
                                <i class="fas fa-phone text-warning me-3" aria-hidden="true"></i>
                                <a href="tel:+51982355298" class="footer-link">(+51) 982 355 298</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope text-warning me-3" aria-hidden="true"></i>
                                <a href="mailto:fernando@etcvallenas.com"
                                    class="footer-link">fernando@etcvallenas.com</a>
                            </li>
                            <li>
                                <i class="fas fa-clock text-warning me-3" aria-hidden="true"></i>
                                Lunes a sábado • 8:00 - 18:00
                            </li>
                        </ul>
                    </div>
                </div>

                <h6 class="fw-semibold mb-2">Suscríbete a nuestras novedades</h6>
                @if (session('newsletter_status'))
                    <div class="alert alert-success py-2 mb-3" role="status">{{ session('newsletter_status') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success py-2 mb-3" role="status">{{ session('success') }}</div>
                @endif
                <form action="{{ url('/newsletter/subscribe') }}" method="POST" class="footer-newsletter"
                    novalidate>
                    @csrf
                    <label for="newsletter-email" class="visually-hidden">Correo electrónico</label>
                    <div class="input-group input-group-sm">
                        <input id="newsletter-email" name="email" type="email" required
                            placeholder="Ingresa tu correo" aria-label="Correo electrónico"
                            class="form-control border-0" />
                        <button class="btn btn-brand" type="submit" aria-label="Suscribirse">Suscribir</button>
                    </div>
                    <p class="text-white-50 small mt-2 mb-0">Contenido relevante, ofertas y alertas de disponibilidad.
                    </p>
                </form>
            </div>
        </div>

        <hr class="my-3 footer-divider">
        <div class="row g-2 align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 text-white-50 footer-copy">&copy; {{ date('Y') }} ETC Vallenas.
                    Todos los derechos
                    reservados.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0 text-white-50 footer-copy">Desarrollado por
                    <a href="https://instagram.com/ezerzuniga.oficial16" target="_blank" rel="noopener noreferrer"
                        class="footer-link fw-semibold">Ezer Zuñiga</a>
                </p>
            </div>
        </div>
    </div>

</footer>
