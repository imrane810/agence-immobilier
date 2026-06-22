@props([
'variant' => 'primary',
'size' => 'md',
'type' => 'button',
'href' => null,
'icon' => null,
'full' => false,
'onclick' => null
])

@php
$variants = [
'primary' => 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm hover:shadow-md',
'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-800',
'outline' => 'border-2 border-blue-600 text-blue-600 hover:bg-blue-50',
'danger' => 'bg-red-600 hover:bg-red-700 text-white',
'success' => 'bg-green-600 hover:bg-green-700 text-white',
'public-primary' => 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm hover:shadow-md',
'public-outline' => 'border-2 border-blue-600 text-blue-600 hover:bg-blue-50',
];

$sizes = [
'sm' => 'px-3 py-1.5 text-sm',
'md' => 'px-4 py-2 text-sm',
'lg' => 'px-6 py-3 text-base',
];

$base = "inline-flex items-center justify-center font-semibold rounded-lg transition-all duration-300 focus:outline-none
focus:ring-2 focus:ring-offset-2 focus:ring-blue-500";
$classes = "{$base} {$variants[$variant]} {$sizes[$size]} " . ($full ? 'w-full' : '');
@endphp

@if($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} {{ $onclick ? 'onclick="'.$onclick.'"' : '' }}>
    @if($icon)<i class="fas {{ $icon }} mr-2"></i>@endif
    {{ $slot }}
</a>
@else
<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}
    {{ $onclick ? 'onclick="'.$onclick.'"' : '' }}>
    @if($icon)<i class="fas {{ $icon }} mr-2"></i>@endif
    {{ $slot }}
</button>
@endif