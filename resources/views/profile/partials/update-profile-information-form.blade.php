<section>

    {{-- HEADER --}}
    <div class="mb-4">
        <h5 style="font-weight: 600; font-size: 1rem; color: var(--text-dark); margin-bottom: 0.25rem;">
            <i class="fas fa-user-edit me-2" style="color: var(--primary-light);"></i>
            Informations personnelles
        </h5>
        <p style="font-size: 0.9rem; color: var(--text-gray); margin-bottom: 0;">
            Mettez à jour vos informations personnelles et votre adresse email.
        </p>
    </div>

    {{-- FORMULAIRE DE VÉRIFICATION (caché) --}}

    {{-- FORMULAIRE PRINCIPAL --}}
    <form method="post" action="{{ route('profile.update') }}" class="mt-3">
        @csrf
        @method('patch')

        {{-- NAME --}}
        <div class="mb-3">
            <label class="form-label" style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">
                <i class="fas fa-user me-1" style="color: var(--primary-light);"></i>
                Nom complet
            </label>
            <input type="text" name="name" class="form-control-custom w-100 @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" placeholder="Votre nom complet" required autofocus
                autocomplete="name"
                style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.7rem 1rem; font-size: 0.9rem; transition: var(--transition);">
            @error('name')
            <div class="invalid-feedback" style="font-size: 0.8rem; color: #EF4444; margin-top: 0.25rem;">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- EMAIL --}}
        <div class="mb-3">
            <label class="form-label" style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">
                <i class="fas fa-envelope me-1" style="color: var(--primary-light);"></i>
                Adresse email
            </label>
            <input type="email" name="email" class="form-control-custom w-100 @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}" placeholder="exemple@email.com" required
                autocomplete="username"
                style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.7rem 1rem; font-size: 0.9rem; transition: var(--transition);">
            @error('email')
            <div class="invalid-feedback" style="font-size: 0.8rem; color: #EF4444; margin-top: 0.25rem;">
                {{ $message }}
            </div>
            @enderror

            {{-- EMAIL NON VÉRIFIÉ --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2"
                style="background: #FEF3C7; padding: 0.75rem 1rem; border-radius: 8px; border-left: 4px solid #F59E0B;">
                <p style="font-size: 0.85rem; color: #92400E; margin-bottom: 0;">
                    <i class="fas fa-exclamation-triangle me-1"></i>
                    Votre adresse email n'est pas vérifiée.
                    <button form="send-verification"
                        style="background: none; border: none; color: var(--primary-light); font-weight: 600; text-decoration: underline; cursor: pointer; padding: 0; font-size: 0.85rem;">
                        Cliquez ici pour renvoyer l'email de vérification.
                    </button>
                </p>
                @if (session('status') === 'verification-link-sent')
                <p style="font-size: 0.85rem; color: #065F46; margin-top: 0.5rem; margin-bottom: 0;">
                    <i class="fas fa-check-circle me-1"></i>
                    Un nouveau lien de vérification a été envoyé à votre adresse email.
                </p>
                @endif
            </div>
            @endif
        </div>

        {{-- ACTIONS --}}
        <div class="d-flex align-items-center gap-3 mt-3">
            <button type="submit" class="btn-primary-custom" style="padding: 0.5rem 1.5rem;">
                <i class="fas fa-save me-2"></i>
                Enregistrer
            </button>

            @if (session('status') === 'profile-updated')
            <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                style="color: #065F46; font-size: 0.9rem; font-weight: 500;">
                <i class="fas fa-check-circle me-1"></i>
                Profil mis à jour !
            </span>
            @endif
        </div>

    </form>

</section>

{{-- Alpine.js pour le message de succès --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>