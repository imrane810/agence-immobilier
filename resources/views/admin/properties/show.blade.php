@extends('layouts.admin')

@section('title', $property->title ?? 'Détail du bien')
@section('page-title', $property->title ?? 'Détail du bien')
@section('page-subtitle', 'Aperçu détaillé de la propriété')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">
            <i class="fas fa-eye me-1"></i> Détails de la propriété
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-primary-custom">
            <i class="fas fa-edit me-2"></i> Modifier
        </a>
        <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-custom">
            <i class="fas fa-arrow-left me-2"></i> Retour
        </a>
    </div>
</div>

<div class="row g-4">

    {{-- LEFT SIDE : IMAGES --}}
    <div class="col-md-7">

        {{-- MAIN IMAGE --}}
        <div class="card-custom mb-3">
            @if($property->main_image)
            <img src="{{ asset('storage/'.$property->main_image) }}" alt="{{ $property->title }}" class="w-100"
                style="height: 400px; object-fit: cover; border-radius: var(--radius) var(--radius) 0 0;">
            @else
            <div class="d-flex align-items-center justify-content-center bg-light"
                style="height: 400px; border-radius: var(--radius) var(--radius) 0 0;">
                <i class="fas fa-home" style="font-size: 5rem; color: #D1D5DB;"></i>
            </div>
            @endif
        </div>

        {{-- GALLERY --}}
        @if($property->images->count() > 0)
        <div class="row g-2">
            @forelse($property->images as $image)
            <div class="col-4">
                <img src="{{ asset('storage/'.$image->image_path) }}" alt="Image galerie" class="w-100 rounded"
                    style="height: 120px; object-fit: cover; border: 2px solid #F3F4F6; transition: var(--transition);"
                    onmouseover="this.style.borderColor='var(--primary-light)'"
                    onmouseout="this.style.borderColor='#F3F4F6'">
            </div>
            @endforeach
        </div>
        @else
        <div class="card-custom p-4 text-center">
            <i class="fas fa-images" style="font-size: 2rem; color: #D1D5DB;"></i>
            <p class="text-muted mt-2 mb-0">Aucune image dans la galerie</p>
        </div>
        @endif

    </div>

    {{-- RIGHT SIDE : INFO --}}
    <div class="col-md-5">

        <div class="card-custom">
            <div class="card-body">

                {{-- PRIX --}}
                <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom">
                    <span style="font-size: 2rem; font-weight: 700; color: var(--primary-light);">
                        {{ number_format($property->price_per_day, 0, ',', ' ') }} MAD
                    </span>
                    <span class="text-muted" style="font-size: 0.9rem;">/ jour</span>
                </div>

                {{-- INFOS --}}
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <small class="text-muted d-block"
                            style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3px;">Ville</small>
                        <span class="fw-medium">
                            <i class="fas fa-map-marker-alt me-1" style="color: var(--primary-light);"></i>
                            {{ $property->city }}
                        </span>
                    </div>
                    <div class="col-6">
                        <small class="text-muted d-block"
                            style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3px;">Type</small>
                        <span class="badge-status" style="background: #E5E7EB; color: #374151;">
                            {{ ucfirst($property->type) }}
                        </span>
                    </div>
                    <div class="col-6">
                        <small class="text-muted d-block"
                            style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3px;">Pièces</small>
                        <span>
                            <i class="fas fa-bed me-1" style="color: var(--primary-light);"></i>
                            {{ $property->rooms }}
                        </span>
                    </div>
                    <div class="col-12">
                        <small class="text-muted d-block"
                            style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.3px;">Adresse</small>
                        <span>{{ $property->address }}</span>
                    </div>
                </div>

                <hr>

                {{-- DESCRIPTION --}}
                <h6 class="fw-semibold" style="font-size: 0.9rem;">
                    <i class="fas fa-align-left me-2" style="color: var(--primary-light);"></i> Description
                </h6>
                <p class="text-muted" style="font-size: 0.9rem; line-height: 1.7;">
                    {{ $property->description ?: 'Aucune description disponible.' }}
                </p>

                <hr>

                {{-- AMENITIES --}}
                <h6 class="fw-semibold" style="font-size: 0.9rem;">
                    <i class="fas fa-check-circle me-2" style="color: var(--primary-light);"></i> Équipements
                </h6>
                <div class="d-flex flex-wrap gap-2 mt-2">
                    @forelse($property->amenities as $amenity)
                    <span class="badge-status" style="background: #D1FAE5; color: #065F46;">
                        <i class="fas fa-check me-1" style="font-size: 0.6rem;"></i>
                        {{ $amenity->name }}
                    </span>
                    @empty
                    <span class="text-muted" style="font-size: 0.9rem;">Aucun équipement</span>
                    @endforelse
                </div>

                <hr>

                {{-- BOOK BUTTON --}}
                <button class="btn btn-primary-custom w-100 mt-2" style="padding: 0.75rem; font-weight: 600;">
                    <i class="fas fa-calendar-check me-2"></i> Réserver maintenant
                </button>

            </div>
        </div>

    </div>

</div>

@endsection