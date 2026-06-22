@props([
'type' => 'info', // info, success, warning, danger
'dismissible' => false
])

@php
$types = [
'info' => 'bg-blue-50 text-blue-800 border-blue-200',
'success' => 'bg-green-50 text-green-800 border-green-200',
'warning' => 'bg-yellow-50 text-yellow-800 border-yellow-200',
'danger' => 'bg-red-50 text-red-800 border-red-200',
];

$icons = [
'info' => 'fa-info-circle',
'success' => 'fa-check-circle',
'warning' => 'fa-exclamation-triangle',
'danger' => 'fa-exclamation-circle',
];
@endphp

<div {{ $attributes->merge(['class' => "border-l-4 p-4 rounded-lg {$types[$type]} flex items-start gap-3"]) }}
    role="alert" x-data="{ show: true }" x-show="show">
    <i class="fas {{ $icons[$type] }} mt-0.5"></i>
    <div class="flex-1 text-sm">
        {{ $slot }}
    </div>
    @if($dismissible)
    <button @click="show = false" class="text-gray-400 hover:text-gray-600">
        <i class="fas fa-times"></i>
    </button>
    @endif
</div>