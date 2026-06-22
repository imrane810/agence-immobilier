@extends('layouts.admin')

@section('title', 'Détail du message')
@section('page-title', 'Détail du message')
@section('page-subtitle', 'Consultez et gérez le message reçu')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">
            <i class="fas fa-envelope me-1"></i> Message reçu le
            {{ $contact->created_at ? $contact->created_at->format('d/m/Y à H:i') : 'Date inconnue' }}
        </p>
    </div>
    <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-custom">
        <i class="fas fa-arrow-left me-2"></i> Retour à la liste
    </a>
</div>

<div class="card-custom">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-user me-2 text-primary"></i>
                <span class="fw-semibold">{{ $contact->first_name }} {{ $contact->last_name }}</span>
            </div>
            <div>
                @if($contact->is_answered)
                <span class="badge-status" style="background: #D1FAE5; color: #065F46;">
                    <i class="fas fa-check-circle me-1"></i> Traité
                </span>
                @else
                <span class="badge-status" style="background: #FEF3C7; color: #92400E;">
                    <i class="fas fa-clock me-1"></i> En attente
                </span>
                @endif
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
        <div class="d-flex gap-2">
            @if(!$contact->is_answered)
            <form method="POST" action="{{ route('admin.contacts.update', $contact) }}" class="d-inline">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary-custom">
                    <i class="fas fa-check-circle me-2"></i> Marquer comme traité
                </button>
            </form>
            @else
            <button class="btn" disabled
                style="background: #D1FAE5; color: #065F46; border: none; border-radius: 8px; padding: 0.5rem 1.5rem; font-weight: 500; font-size: 0.9rem; cursor: default;">
                <i class="fas fa-check-circle me-2"></i> Déjà traité
            </button>
            @endif

            <a href="{{ route('admin.contacts.index') }}" class="btn"
                style="background: #F3F4F6; color: #374151; border: none; border-radius: 8px; padding: 0.5rem 1.5rem; font-weight: 500; font-size: 0.9rem; transition: var(--transition); text-decoration: none;"
                onmouseover="this.style.background='#E5E7EB'" onmouseout="this.style.background='#F3F4F6'">
                <i class="fas fa-times me-2"></i> Fermer
            </a>
        </div>

    </div>
</div>

@endsection