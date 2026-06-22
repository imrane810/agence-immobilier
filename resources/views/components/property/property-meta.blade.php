@props(['property'])

<div class="flex gap-4 text-xs text-gray-500 pt-3 border-t border-gray-100 mt-3">
    <span class="flex items-center gap-1">
        <i class="fas fa-map-marker-alt text-blue-500"></i>
        {{ $property->city }}
    </span>
    <span class="flex items-center gap-1">
        <i class="fas fa-bed text-blue-500"></i>
        {{ $property->rooms }}
    </span>
    <span class="flex items-center gap-1">
        <i class="fas fa-tag text-blue-500"></i>
        {{ ucfirst($property->type) }}
    </span>
</div>