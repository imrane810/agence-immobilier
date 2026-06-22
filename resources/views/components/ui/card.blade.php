@props([
'header' => null,
'footer' => null,
'padding' => 'p-4',
'class' => ''
])

<div
    {{ $attributes->merge(['class' => "bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden {$class}"]) }}>
    @if($header)
    <div class="border-b border-gray-100 px-4 py-3 font-semibold text-gray-800">
        {{ $header }}
    </div>
    @endif

    <div class="{{ $padding }}">
        {{ $slot }}
    </div>

    @if($footer)
    <div class="border-t border-gray-100 px-4 py-3 bg-gray-50">
        {{ $footer }}
    </div>
    @endif
</div>