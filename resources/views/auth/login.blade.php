@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')

@if(session('status'))
<div class="alert-auth alert-success">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('status') }}
</div>
@endif

@if($errors->any())
<div class="alert-auth alert-danger">
    <i class="fas fa-exclamation-circle me-2"></i>
    @foreach($errors->all() as $error)
    {{ $error }}<br>
    @endforeach
</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- EMAIL --}}
    <div class="mb-3">
        <label class="form-label">
            <i class="fas fa-envelope me-1" style="color: var(--primary-light);"></i>
            Adresse email
        </label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" placeholder="exemple@email.com" required autofocus>
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
            placeholder="••••••••" required>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- REMEMBER ME --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
            <input type="checkbox" name="remember" id="remember" class="form-check-input"
                {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="form-check-label">
                Se souvenir de moi
            </label>
        </div>
        <a href="{{ route('password.request') }}" style="font-size: 0.85rem;">
            Mot de passe oublié ?
        </a>
    </div>

    {{-- SUBMIT --}}
    <button type="submit" class="btn-auth">
        <i class="fas fa-sign-in-alt me-2"></i>
        Se connecter
    </button>

</form>
<form method="POST" action="{{ route('logout') }}" class="m-0">
    @csrf
    <button type="submit" class="btn btn-outline-danger btn-sm px-3"
        style="border-radius: 8px; font-weight: 500; font-size: 0.8rem; border-width: 1.5px;">
        <i class="fas fa-sign-out-alt me-1"></i>
        Logout
    </button>
</form>

{{-- LIEN INSCRIPTION --}}
<div class="auth-links">
    Pas encore de compte ?
    <a href="{{ route('register') }}">S'inscrire</a>
</div>

@endsection