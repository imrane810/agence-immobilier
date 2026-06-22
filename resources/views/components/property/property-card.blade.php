@props(['property'])

<div
    {{ $attributes->merge(['class' => "bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden hover:-translate-y-1 group"]) }}>
    {{-- Image --}}
    <div class="relative overflow-hidden">
        @if($property->main_image)
        <img src="{{ asset('storage/'.$property->main_image) }}" alt="{{ $property->title }}"
            class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
        @else
        <div class="w-full h-56 bg-gray-100 flex items-center justify-center">
            <i class="fas fa-home text-5xl text-gray-300"></i>
        </div>
        @endif

        {{-- Badge type --}}
        <span
            class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-gray-700 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
            {{ ucfirst($property->type) }}
        </span>
    </div>

    {{-- Body --}}
    <div class="p-4">
        <h3 class="font-semibold text-gray-900 text-lg mb-1 line-clamp-1">
            {{ $property->title }}
        </h3>

        <p class="text-gray-500 text-sm mb-3 line-clamp-2">
            {{ $property->description ?? 'Superbe propriété à découvrir' }}
        </p>

        {{-- Prix --}}
        <x-property.property-price :price="$property->price_per_day" />

        {{-- Meta --}}
        <x-property.property-meta :property="$property" />

        {{-- Bouton --}}
        <div class="mt-3">
            <x-ui.button variant="primary" href="{{ route('properties.show', $property) }}" full icon="fa-eye">
                Voir le bien
            </x-ui.button>
        </div>
    </div>
</div>