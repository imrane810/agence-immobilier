<section class="space-y-6">

    {{-- HEADER --}}
    <div>
        <h5 style="font-weight: 600; font-size: 1rem; color: #991B1B; margin-bottom: 0.25rem;">
            <i class="fas fa-exclamation-triangle me-2" style="color: #EF4444;"></i>
            Supprimer le compte
        </h5>
        <p style="font-size: 0.9rem; color: var(--text-gray); margin-bottom: 0;">
            Une fois votre compte supprimé, toutes vos données seront définitivement effacées.
            Avant de supprimer votre compte, veuillez télécharger toutes les informations que vous souhaitez conserver.
        </p>
    </div>

    {{-- BOUTON SUPPRIMER --}}
    <button type="button" class="btn"
        style="background: #FEE2E2; color: #991B1B; border: none; border-radius: 8px; padding: 0.5rem 1.5rem; font-weight: 600; font-size: 0.9rem; transition: var(--transition);"
        onmouseover="this.style.background='#FECACA'" onmouseout="this.style.background='#FEE2E2'" x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        <i class="fas fa-trash-alt me-2"></i>
        Supprimer mon compte
    </button>

    {{-- MODAL DE CONFIRMATION --}}
    <div x-data="{ show: false }" x-on:open-modal.window="if ($event.detail === 'confirm-user-deletion') show = true"
        x-on:close-modal.window="show = false" x-show="show" style="display: none;"
        class="fixed inset-0 z-50 overflow-y-auto" x-cloak>

        {{-- Overlay --}}
        <div class="fixed inset-0 bg-black bg-opacity-50" x-on:click="show = false"
            style="background: rgba(0,0,0,0.5);">
        </div>

        {{-- Modal --}}
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-xl shadow-lg max-w-md w-full relative"
                style="border-radius: var(--radius); box-shadow: var(--shadow-lg);" x-on:click.away="show = false">

                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    {{-- Modal Header --}}
                    <div class="text-center mb-4">
                        <div style="font-size: 3rem; color: #EF4444; margin-bottom: 0.5rem;">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <h5
                            style="font-weight: 700; font-size: 1.15rem; color: var(--text-dark); margin-bottom: 0.25rem;">
                            Êtes-vous sûr de vouloir supprimer votre compte ?
                        </h5>
                        <p style="font-size: 0.9rem; color: var(--text-gray);">
                            Cette action est irréversible. Veuillez entrer votre mot de passe pour confirmer.
                        </p>
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label class="form-label"
                            style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">
                            <i class="fas fa-lock me-1" style="color: var(--primary-light);"></i>
                            Mot de passe
                        </label>
                        <input type="password" name="password"
                            class="form-control-custom w-100 @error('password', 'userDeletion') is-invalid @enderror"
                            placeholder="Entrez votre mot de passe"
                            style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.7rem 1rem; font-size: 0.9rem; transition: var(--transition);">
                        @error('password', 'userDeletion')
                        <div class="invalid-feedback" style="font-size: 0.8rem; color: #EF4444; margin-top: 0.25rem;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn"
                            style="background: #F3F4F6; color: #374151; border: none; border-radius: 8px; padding: 0.5rem 1.5rem; font-weight: 500; font-size: 0.9rem; transition: var(--transition);"
                            onmouseover="this.style.background='#E5E7EB'" onmouseout="this.style.background='#F3F4F6'"
                            x-on:click="show = false">
                            <i class="fas fa-times me-2"></i>
                            Annuler
                        </button>

                        <button type="submit" class="btn"
                            style="background: #EF4444; color: white; border: none; border-radius: 8px; padding: 0.5rem 1.5rem; font-weight: 600; font-size: 0.9rem; transition: var(--transition);"
                            onmouseover="this.style.background='#DC2626'" onmouseout="this.style.background='#EF4444'">
                            <i class="fas fa-trash-alt me-2"></i>
                            Supprimer le compte
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>

{{-- Alpine.js pour la modal --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
[x-cloak] {
    display: none !important;
}
</style>