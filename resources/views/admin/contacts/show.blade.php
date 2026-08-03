@extends('layouts.admin')

@section('title', 'Détail du message')
@section('page-title', 'Détail du message')
@section('page-subtitle', 'Consultez et gérez le message reçu')

@section('content')

{{-- Message de succès --}}
@if(session('success'))
<div class="alert alert-success mb-4"
    style="border-radius: var(--radius-sm); border: none; background: #D1FAE5; color: #065F46; padding: 0.75rem 1rem; border-left: 4px solid #10B981;">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('success') }}
</div>
@endif

{{-- CARD --}}
<div class="card-custom">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-user me-2 text-primary"></i>
                <span class="fw-semibold">{{ $contact->first_name }} {{ $contact->last_name }}</span>
            </div>
            <div>
                @php
                $statusConfig = [
                'new' => ['label' => 'Nouveau', 'class' => 'status-new'],
                'read' => ['label' => 'Lu', 'class' => 'status-read'],
                'answered' => ['label' => 'Répondu', 'class' => 'status-answered'],
                ];
                $status = $statusConfig[$contact->status] ?? $statusConfig['new'];
                @endphp
                <span class="status-badge {{ $status['class'] }}">
                    {{ $status['label'] }}
                </span>
            </div>
        </div>
    </div>

    <div class="card-body">

        {{-- Informations du contact --}}
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-2 p-2 rounded" style="background: #F3F4F6;">
                    <i class="fas fa-envelope" style="color: var(--primary-light); width: 20px;"></i>
                    <div>
                        <small class="text-muted d-block"
                            style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3px;">Email</small>
                        <span style="font-size: 0.9rem;">{{ $contact->email }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-2 p-2 rounded" style="background: #F3F4F6;">
                    <i class="fas fa-tag" style="color: var(--primary-light); width: 20px;"></i>
                    <div>
                        <small class="text-muted d-block"
                            style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3px;">Sujet</small>
                        <span style="font-size: 0.9rem; font-weight: 500;">{{ $contact->subject }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Message --}}
        <div class="mb-4">
            <h6 class="fw-semibold" style="font-size: 0.9rem; margin-bottom: 0.5rem;">
                <i class="fas fa-comment-dots me-2" style="color: var(--primary-light);"></i> Message
            </h6>
            <div
                style="background: #F9FAFB; border-radius: var(--radius-sm); padding: 1.25rem; border-left: 4px solid var(--primary-light);">
                <p
                    style="margin: 0; font-size: 0.95rem; line-height: 1.7; color: var(--text-dark); white-space: pre-wrap;">
                    {{ $contact->message }}
                </p>
            </div>
        </div>

        {{-- Actions --}}
        <hr>
        <div class="actions-wrapper">
            {{-- Formulaire de changement de statut avec dropdown --}}
            <div class="status-dropdown-wrapper">
                <button class="status-dropdown-btn" type="button" onclick="toggleStatusDropdown()">
                    <span class="status-badge {{ $status['class'] }}">
                        {{ $status['label'] }}
                    </span>
                    <i class="fas fa-chevron-down ms-2" style="font-size: 12px; color: #6B7280;"></i>
                </button>

                <div class="status-dropdown-menu" id="statusDropdown">
                    <form method="POST" action="{{ route('admin.contacts.update', $contact) }}" id="statusForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" id="selectedStatus" value="{{ $contact->status }}">

                        <div class="status-option status-option-new" data-value="new" onclick="selectStatus('new')">
                            <span class="status-dot status-dot-new"></span>
                            Nouveau
                            @if($contact->status == 'new')
                            <i class="fas fa-check ms-auto" style="color: #10B981;"></i>
                            @endif
                        </div>

                        <div class="status-option status-option-read" data-value="read" onclick="selectStatus('read')">
                            <span class="status-dot status-dot-read"></span>
                            Lu
                            @if($contact->status == 'read')
                            <i class="fas fa-check ms-auto" style="color: #10B981;"></i>
                            @endif
                        </div>

                        <div class="status-option status-option-answered" data-value="answered"
                            onclick="selectStatus('answered')">
                            <span class="status-dot status-dot-answered"></span>
                            Répondu
                            @if($contact->status == 'answered')
                            <i class="fas fa-check ms-auto" style="color: #10B981;"></i>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            {{-- Boutons à droite --}}
            <div class="actions-right">
                {{-- Bouton Supprimer --}}
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Supprimer ce message ? Cette action est irréversible.')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete">
                        <i class="fas fa-trash-alt me-2"></i> Supprimer
                    </button>
                </form>

                {{-- Bouton Fermer --}}
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-close-custom">
                    <i class="fas fa-times me-2"></i> Fermer
                </a>
            </div>
        </div>

    </div>
</div>

