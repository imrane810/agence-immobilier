@props([
'label' => null,
'name' => '',
'value' => '1',
'checked' => false
])

<div class="flex items-center gap-2 mb-2">
    <input type="checkbox" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        {{ old($name) || $checked ? 'checked' : '' }}
        {{ $attributes->merge(['class' => "rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition duration-200"]) }}>
    @if($label)
    <label for="{{ $name }}" class="text-sm text-gray-700 cursor-pointer">
        {{ $label }}
    </label>
    @endif
</div>