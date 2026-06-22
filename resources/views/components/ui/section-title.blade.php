@props([
'title' => '',
'subtitle' => '',
'action' => null,
'actionUrl' => null
])

<div class="flex justify-between items-center mb-4">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">{{ $title }}</h2>
        @if($subtitle)
        <p class="text-gray-500 text-sm">{{ $subtitle }}</p>
        @endif
    </div>
    @if($action)
    <a href="{{ $actionUrl }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm flex items-center gap-1">
        {{ $action }} <i class="fas fa-arrow-right"></i>
    </a>
    @endif
</div>