<style>
/* ==========================================
   VARIABLES
========================================== */
:root {
    --primary-light: #3B82F6;
    --primary-hover: #2563EB;
    --white: #FFFFFF;
    --text-dark: #1F2937;
    --radius: 12px;
    --radius-sm: 8px;
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.10);
    --shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.15);
    --transition: all 0.3s ease;
}

/* ==========================================
   ACTIONS WRAPPER
========================================== */
.actions-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.actions-right {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

/* ==========================================
   STATUS BADGES
========================================== */
.status-badge {
    padding: 0.3rem 0.9rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    text-transform: uppercase;
    letter-spacing: 0.3px;
    white-space: nowrap;
}

.status-new {
    background: #FEE2E2;
    color: #991B1B;
}

.status-read {
    background: #FEF3C7;
    color: #92400E;
}

.status-answered {
    background: #D1FAE5;
    color: #065F46;
}

/* ==========================================
   STATUS DROPDOWN - AVEC OVERFLOW VISIBLE
========================================== */
.status-dropdown-wrapper {
    position: relative;
    display: inline-block;
    z-index: 100;
}

/* Important: Permet au dropdown de dépasser */
.card-custom {
    overflow: visible !important;
}

.card-custom .card-body {
    overflow: visible !important;
}

.status-dropdown-btn {
    background: transparent;
    border: none;
    padding: 0;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    transition: var(--transition);
}

.status-dropdown-btn:hover {
    opacity: 0.8;
}

.status-dropdown-menu {
    display: none;
    position: absolute;
    left: 0;
    top: calc(100% + 8px);
    min-width: 180px;
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow-lg);
    border: 1px solid #F3F4F6;
    padding: 6px;
    z-index: 9999;
    animation: dropdownSlide 0.2s ease;
}

.status-dropdown-menu.show {
    display: block;
}

@keyframes dropdownSlide {
    from {
        opacity: 0;
        transform: translateY(-8px) scale(0.98);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.status-option {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.15s ease;
    color: #374151;
}

.status-option:hover {
    background: #F9FAFB;
}

.status-option-new:hover {
    background: #FEE2E2;
}

.status-option-read:hover {
    background: #FEF3C7;
}

.status-option-answered:hover {
    background: #D1FAE5;
}

.status-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
    flex-shrink: 0;
}

.status-dot-new {
    background: #991B1B;
}

.status-dot-read {
    background: #92400E;
}

.status-dot-answered {
    background: #065F46;
}

.status-option .fa-check {
    margin-left: auto;
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
    overflow: visible !important;
    /* Important pour le dropdown */
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
    overflow: visible !important;
    /* Important pour le dropdown */
}

/* ==========================================
   BUTTONS
========================================== */
.btn-delete {
    background: #FEE2E2;
    color: #991B1B;
    border: none;
    border-radius: 8px;
    padding: 0.45rem 1.25rem;
    font-weight: 500;
    font-size: 0.9rem;
    transition: var(--transition);
    cursor: pointer;
}

.btn-delete:hover {
    background: #FECACA;
    color: #991B1B;
}

.btn-close-custom {
    background: #F3F4F6;
    color: #374151;
    border: none;
    border-radius: 8px;
    padding: 0.45rem 1.25rem;
    font-weight: 500;
    font-size: 0.9rem;
    transition: var(--transition);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}

.btn-close-custom:hover {
    background: #E5E7EB;
    color: #374151;
}

/* ==========================================
   RESPONSIVE
========================================== */
@media (max-width: 768px) {
    .card-custom .card-header {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 0.5rem;
    }

    .card-custom .card-header>div:last-child {
        width: 100%;
    }

    .actions-wrapper {
        flex-direction: column;
        align-items: stretch !important;
    }

    .actions-right {
        width: 100%;
        justify-content: stretch;
    }

    .actions-right form,
    .actions-right .btn {
        flex: 1;
    }

    .status-dropdown-wrapper {
        width: 100%;
    }

    .status-dropdown-btn {
        width: 100%;
        justify-content: center;
    }

    .status-dropdown-menu {
        left: 0;
        right: 0;
        min-width: unset;
        width: 100%;
    }

    .btn-delete,
    .btn-close-custom {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
function toggleStatusDropdown() {
    const menu = document.getElementById('statusDropdown');
    menu.classList.toggle('show');
}

function selectStatus(value) {
    document.getElementById('selectedStatus').value = value;
    document.getElementById('statusForm').submit();
}

// Fermer le dropdown quand on clique ailleurs
document.addEventListener('click', function(event) {
    const wrapper = document.querySelector('.status-dropdown-wrapper');
    if (wrapper && !wrapper.contains(event.target)) {
        const menu = document.getElementById('statusDropdown');
        if (menu) {
            menu.classList.remove('show');
        }
    }
});

// Empêcher la fermeture du dropdown quand on clique sur une option
document.querySelectorAll('.status-option').forEach(option => {
    option.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});
</script>

@endsection