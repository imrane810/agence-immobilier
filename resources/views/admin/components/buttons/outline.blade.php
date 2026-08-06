<a {{ $attributes->merge(['class' => 'btn btn-outline-custom']) }}>
    <i class="fas {{ $icon ?? 'fa-arrow-left' }} me-2"></i> {{ $slot }}
</a>