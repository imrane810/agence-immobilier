@if(auth()->user()->isAdmin())
<div class="sidebar">

    {{-- Brand --}}
    <div class="brand">
        <i class="fas fa-building"></i> Immo Admin
    </div>

    {{-- Navigation --}}
    <nav class="nav flex-column">

        <a href="#" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i> Dashboard
        </a>

        <a href="{{ route('admin.properties.index') }}"
            class="nav-link {{ request()->routeIs('admin.properties.*') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Properties
        </a>

        <a href="#" class="nav-link">
            <i class="fas fa-calendar-check"></i> Reservations
        </a>

        <a href="#" class="nav-link">
            <i class="fas fa-credit-card"></i> Paiement
        </a>

        {{-- Séparateur --}}
        <hr class="my-2" style="border-color: rgba(255,255,255,0.08);">

        {{-- Logout --}}
        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Déconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </nav>

</div>
@endif