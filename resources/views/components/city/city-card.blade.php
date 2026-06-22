@props([
'name' => '',
'image' => '',
'count' => 0,
'link' => '#'
])

<a href="{{ $link }}" class="block group">
    <div
        {{ $attributes->merge(['class' => "rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 bg-white hover:-translate-y-1"]) }}>
        <div class="relative h-48 overflow-hidden">
            <img src="{{ $image }}" alt="{{ $name }}"
                class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                <h3 class="font-bold text-lg flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-blue-400"></i>
                    {{ $name }}
                </h3>
                <p class="text-sm text-white/80">
                    <i class="fas fa-home mr-1"></i>
                    {{ $count }} bien{{ $count > 1 ? 's' : '' }} disponibles
                </p>
            </div>
        </div>
    </div>
</a>