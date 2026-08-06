<tr>
    <td colspan="{{ $colspan ?? 6 }}" class="text-center py-5">
        <i class="fas {{ $icon ?? 'fa-inbox' }}"
            style="font-size: 3rem; color: #D1D5DB; display: block; margin-bottom: 1rem;"></i>
        <p class="text-muted" style="font-size: 1rem;">{{ $message ?? 'Aucun élément trouvé' }}</p>
        @if(isset($action))
        <a href="{{ $action['url'] }}" class="btn btn-primary-custom mt-3">
            <i class="fas fa-plus me-2"></i> {{ $action['label'] }}
        </a>
        @endif
    </td>
</tr>