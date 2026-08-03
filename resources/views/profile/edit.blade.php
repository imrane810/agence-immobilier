@php
$layout = auth()->user()->role === 'admin'
? 'layouts.admin'
: 'layouts.app';
@endphp

@extends($layout)
@section('title', 'Mon profil')
@section('page-title', 'Mon profil')

@section('content')

<div class="row g-4">

    {{-- SIDEBAR PROFIL --}}
    <div class="col-md-3">
        <div class="card-custom"
            style="background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.08); overflow: hidden;">
            <div class="card-body text-center">
                {{-- Avatar --}}
                <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                    style="width: 80px; height: 80px; background: var(--primary-light); font-size: 2rem;">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <h5 class="fw-bold mb-0">{{ auth()->user()->name }}</h5>
                <p class="text-muted" style="font-size: 0.85rem;">{{ auth()->user()->email }}</p>
                <hr>
                <div class="text-start">
                    <p style="font-size: 0.85rem; margin-bottom: 0.25rem;">
                        <i class="fas fa-user-circle me-2" style="color: var(--primary-light); width: 18px;"></i>
                        Membre depuis
                    </p>
                    <p class="text-muted" style="font-size: 0.85rem; padding-left: 30px;">
                        {{ auth()->user()->created_at ? auth()->user()->created_at->format('d/m/Y') : 'Nouveau' }}
                    </p>
                    <p style="font-size: 0.85rem; margin-bottom: 0.25rem;">
                        <i class="fas fa-role me-2" style="color: var(--primary-light); width: 18px;"></i>
                        Rôle
                    </p>
                    <p class="text-muted" style="font-size: 0.85rem; padding-left: 30px;">
                        {{ auth()->user()->role ?? 'Utilisateur' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- FORMULAIRES --}}
    <div class="col-md-9">
        {{-- Informations personnelles --}}
        <div class="card-custom mb-4"
            style="background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.08); overflow: hidden;">
            <div class="card-header"
                style="background: transparent; border-bottom: 1px solid rgba(0,0,0,0.05); padding: 1.25rem 1.5rem; font-weight: 600; font-size: 1rem;">
                <i class="fas fa-user-edit me-2 text-primary"></i> Informations personnelles
            </div>
            <div class="card-body" style="padding: 1.5rem;">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Changer le mot de passe --}}
        <div class="card-custom mb-4"
            style="background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.08); overflow: hidden;">
            <div class="card-header"
                style="background: transparent; border-bottom: 1px solid rgba(0,0,0,0.05); padding: 1.25rem 1.5rem; font-weight: 600; font-size: 1rem;">
                <i class="fas fa-lock me-2 text-primary"></i> Changer le mot de passe
            </div>
            <div class="card-body" style="padding: 1.5rem;">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Supprimer le compte --}}
        <div class="card-custom"
            style="background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.08); overflow: hidden;">
            <div class="card-header"
                style="background: transparent; border-bottom: 1px solid rgba(0,0,0,0.05); padding: 1.25rem 1.5rem; font-weight: 600; font-size: 1rem; border-bottom-color: #FEE2E2;">
                <i class="fas fa-trash-alt me-2" style="color: #EF4444;"></i>
                <span style="color: #991B1B;">Supprimer le compte</span>
            </div>
            <div class="card-body" style="padding: 1.5rem;">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

</div>

<style>
.card-custom {
    transition: all 0.25s ease-in-out;
}

.card-custom:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06) !important;
}
</style>

@endsection