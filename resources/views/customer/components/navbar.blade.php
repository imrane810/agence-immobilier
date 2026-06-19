<nav class="navbar navbar-expand-lg navbar-dark"
    style="background: var(--primary-dark); padding: 0.85rem 0; box-shadow: 0 2px 12px rgba(30, 58, 138, 0.2);">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/" style="font-size: 1.25rem; letter-spacing: -0.3px;">
            <i class="fas fa-building" style="color: var(--primary-light);"></i>
            Agence Immo
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            style="color: rgba(255,255,255,0.7);">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- MENU PRINCIPAL --}}
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/"
                        style="color: rgba(255,255,255,0.8); font-weight: 500; font-size: 0.9rem; padding: 0.5rem 1rem; border-radius: 8px; transition: all 0.25s ease-in-out;">
                        <i class="fas fa-home me-1"></i> Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('properties*') ? 'active' : '' }}"
                        href="{{ route('properties.index') }}"
                        style="color: rgba(255,255,255,0.8); font-weight: 500; font-size: 0.9rem; padding: 0.5rem 1rem; border-radius: 8px; transition: all 0.25s ease-in-out;">
                        <i class="fas fa-list me-1"></i> Biens
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('reservations*') ? 'active' : '' }}" href="#"
                        style="color: rgba(255,255,255,0.8); font-weight: 500; font-size: 0.9rem; padding: 0.5rem 1rem; border-radius: 8px; transition: all 0.25s ease-in-out;">
                        <i class="fas fa-calendar-check me-1"></i> Réservations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="#"
                        style="color: rgba(255,255,255,0.8); font-weight: 500; font-size: 0.9rem; padding: 0.5rem 1rem; border-radius: 8px; transition: all 0.25s ease-in-out;">
                        <i class="fas fa-envelope me-1"></i> Contact
                    </a>
                </li>
            </ul>

            {{-- MENU UTILISATEUR --}}
            <ul class="navbar-nav">

                @guest
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}"
                        style="color: rgba(255,255,255,0.8); font-weight: 500; font-size: 0.9rem; padding: 0.5rem 1rem; border-radius: 8px; transition: all 0.25s ease-in-out;">
                        <i class="fas fa-sign-in-alt me-1"></i> Connexion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('register') ? 'active' : '' }}" href="{{ route('register') }}"
                        style="color: rgba(255,255,255,0.8); font-weight: 500; font-size: 0.9rem; padding: 0.5rem 1rem; border-radius: 8px; transition: all 0.25s ease-in-out;">
                        <i class="fas fa-user-plus me-1"></i> Inscription
                    </a>
                </li>
                @endguest

                @auth
                {{-- Profil --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('profile*') ? 'active' : '' }}"
                        href="{{ route('profile.edit') }}"
                        style="color: rgba(255,255,255,0.8); font-weight: 500; font-size: 0.9rem; padding: 0.5rem 1rem; border-radius: 8px; transition: all 0.25s ease-in-out;">
                        <i class="fas fa-user me-1"></i> Profil
                    </a>
                </li>

                {{-- Avatar + Nom --}}
                <li class="nav-item d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                        style="width: 34px; height: 34px; background: var(--primary-light); font-size: 0.8rem;">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <span class="nav-link"
                        style="color: rgba(255,255,255,0.9); cursor: default; background: transparent !important;">
                        {{ auth()->user()->name }}
                    </span>
                </li>

                {{-- Logout --}}
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn"
                            style="background: rgba(255,255,255,0.12); border: 1.5px solid rgba(255,255,255,0.2); color: var(--white); padding: 0.35rem 1rem; border-radius: 8px; font-weight: 500; font-size: 0.8rem; transition: all 0.25s ease-in-out;">
                            <i class="fas fa-sign-out-alt me-1"></i> Logout
                        </button>
                    </form>
                </li>
                @endauth

            </ul>

        </div>
    </div>
</nav>

<style>
.navbar-nav .nav-link:hover {
    color: var(--white) !important;
    background: rgba(255, 255, 255, 0.08);
}

.navbar-nav .nav-link.active {
    color: var(--white) !important;
    background: rgba(255, 255, 255, 0.12);
}

.navbar-nav .btn:hover {
    background: rgba(255, 255, 255, 0.2) !important;
    border-color: rgba(255, 255, 255, 0.3) !important;
    transform: translateY(-1px);
}
</style>