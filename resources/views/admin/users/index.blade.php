@extends('layouts.admin')

@section('title', 'Gestion des clients')
@section('page-title', 'Clients')
@section('page-subtitle', 'Liste et gestion des utilisateurs')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">
            <i class="fas fa-users me-1"></i> Tous les utilisateurs de la plateforme
        </p>
    </div>
    <div>
        <span class="badge"
            style="background: var(--primary-light); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 500;">
            <i class="fas fa-user me-1"></i> {{ $users->total() }} utilisateurs
        </span>
    </div>
</div>

{{-- STATS CARDS --}}
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $users->total() }}</div>
            <div class="stat-label">Total utilisateurs</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #10B981;">
            <div class="stat-number">{{ $users->where('role', 'customer')->count() }}</div>
            <div class="stat-label">Clients</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #EF4444;">
            <div class="stat-number">{{ $users->where('role', 'admin')->count() }}</div>
            <div class="stat-label">Administrateurs</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #8B5CF6;">
            <div class="stat-number">{{ $users->where('email_verified_at', '!=', null)->count() }}</div>
            <div class="stat-label">Comptes vérifiés</div>
        </div>
    </div>
</div>

{{-- TABLE --}}
<div class="card-custom">
    <div class="card-header">
        <i class="fas fa-table me-2 text-primary"></i> Liste des utilisateurs
    </div>
    <div class="card-body p-0">
        <table class="table table-custom w-100">
            <thead>
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Inscrit le</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    {{-- ID --}}
                    <td>
                        <span class="fw-semibold" style="color: var(--text-gray); font-size: 0.85rem;">
                            #{{ $user->id }}
                        </span>
                    </td>

                    {{-- NAME --}}
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                style="width: 34px; height: 34px; background: var(--primary-light); font-size: 0.75rem; flex-shrink: 0;">
                                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                            </div>
                            <span class="fw-semibold" style="color: var(--text-dark);">
                                {{ $user->name }}
                            </span>
                        </div>
                    </td>

                    {{-- EMAIL --}}
                    <td>
                        <a href="mailto:{{ $user->email }}"
                            style="color: var(--primary-light); text-decoration: none; font-size: 0.9rem;">
                            {{ $user->email }}
                        </a>
                    </td>

                    {{-- ROLE --}}
                    <td>
                        @if($user->role === 'admin')
                        <span class="badge-status" style="background: #FEE2E2; color: #991B1B;">
                            <i class="fas fa-shield-alt me-1"></i> Admin
                        </span>
                        @else
                        <span class="badge-status" style="background: #D1FAE5; color: #065F46;">
                            <i class="fas fa-user me-1"></i> Client
                        </span>
                        @endif
                    </td>

                    {{-- REGISTERED AT --}}
                    <td style="font-size: 0.85rem; color: var(--text-gray);">
                        <i class="fas fa-calendar-alt me-1" style="color: var(--primary-light);"></i>
                        {{ $user->created_at ? $user->created_at->format('d/m/Y') : 'N/A' }}
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <i class="fas fa-users"
                            style="font-size: 3rem; color: #D1D5DB; display: block; margin-bottom: 1rem;"></i>
                        <p class="text-muted" style="font-size: 1rem;">Aucun utilisateur trouvé</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- PAGINATION --}}
@if(method_exists($users, 'links'))
<div class="mt-4">
    {{ $users->links() }}
</div>
@endif

@endsection

@push('styles')
<style>
/* ==========================================
       STATS CARDS
    ========================================== */
.stat-card {
    background: var(--white);
    border-radius: var(--radius);
    padding: 1.5rem;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    border-left: 4px solid var(--primary-light);
}

.stat-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-2px);
}

.stat-card .stat-number {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1.2;
}

.stat-card .stat-label {
    font-size: 0.8rem;
    color: var(--text-gray);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

/* ==========================================
       CARD CUSTOM
    ========================================== */
.card-custom {
    background: var(--white);
    border: none;
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    overflow: hidden;
}

.card-custom:hover {
    box-shadow: var(--shadow-md);
}

.card-custom .card-header {
    background: transparent;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    padding: 1.25rem 1.5rem;
    font-weight: 600;
    font-size: 1rem;
}

.card-custom .card-body {
    padding: 1.5rem;
}

/* ==========================================
       TABLE CUSTOM
    ========================================== */
.table-custom {
    border-collapse: separate;
    border-spacing: 0 4px;
}

.table-custom thead th {
    background: var(--bg-gray);
    color: var(--text-gray);
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: none;
    padding: 0.75rem 1rem;
}

.table-custom tbody td {
    background: var(--white);
    border: none;
    padding: 0.85rem 1rem;
    font-size: 0.9rem;
    vertical-align: middle;
}

.table-custom tbody tr {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
    transition: var(--transition);
}

.table-custom tbody tr:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    transform: scale(1.002);
}

/* ==========================================
       BADGE STATUS
    ========================================== */
.badge-status {
    padding: 0.35rem 0.85rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

/* ==========================================
       BUTTONS
    ========================================== */
.btn-primary-custom {
    background: var(--primary-light);
    border: none;
    color: var(--white);
    padding: 0.35rem 0.7rem;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.8rem;
    transition: var(--transition);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.btn-primary-custom:hover {
    background: var(--primary-hover);
    color: var(--white);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.35);
}

.btn-outline-custom {
    background: transparent;
    border: 1.5px solid var(--primary-light);
    color: var(--primary-light);
    padding: 0.35rem 0.7rem;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.8rem;
    transition: var(--transition);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.btn-outline-custom:hover {
    background: var(--primary-light);
    color: var(--white);
    transform: translateY(-1px);
}

/* ==========================================
       RESPONSIVE
    ========================================== */
@media (max-width: 768px) {
    .stat-card {
        padding: 1rem;
    }

    .stat-card .stat-number {
        font-size: 1.25rem;
    }

    .table-custom thead th,
    .table-custom tbody td {
        padding: 0.5rem 0.75rem;
        font-size: 0.8rem;
    }
}
</style>
@endpush