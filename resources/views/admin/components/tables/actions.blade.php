<td class="text-center" style="width: {{ $width ?? '220px' }};">
    @if(isset($show))
    <a href="{{ $show }}" class="btn btn-sm btn-outline-custom me-1" title="Voir">
        <i class="fas fa-eye"></i>
    </a>
    @endif

    @if(isset($edit))
    <a href="{{ $edit }}" class="btn btn-sm btn-primary-custom me-1" title="Modifier">
        <i class="fas fa-edit"></i>
    </a>
    @endif

    @if(isset($delete))
    <form action="{{ $delete }}" method="POST" class="d-inline"
        onsubmit="return confirm('{{ $confirm ?? 'Supprimer ?' }}')">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm"
            style="background: #FEE2E2; color: #991B1B; border: none; border-radius: 8px; padding: 0.35rem 0.7rem; transition: var(--transition);"
            title="Supprimer" onmouseover="this.style.background='#FECACA'"
            onmouseout="this.style.background='#FEE2E2'">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
    @endif
</td>