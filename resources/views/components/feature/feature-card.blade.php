@props([
'icon' => '',
'title' => '',
'description' => ''
])

<div
    {{ $attributes->merge(['class' => "text-center p-6 bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group"]) }}>
    <div class="text-blue-500 text-4xl mb-3 group-hover:scale-110 transition duration-300 inline-block">
        <i class="fas {{ $icon }}"></i>
    </div>
    <h4 class="font-semibold text-gray-900">{{ $title }}</h4>
    <p class="text-gray-500 text-sm">{{ $description }}</p>
</div>