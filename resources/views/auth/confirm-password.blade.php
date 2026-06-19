@extends('layouts.auth')

@section('title', 'Confirmation du mot de passe')

@section('content')

<div class="text-center mb-4">
    <div class="mb-3" style="font-size: 3rem; color: var(--primary-light);">
        <i class="fas fa-shield-alt"></i>
    </div>
    <p style="font-size: 0.9rem; color: var(--text-gray); line-height: 1.6;">
        <i class="fas fa-info-circle me-1" style="color: var(--primary-light);"></i>
        Zone sécurisée. Veuillez confirmer votre mot de passe avant de continuer.
    </p>
</div>

@if($errors->any())
<div class="alert-auth alert-danger">
    <i class="fas fa-exclamation-circle me-2"></i>
    @foreach($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif

<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    {{-- PASSWORD --}}
    <div class="mb-4">
        <label class="form-label">
            <i class="fas fa-lock me-1" style="color: var(--primary-light);"></i>
            Mot de passe
        </label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="Entrez votre mot de passe" required autocomplete="current-password">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- SUBMIT --}}
    <button type="submit" class="btn-auth">
        <i class="fas fa-check-circle me-2"></i>
        Confirmer
    </button>

</form>

{{-- LIEN RETOUR --}}
<div class="auth-links">
    <a href="{{ route('login') }}">
        <i class="fas fa-arrow-left me-1"></i>
        Retour à la connexion
    </a>
</div>

@endsection