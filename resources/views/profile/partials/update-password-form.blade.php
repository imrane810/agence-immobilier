<section>

    {{-- HEADER --}}
    <div class="mb-4">
        <h5 style="font-weight: 600; font-size: 1rem; color: var(--text-dark); margin-bottom: 0.25rem;">
            <i class="fas fa-lock me-2" style="color: var(--primary-light);"></i>
            Changer le mot de passe
        </h5>
        <p style="font-size: 0.9rem; color: var(--text-gray); margin-bottom: 0;">
            Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.
        </p>
    </div>

    {{-- FORMULAIRE --}}
    <form method="post" action="{{ route('password.update') }}" class="mt-3">
        @csrf
        @method('put')

        {{-- CURRENT PASSWORD --}}
        <div class="mb-3">
            <label class="form-label" style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">
                <i class="fas fa-key me-1" style="color: var(--primary-light);"></i>
                Mot de passe actuel
            </label>
            <input type="password" name="current_password"
                class="form-control-custom w-100 @error('current_password', 'updatePassword') is-invalid @enderror"
                placeholder="Entrez votre mot de passe actuel"
                style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.7rem 1rem; font-size: 0.9rem; transition: var(--transition);">
            @error('current_password', 'updatePassword')
            <div class="invalid-feedback" style="font-size: 0.8rem; color: #EF4444; margin-top: 0.25rem;">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- NEW PASSWORD --}}
        <div class="mb-3">
            <label class="form-label" style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">
                <i class="fas fa-lock me-1" style="color: var(--primary-light);"></i>
                Nouveau mot de passe
            </label>
            <input type="password" name="password"
                class="form-control-custom w-100 @error('password', 'updatePassword') is-invalid @enderror"
                placeholder="•••••••• (minimum 8 caractères)"
                style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.7rem 1rem; font-size: 0.9rem; transition: var(--transition);">
            @error('password', 'updatePassword')
            <div class="invalid-feedback" style="font-size: 0.8rem; color: #EF4444; margin-top: 0.25rem;">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div class="mb-3">
            <label class="form-label" style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">
                <i class="fas fa-check-circle me-1" style="color: var(--primary-light);"></i>
                Confirmer le mot de passe
            </label>
            <input type="password" name="password_confirmation"
                class="form-control-custom w-100 @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                placeholder="Confirmez votre nouveau mot de passe"
                style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.7rem 1rem; font-size: 0.9rem; transition: var(--transition);">
            @error('password_confirmation', 'updatePassword')
            <div class="invalid-feedback" style="font-size: 0.8rem; color: #EF4444; margin-top: 0.25rem;">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- ACTIONS --}}
        <div class="d-flex align-items-center gap-3 mt-3">
            <button type="submit" class="btn-primary-custom" style="padding: 0.5rem 1.5rem;">
                <i class="fas fa-save me-2"></i>
                Enregistrer
            </button>

            @if (session('status') === 'password-updated')
            <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                style="color: #065F46; font-size: 0.9rem; font-weight: 500;">
                <i class="fas fa-check-circle me-1"></i>
                Mot de passe mis à jour !
            </span>
            @endif
        </div>

    </form>

</section>

{{-- Alpine.js pour le message de succès --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>