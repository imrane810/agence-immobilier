@extends('layouts.auth')

@section('title', 'Inscription')

@section('content')

@if($errors->any())
<div class="alert-auth alert-danger">
    <i class="fas fa-exclamation-circle me-2"></i>
    @foreach($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- NAME --}}
    <div class="mb-3">
        <label class="form-label">
            <i class="fas fa-user me-1" style="color: var(--primary-light);"></i>
            Nom complet
        </label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') }}" placeholder="Jean Dupont" required autofocus>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- EMAIL --}}
    <div class="mb-3">
        <label class="form-label">
            <i class="fas fa-envelope me-1" style="color: var(--primary-light);"></i>
            Adresse email
        </label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" placeholder="exemple@email.com" required>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- PASSWORD --}}
    <div class="mb-3">
        <label class="form-label">
            <i class="fas fa-lock me-1" style="color: var(--primary-light);"></i>
            Mot de passe
        </label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            placeholder="•••••••• (minimum 8 caractères)" required>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- CONFIRM PASSWORD --}}
    <div class="mb-3">
        <label class="form-label">
            <i class="fas fa-check-circle me-1" style="color: var(--primary-light);"></i>
            Confirmer le mot de passe
        </label>
        <input type="password" name="password_confirmation" class="form-control"
            placeholder="Confirmez votre mot de passe" required>
    </div>

    {{-- SUBMIT --}}
    <button type="submit" class="btn-auth">
        <i class="fas fa-user-plus me-2"></i>
        S'inscrire
    </button>

</form>

{{-- LIEN CONNEXION --}}
<div class="auth-links">
    Déjà inscrit ?
    <a href="{{ route('login') }}">Se connecter</a>
</div>

@endsection