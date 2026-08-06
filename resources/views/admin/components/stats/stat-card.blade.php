<div class="col-md-{{ $col ?? 3 }}">
    <div class="stat-card" style="{{ isset($color) ? 'border-left-color: '.$color.';' : '' }}">
        <div class="stat-number">{{ $number }}</div>
        <div class="stat-label">{{ $label }}</div>
    </div>
</div>