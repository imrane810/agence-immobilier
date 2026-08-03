<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-2">

    <div class="container-fluid px-4">

        {{-- Brand / Titre --}}
        <span class="navbar-brand fw-bold" style="color: var(--primary-dark); font-size: 1.1rem;">
            <i class="fas fa-building me-2" style="color: var(--primary-light);"></i>
            Administration
        </span>

        {{-- Dropdown mobile --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- User menu --}}
        <div class="collapse navbar-collapse" id="navbarUser">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item d-flex align-items-center gap-3">

                    {{-- Nom user avec avatar --}}
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center text-white fw-bold"
                            style="width: 36px; height: 36px; font-size: 0.85rem; background: var(--primary-light) !important;">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <span class="fw-medium d-none d-md-inline" style="color: var(--text-dark); font-size: 0.9rem;">
                            {{ auth()->user()->name ?? 'Admin' }}
                        </span>
                    </div>

                    {{-- Bouton logout --}}
                    <form method="POST" action="{{ route('admin.logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm px-3"
                            style="border-radius: 8px; font-weight: 500; font-size: 0.8rem; border-width: 1.5px;">
                            <i class="fas fa-sign-out-alt me-1"></i>
                            Logout
                        </button>
                    </form>

                </li>
            </ul>
        </div>

    </div>

</nav>