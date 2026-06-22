@props([
'label' => null,
'name' => '',
'multiple' => false,
'accept' => 'image/*',
'required' => false,
'preview' => null
])

<div class="mb-3">
    @if($label)
    <label class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)<span class="text-red-500">*</span>@endif
    </label>
    @endif

    <div class="relative">
        <input type="file" name="{{ $name }}" id="{{ $name }}" accept="{{ $accept }}" {{ $multiple ? 'multiple' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge(['class' => "w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"]) }}>

        @if($preview)
        <div class="mt-2">
            <img src="{{ $preview }}" alt="Preview" class="rounded-lg max-h-32 object-cover border border-gray-200">
        </div>
        @endif
    </div>

    @error($name)
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>