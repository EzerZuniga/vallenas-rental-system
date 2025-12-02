@php
    $contactLinks = [
        [
            'href' => 'tel:+51927198800',
            'text' => '(51) 927198800',
            'ariaLabel' => 'Llamar a oficina central',
            'label' => 'Oficina central',
            'hiddenSuffix' => 'llamar a oficina central',
            'iconClass' => 'fas fa-phone',
            'itemClass' => 'phone-item',
            'iconBoxClass' => '',
        ],
        [
            'href' => 'mailto:fernando@vallenas.com',
            'text' => 'fernando@vallenas.com',
            'ariaLabel' => 'Enviar correo a fernando@vallenas.com',
            'label' => 'Correo electrónico',
            'hiddenSuffix' => 'enviar correo',
            'iconClass' => 'fas fa-envelope-open-text',
            'itemClass' => 'email-item',
            'iconBoxClass' => ' email-icon',
        ],
    ];

    $socialLinks = [
        [
            'href' => 'https://www.facebook.com/etcvallenas',
            'class' => 'facebook',
            'icon' => 'fab fa-facebook-f',
            'label' => 'Facebook',
        ],
        [
            'href' => 'https://www.instagram.com/etcvallenas',
            'class' => 'instagram',
            'icon' => 'fab fa-instagram',
            'label' => 'Instagram',
        ],
        [
            'href' => 'https://www.youtube.com/@etcvallenas',
            'class' => 'youtube',
            'icon' => 'fab fa-youtube',
            'label' => 'YouTube',
        ],
        [
            'href' => 'https://pe.linkedin.com/company/etcvallenas',
            'class' => 'linkedin',
            'icon' => 'fab fa-linkedin-in',
            'label' => 'LinkedIn',
        ],
    ];
@endphp

