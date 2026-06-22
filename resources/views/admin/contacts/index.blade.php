@extends('layouts.admin')

@section('title', 'Gestion des messages')
@section('page-title', 'Messages de contact')
@section('page-subtitle', 'Consultez et gérez les messages reçus')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">
            <i class="fas fa-inbox me-1"></i> Tous les messages reçus via le formulaire de contact
        </p>
    </div>
    <div>
        <span class="badge"
            style="background: var(--primary-light); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 500;">
            <i class="fas fa-envelope me-1"></i> {{ $contacts->total() }} messages
        </span>
    </div>
</div>

{{-- STATS CARDS --}}
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-number">{{ $contacts->total() }}</div>
            <div class="stat-label">Total messages</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #3B82F6;">
            <div class="stat-number">{{ $contacts->where('status', 'new')->count() }}</div>
            <div class="stat-label">Nouveaux</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #F59E0B;">
            <div class="stat-number">{{ $contacts->where('status', 'read')->count() }}</div>
            <div class="stat-label">Lus</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="border-left-color: #10B981;">
            <div class="stat-number">{{ $contacts->where('status', 'answered')->count() }}</div>
            <div class="stat-label">Répondus</div>
        </div>
    </div>
</div>

{{-- TABLE --}}
<div class="card-custom">
    <div class="card-header">
        <i class="fas fa-table me-2 text-primary"></i> Liste des messages
    </div>
    <div class="card-body p-0">
        <table class="table table-custom w-100">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th class="text-center" style="width: 120px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                <tr>
                    {{-- NAME --}}
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                style="width: 34px; height: 34px; background: var(--primary-light); font-size: 0.75rem; flex-shrink: 0;">
                                {{ strtoupper(substr($contact->first_name ?? 'U', 0, 1)) }}
                            </div>
                            <span class="fw-semibold" style="color: var(--text-dark);">
                                {{ $contact->first_name }} {{ $contact->last_name }}
                            </span>
                            @if($contact->status === 'new')
                            <span class="badge-status"
                                style="background: #FEE2E2; color: #991B1B; font-size: 0.6rem; padding: 0.15rem 0.5rem;">
                                NEW
                            </span>
                            @endif
                        </div>
                    </td>

                    {{-- EMAIL --}}
                    <td>
                        <a href="mailto:{{ $contact->email }}"
                            style="color: var(--primary-light); text-decoration: none; font-size: 0.9rem;">
                            {{ $contact->email }}
                        </a>
                    </td>

                    {{-- SUBJECT --}}
                    <td>
                        <span style="font-size: 0.9rem; color: var(--text-dark);">
                            {{ Str::limit($contact->subject, 30) }}
                        </span>
                    </td>

                    {{-- STATUS --}}
                    <td>
                        @if($contact->status === 'new')
                        <span class="badge-status" style="background: #FEE2E2; color: #991B1B;">
                            <i class="fas fa-circle me-1" style="font-size: 0.5rem;"></i> Nouveau
                        </span>
                        @elseif($contact->status === 'read')
                        <span class="badge-status" style="background: #FEF3C7; color: #92400E;">
                            <i class="fas fa-check-circle me-1"></i> Lu
                        </span>
                        @else
                        <span class="badge-status" style="background: #D1FAE5; color: #065F46;">
                            <i class="fas fa-reply me-1"></i> Répondu
                        </span>
                        @endif
                    </td>

                    {{-- DATE --}}
                    <td style="font-size: 0.85rem; color: var(--text-gray);">
                        <i class="fas fa-calendar-alt me-1" style="color: var(--primary-light);"></i>
                        {{ $contact->created_at ? $contact->created_at->format('d/m/Y') : 'N/A' }}
                        <span style="font-size: 0.75rem; color: var(--text-gray); display: block;">
                            {{ $contact->created_at ? $contact->created_at->format('H:i') : '' }}
                        </span>
                    </td>

                    {{-- ACTIONS --}}
                    <td class="text-center">
                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-primary-custom"
                            title="Voir le message">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Supprimer ce message ? Cette action est irréversible.')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm"
                                style="background: #FEE2E2; color: #991B1B; border: none; border-radius: 8px; padding: 0.35rem 0.7rem; transition: var(--transition);"
                                title="Supprimer" onmouseover="this.style.background='#FECACA'"
                                onmouseout="this.style.background='#FEE2E2'">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-inbox"
                            style="font-size: 3rem; color: #D1D5DB; display: block; margin-bottom: 1rem;"></i>
                        <p class="text-muted" style="font-size: 1rem;">Aucun message reçu</p>
                        <p class="text-muted" style="font-size: 0.85rem;">Les messages du formulaire de contact
                            apparaîtront ici</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- PAGINATION --}}
@if(method_exists($contacts, 'links'))
<div class="mt-4">
    {{ $contacts->links() }}
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