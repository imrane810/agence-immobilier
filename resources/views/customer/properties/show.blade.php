@extends('layouts.app')

@section('title', $property->title ?? 'Détail du bien')

@section('content')

{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
        <li class="breadcrumb-item">
            <a href="/" style="color: var(--primary-light); text-decoration: none;">Accueil</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('properties.index') }}"
                style="color: var(--primary-light); text-decoration: none;">Biens</a>
        </li>
        <li class="breadcrumb-item active" style="color: var(--text-gray);">
            {{ Str::limit($property->title, 30) }}
        </li>
    </ol>
</nav>

{{-- ==========================================
    DÉTAIL DU BIEN
========================================== --}}
<div class="row g-4">

    {{-- LEFT: IMAGES --}}
    <div class="col-lg-7">
        {{-- Main Image --}}
        <div class="card-custom mb-3"
            style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.08);">
            @if($property->main_image)
            <img src="{{ asset('storage/'.$property->main_image) }}" alt="{{ $property->title }}"
                style="width: 100%; height: 450px; object-fit: cover;">
            @else
            <div class="d-flex align-items-center justify-content-center" style="height: 450px; background: #F3F4F6;">
                <i class="fas fa-home" style="font-size: 5rem; color: #D1D5DB;"></i>
            </div>
            @endif
        </div>

        {{-- Gallery --}}
        @if($property->images->count() > 0)
        <div class="row g-2">
            @foreach($property->images as $image)
            <div class="col-3">
                <img src="{{ asset('storage/'.$image->image_path) }}" alt="Image galerie"
                    style="width: 100%; height: 100px; object-fit: cover; border-radius: 8px; border: 2px solid #F3F4F6; transition: all 0.25s ease-in-out; cursor: pointer;"
                    onmouseover="this.style.borderColor='var(--primary-light)'"
                    onmouseout="this.style.borderColor='#F3F4F6'">
            </div>
            @endforeach
        </div>
        @endif
    </div>

    {{-- RIGHT: DETAILS --}}
    <div class="col-lg-5">
        <div class="card-custom"
            style="background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.08); position: sticky; top: 20px;">

            {{-- Title --}}
            <h1 style="font-size: 1.5rem; font-weight: 700; color: var(--text-dark); margin-bottom: 0.5rem;">
                {{ $property->title }}
            </h1>

            {{-- Location --}}
            <p style="color: var(--text-gray); font-size: 0.9rem; margin-bottom: 1rem;">
                <i class="fas fa-map-marker-alt" style="color: var(--primary-light);"></i>
                {{ $property->address }}, {{ $property->city }}
            </p>

            {{-- Price --}}
            <div style="background: #F0F7FF; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <span style="font-size: 2rem; font-weight: 700; color: var(--primary-light);">
                    {{ number_format($property->price_per_day, 0, ',', ' ') }} MAD
                </span>
                <span style="font-size: 0.9rem; color: var(--text-gray);">/ jour</span>
            </div>

            {{-- Meta --}}
            <div class="row g-3 mb-3">
                <div class="col-6">
                    <div style="background: #F3F4F6; padding: 0.75rem; border-radius: 8px; text-align: center;">
                        <i class="fas fa-bed" style="color: var(--primary-light);"></i>
                        <div style="font-weight: 600; font-size: 1.1rem;">{{ $property->rooms }}</div>
                        <div style="font-size: 0.75rem; color: var(--text-gray);">Pièces</div>
                    </div>
                </div>
                <div class="col-6">
                    <div style="background: #F3F4F6; padding: 0.75rem; border-radius: 8px; text-align: center;">
                        <i class="fas fa-tag" style="color: var(--primary-light);"></i>
                        <div style="font-weight: 600; font-size: 1.1rem;">{{ ucfirst($property->type) }}</div>
                        <div style="font-size: 0.75rem; color: var(--text-gray);">Type</div>
                    </div>
                </div>
            </div>

            {{-- Description --}}
            <hr>
            <h6 style="font-weight: 600; font-size: 0.9rem;">Description</h6>
            <p style="color: var(--text-gray); font-size: 0.9rem; line-height: 1.7;">
                {{ $property->description ?? 'Aucune description disponible.' }}
            </p>

            {{-- Amenities --}}
            @if($property->amenities->count() > 0)
            <hr>
            <h6 style="font-weight: 600; font-size: 0.9rem;">
                <i class="fas fa-check-circle" style="color: var(--primary-light);"></i> Équipements
            </h6>
            <div class="d-flex flex-wrap gap-2 mt-2">
                @foreach($property->amenities as $amenity)
                <span
                    style="background: #D1FAE5; color: #065F46; padding: 0.35rem 0.85rem; border-radius: 20px; font-size: 0.75rem; font-weight: 500;">
                    <i class="fas fa-check me-1" style="font-size: 0.6rem;"></i>
                    {{ $amenity->name }}
                </span>
                @endforeach
            </div>
            @endif

            {{-- Actions --}}
            <hr>
            <div class="d-flex gap-2">
                <button class="btn-primary-public w-100"
                    style="padding: 0.75rem; font-weight: 600; text-align: center;">
                    <i class="fas fa-calendar-check me-2"></i> Réserver
                </button>
                <!-- <button class="btn-outline-public" style="padding: 0.75rem 1.25rem;"
                    onclick="alert('Fonctionnalité à venir')">
                    <i class="fas fa-heart"></i>
                </button> -->
            </div>

            {{-- Back --}}
            <div class="mt-3 text-center">
                <a href="{{ route('properties.index') }}"
                    style="color: var(--text-gray); text-decoration: none; font-size: 0.85rem;">
                    <i class="fas fa-arrow-left me-1"></i> Retour à la liste
                </a>
            </div>

        </div>
    </div>

