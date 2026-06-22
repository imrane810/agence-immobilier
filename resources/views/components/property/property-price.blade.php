@props(['price'])

<div class="font-bold text-blue-600 text-lg">
    {{ number_format($price, 0, ',', ' ') }} MAD
    <span class="text-sm font-normal text-gray-400">/ jour</span>
</div>