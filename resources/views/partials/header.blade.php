<header class="maquiperu-header">
    <!-- Topbar Maquiperu - Más grande y amigable -->
    <div class="maquiperu-topbar">
        <div class="container-fluid">
            <div class="row align-items-center py-3">

                <!-- Logo ETC Vallenas -->
                <div class="col-md-3 col-lg-3">
                    <div class="topbar-logo-section">
                        <a href="{{ route('home') }}" class="brand-logo-link">
                            <div class="maquiperu-logo-exact">
                                <div class="logo-symbol-maquiperu">
                                    <svg class="maquiperu-logo-svg" viewBox="0 0 60 32" aria-hidden="true">
                                        <polygon points="2,30 12,4 22,30" fill="#ffffff" />
                                        <path d="M26 4H54L40 30Z" fill="none" stroke="#ffffff" stroke-width="3"
                                            stroke-linejoin="miter" />
                                    </svg>
                                </div>
                                <div class="logo-text-container">
                                    <div class="logo-main-text">ETC VALLENAS</div>
                                    <div class="logo-sub-text">MAQUINARIAS Y EQUIPOS DEL CUSCO S.A.</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Información de contacto central -->
                <div class="col-md-5 col-lg-6">
                    <div class="maquiperu-contact-info">

                        <!-- Teléfono -->
                        <div class="maquiperu-contact-item">
                            <div class="maquiperu-icon-box">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="maquiperu-contact-text">
                                <span class="contact-number">(+51) 982355298</span>
                                <span class="contact-label">Oficina central</span>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="maquiperu-contact-item">
                            <div class="maquiperu-icon-box email-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="maquiperu-contact-text">
                                <span class="contact-number">fernando@etcvallenas.com</span>
                                <span class="contact-label">Correo electrónico</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Redes sociales -->
                <div class="col-md-4 col-lg-3">
                    <div class="maquiperu-social-networks">
                        <a href="https://www.facebook.com/etcvallenas" target="_blank" class="maquiperu-social-icon"
                            aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/etcvallenas" target="_blank" class="maquiperu-social-icon"
                            aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/@etcvallenas" target="_blank" class="maquiperu-social-icon"
                            aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="https://pe.linkedin.com/company/etcvallenas" target="_blank"
                            class="maquiperu-social-icon" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Topbar móvil simplificado -->
    <div class="mobile-topbar d-md-none">
        <div class="container-fluid">
            <div class="row align-items-center py-2">
                <div class="col-6">
                    <div class="mobile-contact">
                        <a href="tel:+51984123456" class="mobile-phone-link">
                            <i class="fas fa-phone me-2"></i>
                            <span>(+51) 982355298</span>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mobile-social">
                        <a href="https://www.facebook.com/etcvallenas" class="mobile-social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/etcvallenas" class="mobile-social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/51984123456" class="mobile-social-link">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar naranja exacto como Maquiperu -->
    <nav class="navbar-orange navbar-expand-lg">
        <!-- Inline fix: asegurar que el colapso del navbar sea visible en pantallas >= lg -->
        <style>
            @media (min-width: 992px) {
                #mainNav {
                    display: flex !important;
                    visibility: visible !important;
                    opacity: 1 !important;
                }
            }
        </style>
        <div class="container">
            <div class="navbar-content">
                <!-- Logo para móvil -->
                <div class="mobile-logo d-lg-none">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="ETC Vallenas" class="mobile-logo-img">
                    </a>
                </div>

                <!-- Botón hamburguesa para móvil -->
                <button class="mobile-toggle d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Menú principal -->
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="main-menu">
                        <li><a href="{{ route('home') }}"
                                class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">HOME</a></li>

                        <li class="dropdown-item">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('empresa.*') ? 'active' : '' }}">NOSOTROS</a>
                            <ul class="submenu">
                                <li><a href="{{ route('empresa.index') }}">Sobre Nosotros</a></li>
                                <li><a href="{{ route('empresa.historia') }}">Historia</a></li>
                                <li><a href="{{ route('empresa.valores') }}">Misión y Valores</a></li>
                                <li><a href="{{ route('empresa.certificaciones') }}">Certificaciones</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-item">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('maquinaria.*') ? 'active' : '' }}">
                                MARCAS <i class="dropdown-arrow fas fa-chevron-down"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ route('maquinaria.index') }}">Todas las Marcas</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Excavadoras</a></li>
                                <li><a href="#">Cargadores</a></li>
                                <li><a href="#">Retroexcavadoras</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ route('proyectos.index') }}"
                                class="menu-link {{ request()->routeIs('proyectos.*') ? 'active' : '' }}">MAQUIRENTA</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('servicios.*') ? 'active' : '' }}">
                                SERVICIOS <i class="dropdown-arrow fas fa-chevron-down"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="{{ route('servicios.index') }}">Todos los Servicios</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Mantenimiento</a></li>
                                <li><a href="#">Reparaciones</a></li>
                                <li><a href="#">Repuestos</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-item">
                            <a href="#" class="menu-link dropdown-toggle">
                                REPUESTOS <i class="dropdown-arrow fas fa-chevron-down"></i>
                            </a>
                            <ul class="submenu">
                                <li><a href="#">Repuestos Originales</a></li>
                                <li><a href="#">Filtros</a></li>
                                <li><a href="#">Aceites</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ route('blog.index') }}"
                                class="menu-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">BLOG</a></li>
                        <li><a href="{{ route('contacto.index') }}"
                                class="menu-link {{ request()->routeIs('contacto.*') ? 'active' : '' }}">CONTACTO</a>
                        </li>

                        @auth
                            <!-- Usuario autenticado -->
                            <li class="dropdown-item user-menu">
                                <a href="#" class="menu-link dropdown-toggle">
                                    <i class="fas fa-user"></i> {{ Auth::user()->nombre }}
                                </a>
                                <ul class="submenu">
                                    <li><a href="{{ route('usuario.dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('usuario.perfil') }}">Mi Perfil</a></li>
                                    @if (Auth::user()->rol === 'admin')
                                        <li class="divider"></li>
                                        <li><a href="{{ route('admin.index') }}">Panel Admin</a></li>
                                    @endif
                                    <li class="divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="logout-btn">Cerrar Sesión</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <!-- Botón de login -->
                            <li><a href="{{ route('login') }}" class="menu-link">INGRESAR</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
