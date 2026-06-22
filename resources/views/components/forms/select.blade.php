@props([
'label' => null,
'name' => '',
'options' => [],
'selected' => '',
'placeholder' => 'Sélectionner...',
'required' => false
])

<div class="mb-3">
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)<span class="text-red-500">*</span>@endif
    </label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => "w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-200 " . ($errors->has($name) ? 'border-red-500' : '')]) }}>
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
            {{ $label }}
        </option>
        @endforeach
    </select>

    @error($name)
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>