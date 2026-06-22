@props([
'label' => null,
'name' => '',
'type' => 'text',
'value' => '',
'placeholder' => '',
'required' => false,
'error' => null,
'icon' => null
])

<div class="mb-3">
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)<span class="text-red-500">*</span>@endif
    </label>
    @endif

    <div class="relative">
        @if($icon)
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas {{ $icon }} text-gray-400"></i>
        </div>
        @endif
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => "w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-200 " . ($icon ? 'pl-10' : '') . ($errors->has($name) ? 'border-red-500' : '')]) }}>
    </div>

    @error($name)
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>