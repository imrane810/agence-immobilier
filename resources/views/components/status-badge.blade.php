@php
$class = match($status) {
'available' => 'bg-success',
'rented' => 'bg-danger',
'reserved' => 'bg-warning',
default => 'bg-secondary',
};

$label = match($status) {
'available' => 'Disponible',
'rented' => 'Loué',
'reserved' => 'Réservé',
default => 'Inconnu',
};
@endphp

<span class="badge {{ $class }}">
    {{ $label }}
</span>