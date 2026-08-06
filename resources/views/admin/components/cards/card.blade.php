<div class="card-custom">
    @if(isset($header))
    <div class="card-header">
        @if(isset($icon))
        <i class="fas {{ $icon }} me-2 text-primary"></i>
        @endif
        {{ $header }}
    </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>