<header class="maquiperu-header">
    <div class="maquiperu-topbar">
        <div class="container-fluid">
            <div class="row align-items-center py-3">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="topbar-logo-section">
                        <a href="{{ route('home') }}" class="brand-logo-link" aria-label="ETC Vallenas - Ir al inicio">
                            <div class="maquiperu-logo-exact">
                                @include('partials.svg.logo-inline', ['logoClass' => 'site-logo'])
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-5">
                    <div class="maquiperu-contact-info">
                        @foreach ($contactLinks as $contact)
                            <div class="maquiperu-contact-item {{ $contact['itemClass'] }}">
                                <div class="maquiperu-icon-box{{ $contact['iconBoxClass'] }}">
                                    <i class="{{ $contact['iconClass'] }}" aria-hidden="true"></i>
                                </div>
                                <div class="maquiperu-contact-text">
                                    <a href="{{ $contact['href'] }}" class="contact-number"
                                        aria-label="{{ $contact['ariaLabel'] }}">{{ $contact['text'] }}<span
                                            class="visually-hidden">, {{ $contact['hiddenSuffix'] }}</span></a>
                                    <span class="contact-label">{{ $contact['label'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-3 col-lg-3">
                    <div class="maquiperu-social-networks">
                        @foreach ($socialLinks as $link)
                            <a href="{{ $link['href'] }}" target="_blank" rel="noopener noreferrer"
                                class="maquiperu-social-icon {{ $link['class'] }}" aria-label="{{ $link['label'] }}">
                                <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-topbar d-lg-none">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="mobile-brand" aria-label="ETC Vallenas - Ir al inicio">
                @include('partials.svg.logo-inline', ['logoClass' => 'site-logo mobile-brand-logo'])
            </a>

            <button class="mobile-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Abrir menú principal">
                <i class="fas fa-bars" aria-hidden="true"></i>
                <span>Menú</span>
            </button>
        </div>
    </div>

    <nav class="navbar-orange navbar-expand-lg">
        <div class="container">
            <div class="navbar-content">
                <div class="collapse navbar-collapse" id="mainNav" role="navigation" aria-label="Menú principal">
                    <ul class="main-menu">
                        <li>
                            <a href="{{ route('home') }}"
                                class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('empresa.*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Empresa <i
                                    class="dropdown-arrow fas fa-chevron-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu submenu" role="menu" aria-label="Submenú Empresa">
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('empresa.index') }}">Resumen</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('empresa.sobre-nosotros') }}">Sobre nosotros</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('empresa.historia') }}">Historia</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('empresa.valores') }}">Misión y valores</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('empresa.certificaciones') }}">Certificaciones</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('maquinaria.*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Maquinaria <i
                                    class="dropdown-arrow fas fa-chevron-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu submenu" role="menu" aria-label="Submenú Maquinaria">
                                <li><a class="dropdown-item" role="menuitem" href="{{ route('maquinaria.index') }}">Ver
                                        todas</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('maquinaria.index') }}#marcas">Por marca</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('maquinaria.index') }}#categorias">Por tipo</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('blog.*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <i
                                    class="dropdown-arrow fas fa-chevron-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu submenu" role="menu" aria-label="Submenú Blog">
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('blog.index') }}">Últimas publicaciones</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('blog.index') }}#categorias">Categorías</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('contacto.*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contacto <i
                                    class="dropdown-arrow fas fa-chevron-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu submenu" role="menu" aria-label="Submenú Contacto">
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('contacto.index') }}">Contacto</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('contacto.soporte') }}">Soporte</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('contacto.ubicacion') }}">Ubicación</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('proyectos.*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proyectos <i
                                    class="dropdown-arrow fas fa-chevron-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu submenu" role="menu" aria-label="Submenú Proyectos">
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('proyectos.index') }}">Todos los proyectos</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('proyectos.index') }}#destacados">Destacados</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#"
                                class="menu-link dropdown-toggle {{ request()->routeIs('servicios.*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios <i
                                    class="dropdown-arrow fas fa-chevron-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu submenu" role="menu" aria-label="Submenú Servicios">
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('servicios.index') }}">Todos los servicios</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('servicios.index') }}#mantenimiento">Mantenimiento</a></li>
                                <li><a class="dropdown-item" role="menuitem"
                                        href="{{ route('servicios.index') }}#reparaciones">Reparaciones</a></li>
                            </ul>
                        </li>

                        @auth
                            <li class="user-menu dropdown">
                                <a href="#" class="menu-link dropdown-toggle" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false"
                                    aria-label="Menú de usuario"><i class="fas fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->nombre }}</a>
                                <ul class="submenu" role="menu" aria-label="Menú usuario">
                                    <li><a role="menuitem" href="{{ route('usuario.dashboard') }}">Mi panel</a></li>
                                    <li><a role="menuitem" href="{{ route('usuario.perfil') }}">Mi perfil</a></li>
                                    @if (Auth::user()->rol === 'admin')
                                        <li class="divider"></li>
                                        <li><a role="menuitem" href="{{ route('admin.index') }}">Panel de
                                                administración</a></li>
                                    @endif
                                    <li class="divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="logout-btn">Cerrar sesión</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="menu-link login-icon" aria-label="Ingresar">
                                    <svg class="login-avatar-svg" xmlns="http://www.w3.org/2000/svg" width="22"
                                        height="22" viewBox="0 0 24 24" role="img" aria-hidden="true"
                                        focusable="false">
                                        <path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" fill="none" stroke="currentColor"
                                            stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4 20c0-3.314 2.686-6 6-6h4c3.314 0 6 2.686 6 6" fill="none"
                                            stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <span class="visually-hidden">Ingresar</span>
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <div class="mobile-nav-meta d-lg-none" aria-label="Información de contacto móvil">
                        <div class="mobile-nav-contact">
                            @foreach ($contactLinks as $contact)
                                <a href="{{ $contact['href'] }}" class="mobile-contact-link"
                                    aria-label="{{ $contact['ariaLabel'] }}">
                                    <i class="{{ $contact['iconClass'] }}" aria-hidden="true"></i>
                                    <span>{{ $contact['text'] }}</span>
                                </a>
                            @endforeach
                        </div>
                        <div class="mobile-nav-social">
                            @foreach ($socialLinks as $link)
                                <a href="{{ $link['href'] }}" target="_blank" rel="noopener noreferrer"
                                    class="mobile-social-link {{ $link['class'] }}"
                                    aria-label="{{ $link['label'] }}">
                                    <i class="{{ $link['icon'] }}" aria-hidden="true"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
