<button {{ $attributes->merge(['class' => 'btn btn-primary-custom']) }}>
    <i class="fas {{ $icon ?? 'fa-save' }} me-2"></i> {{ $slot }}
</button>