</div>

{{-- ==========================================
    PROPRIÉTÉS SIMILAIRES
========================================== --}}
@php
$similarProperties = \App\Models\Property::where('id', '!=', $property->id)
->where(function($query) use ($property) {
$query->where('city', $property->city)
->orWhere('type', $property->type);
})
->latest()
->take(4)
->get();
@endphp

@if($similarProperties->count() > 0)
<section class="mt-5 pt-4 border-top">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="section-title">Propriétés similaires</h2>
            <p class="section-subtitle">Découvrez d'autres biens qui pourraient vous intéresser</p>
        </div>
        <a href="{{ route('properties.index') }}" class="btn-outline-public">
            Voir tout <i class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="row g-4">
        @foreach($similarProperties as $similar)
        <div class="col-md-3 col-sm-6">
            <div class="property-card">
                {{-- Image --}}
                @if($similar->main_image)
                <img src="{{ asset('storage/'.$similar->main_image) }}" class="card-img-top"
                    alt="{{ $similar->title }}">
                @else
                <div class="card-img-top property-card-placeholder">
                    <i class="fas fa-home"></i>
                </div>
                @endif

                {{-- Body --}}
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($similar->title, 30) }}</h5>
                    <p class="card-text">{{ Str::limit($similar->description ?? 'Superbe propriété à découvrir', 50) }}
                    </p>

                    {{-- Prix --}}
                    <div class="price-tag">
                        {{ number_format($similar->price_per_day, 0, ',', ' ') }} MAD
                        <span class="price-unit">/ jour</span>
                    </div>

                    {{-- Meta --}}
                    <div class="property-meta">
                        <span><i class="fas fa-map-marker-alt"></i> {{ $similar->city }}</span>
                        <span><i class="fas fa-bed"></i> {{ $similar->rooms }}</span>
                    </div>

                    {{-- Bouton --}}
                    <div class="mt-2">
                        <a href="{{ route('properties.show', $similar) }}" class="btn-primary-public w-100 text-center"
                            style="font-size: 0.85rem; padding: 0.4rem 1rem;">
                            <i class="fas fa-eye me-1"></i> Voir
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif

@endsection

@push('styles')
<style>
/* ==========================================
       PROPERTY CARDS
    ========================================== */
.property-card {
    background: var(--white);
    border: none;
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    overflow: hidden;
    height: 100%;
}

.property-card:hover {
    box-shadow: var(--shadow-md);
    transform: translateY(-6px);
}

.property-card .card-img-top {
    height: 180px;
    object-fit: cover;
}

.property-card-placeholder {
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #F3F4F6;
}

.property-card-placeholder i {
    font-size: 3rem;
    color: #D1D5DB;
}

.property-card .card-body {
    padding: 1rem;
}

.property-card .card-title {
    font-weight: 600;
    font-size: 0.95rem;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.property-card .card-text {
    font-size: 0.8rem;
    color: var(--text-gray);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.price-tag {
    font-weight: 700;
    color: var(--primary-light);
    font-size: 1rem;
}

.price-unit {
    font-size: 0.7rem;
    font-weight: 400;
    color: var(--text-gray);
}

.property-meta {
    display: flex;
    gap: 0.75rem;
    font-size: 0.75rem;
    color: var(--text-gray);
    padding-top: 0.5rem;
    border-top: 1px solid #F3F4F6;
    margin-top: 0.5rem;
}

.property-meta i {
    color: var(--primary-light);
    width: 14px;
}

.btn-primary-public {
    background: var(--primary-light);
    border: none;
    color: var(--white);
    padding: 0.5rem 1.5rem;
    border-radius: var(--radius-sm);
    font-weight: 500;
    font-size: 0.9rem;
    transition: var(--transition);
    text-decoration: none;
    display: inline-block;
}

.btn-primary-public:hover {
    background: var(--primary-hover);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
}

.btn-outline-public {
    background: transparent;
    border: 1.5px solid var(--primary-light);
    color: var(--primary-light);
    padding: 0.5rem 1.5rem;
    border-radius: var(--radius-sm);
    font-weight: 500;
    font-size: 0.9rem;
    transition: var(--transition);
    text-decoration: none;
    display: inline-block;
}

.btn-outline-public:hover {
    background: var(--primary-light);
    color: var(--white);
    transform: translateY(-2px);
}

.section-title {
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
}

.section-subtitle {
    color: var(--text-gray);
    font-size: 0.95rem;
    margin-bottom: 0;
}

/* ==========================================
       RESPONSIVE
    ========================================== */
@media (max-width: 768px) {

    .property-card .card-img-top,
    .property-card-placeholder {
        height: 160px;
    }

    .section-title {
        font-size: 1.25rem;
    }
}

@media (max-width: 576px) {

    .property-card .card-img-top,
    .property-card-placeholder {
        height: 140px;
    }

    .property-card .card-body {
        padding: 0.75rem;
    }

    .property-card .card-title {
        font-size: 0.85rem;
    }

    .price-tag {
        font-size: 0.9rem;
    }
}
</style>
@endpush