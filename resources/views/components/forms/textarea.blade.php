@props([
'label' => null,
'name' => '',
'value' => '',
'placeholder' => '',
'rows' => 4,
'required' => false
])

<div class="mb-3">
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)<span class="text-red-500">*</span>@endif
    </label>
    @endif

    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => "w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-200 " . ($errors->has($name) ? 'border-red-500' : '')]) }}>{{ old($name, $value) }}</textarea>

    @error($name)
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>