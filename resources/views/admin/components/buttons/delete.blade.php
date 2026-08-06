<form action="{{ $route }}" method="POST" class="d-inline"
    onsubmit="return confirm('{{ $confirm ?? 'Supprimer ? Cette action est irréversible.' }}')">
    @csrf
    @method('DELETE')
    <button
        {{ $attributes->merge(['class' => 'btn btn-sm', 'style' => 'background: #FEE2E2; color: #991B1B; border: none; border-radius: 8px; padding: 0.35rem 0.7rem; transition: var(--transition);']) }}
        title="Supprimer" onmouseover="this.style.background='#FECACA'" onmouseout="this.style.background='#FEE2E2'">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>