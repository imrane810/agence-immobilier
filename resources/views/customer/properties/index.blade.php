@extends('layouts.app')

@section('title', 'Nos biens')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="section-title">Nos biens immobiliers</h1>
        <p class="section-subtitle">Trouvez la propriété qui correspond à vos besoins</p>
    </div>
    <div>
        <span class="badge"
            style="background: var(--primary-light); color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: 500;">
            <i class="fas fa-building me-1"></i> {{ \App\Models\Property::count() }} biens
        </span>
    </div>
</div>

{{-- FILTRES (simple) --}}
<div class="card-custom mb-4"
    style="background: white; border-radius: 12px; padding: 1.25rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
    <div class="row g-3 align-items-end">
        <div class="col-md-4">
            <label class="form-label"
                style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">Ville</label>
            <select class="form-control-custom w-100"
                style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.65rem 1rem; font-size: 0.9rem;">
                <option value="">Toutes les villes</option>
                @php $cities = \App\Models\Property::select('city')->distinct()->pluck('city'); @endphp
                @foreach($cities as $city)
                <option value="{{ $city }}">{{ $city }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label"
                style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">Type</label>
            <select class="form-control-custom w-100"
                style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.65rem 1rem; font-size: 0.9rem;">
                <option value="">Tous les types</option>
                <option value="villa">Villa</option>
                <option value="apartment">Appartement</option>
                <option value="house">Maison</option>
                <option value="studio">Studio</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label" style="font-weight: 500; font-size: 0.85rem; color: var(--text-dark);">Prix
                max</label>
            <input type="number" class="form-control-custom w-100" placeholder="Ex: 2000"
                style="border: 1.5px solid #E5E7EB; border-radius: 8px; padding: 0.65rem 1rem; font-size: 0.9rem;">
        </div>
        <div class="col-md-2">
            <button class="btn-primary-public w-100" onclick="alert('Filtrage à venir')">
                <i class="fas fa-filter me-1"></i> Filtrer
            </button>
        </div>
    </div>
</div>

{{-- PROPRIÉTÉS --}}
<div class="row g-4">
    @forelse($properties as $property)
    <div class="col-md-4 col-sm-6">
        <div class="property-card">
            @if($property->main_image)
            <img src="{{ asset('storage/'.$property->main_image) }}" class="card-img-top" alt="{{ $property->title }}">
            @else
            <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 220px;">
                <i class="fas fa-home" style="font-size: 4rem; color: #D1D5DB;"></i>
            </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ Str::limit($property->title, 40) }}</h5>
                <p class="card-text">{{ Str::limit($property->description ?? 'Superbe propriété à découvrir', 60) }}</p>
                <div class="price-tag">{{ number_format($property->price_per_day, 0, ',', ' ') }} MAD <span
                        style="font-size: 0.8rem; font-weight: 400; color: var(--text-gray);">/ jour</span></div>
                <div class="property-meta">
                    <span><i class="fas fa-map-marker-alt"></i> {{ $property->city }}</span>
                    <span><i class="fas fa-bed"></i> {{ $property->rooms }}</span>
                    <span><i class="fas fa-tag"></i> {{ ucfirst($property->type) }}</span>
                </div>
                <div class="mt-3">
                    <a href="{{ route('properties.show', $property) }}" class="btn-primary-public w-100 text-center">
                        <i class="fas fa-eye me-1"></i> Voir le bien
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <i class="fas fa-inbox" style="font-size: 3rem; color: #D1D5DB; display: block; margin-bottom: 1rem;"></i>
        <p class="text-muted">Aucune propriété disponible pour le moment.</p>
    </div>
    @endforelse
</div>

{{-- PAGINATION --}}
@if(method_exists($properties, 'links'))
<div class="mt-4">
    {{ $properties->links() }}
</div>
@endif

@endsection