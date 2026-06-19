@extends('layouts.auth')

@section('title', 'Réinitialisation du mot de passe')

@section('content')

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="mb-3">
        <label class="form-label">
            <i class="fas fa-envelope me-1" style="color: var(--primary-light);"></i>
            Adresse email
        </label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $email) }}" required readonly>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">
            <i class="fas fa-lock me-1" style="color: var(--primary-light);"></i>
            Nouveau mot de passe
        </label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="•••••••• (minimum 8 caractères)" required>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">
            <i class="fas fa-check-circle me-1" style="color: var(--primary-light);"></i>
            Confirmer le mot de passe
        </label>
        <input type="password" name="password_confirmation" class="form-control"
            placeholder="Confirmez votre mot de passe" required>
    </div>

    <button type="submit" class="btn-auth">
        <i class="fas fa-key me-2"></i>
        Réinitialiser le mot de passe
    </button>
</form>

<div class="auth-links">
    <a href="{{ route('login') }}">
        <i class="fas fa-arrow-left me-1"></i>
        Retour à la connexion
    </a>
</div>

@endsection