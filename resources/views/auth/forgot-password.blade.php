@extends('layouts.auth')

@section('title', 'Mot de passe oublié')

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

<div class="text-center mb-4">
    <p style="font-size: 0.9rem; color: var(--text-gray); line-height: 1.6;">
        <i class="fas fa-info-circle me-1" style="color: var(--primary-light);"></i>
        Mot de passe oublié ? Indiquez votre adresse email et nous vous enverrons
        un lien de réinitialisation.
    </p>
</div>

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    {{-- EMAIL --}}
    <div class="mb-4">
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

    {{-- SUBMIT --}}
    <button type="submit" class="btn-auth">
        <i class="fas fa-paper-plane me-2"></i>
        Envoyer le lien de réinitialisation
    </button>

</form>

{{-- LIEN CONNEXION --}}
<div class="auth-links">
    <a href="{{ route('login') }}">
        <i class="fas fa-arrow-left me-1"></i>
        Retour à la connexion
    </a>
</div>

@endsection