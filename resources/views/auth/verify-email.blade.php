@extends('layouts.auth')

@section('title', 'Vérification email')

@section('content')

<div class="text-center mb-4">
    <div class="mb-3" style="font-size: 3rem; color: var(--primary-light);">
        <i class="fas fa-envelope-open-text"></i>
    </div>
    <p style="font-size: 0.9rem; color: var(--text-gray); line-height: 1.6;">
        <i class="fas fa-info-circle me-1" style="color: var(--primary-light);"></i>
        Merci pour votre inscription ! Avant de commencer, veuillez vérifier votre adresse email
        en cliquant sur le lien que nous venons de vous envoyer.
    </p>
    <p style="font-size: 0.85rem; color: var(--text-gray); margin-top: 0.5rem;">
        Si vous n'avez pas reçu l'email, nous vous en enverrons un autre.
    </p>
</div>

{{-- STATUS --}}
@if (session('status') == 'verification-link-sent')
<div class="alert-auth alert-success">
    <i class="fas fa-check-circle me-2"></i>
    Un nouveau lien de vérification a été envoyé à votre adresse email.
</div>
@endif

{{-- BOUTONS --}}
<div class="d-flex flex-column flex-sm-row gap-3 mt-3">

    {{-- RENVOYER LE LIEN --}}
    <form method="POST" action="{{ route('verification.send') }}" class="flex-1">
        @csrf
        <button type="submit" class="btn-auth" style="width: 100%;">
            <i class="fas fa-paper-plane me-2"></i>
            Renvoyer l'email de vérification
        </button>
    </form>

    {{-- DÉCONNEXION --}}
    <form method="POST" action="{{ route('logout') }}" class="flex-1">
        @csrf
        <button type="submit" class="btn"
            style="width: 100%; background: #F3F4F6; color: #374151; border: none; border-radius: 8px; padding: 0.7rem 1.5rem; font-weight: 600; font-size: 0.95rem; transition: var(--transition);"
            onmouseover="this.style.background='#E5E7EB'" onmouseout="this.style.background='#F3F4F6'">
            <i class="fas fa-sign-out-alt me-2"></i>
            Se déconnecter
        </button>
    </form>

</div>

{{-- LIEN CONNEXION (si déjà vérifié) --}}
<div class="auth-links mt-3">
    <a href="{{ route('login') }}">
        <i class="fas fa-arrow-left me-1"></i>
        Retour à la connexion
    </a>
</div>

@endsection