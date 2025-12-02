<div class="admin-mini-header navbar-orange py-2">
    <div class="container d-flex justify-content-end align-items-center">
        @auth
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none text-dark" href="#" id="adminUserMenu"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-2" style="font-size:1.1rem"></i>
                    <strong class="me-2">{{ strtoupper(optional(auth()->user())->nombre ?? 'USUARIO') }}</strong>
                    <i class="fas fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminUserMenu">
                    <li><a class="dropdown-item" href="{{ route('usuario.dashboard') }}">Mi panel</a></li>
                    <li><a class="dropdown-item" href="{{ route('usuario.perfil') }}">Mi perfil</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.index') }}">Panel de administración</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-danger">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
</div>
