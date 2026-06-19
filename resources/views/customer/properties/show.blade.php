@extends('layouts.app')

@section('title', $property->title ?? 'Détail du bien')

@section('content')

{{-- BREADCRUMB --}}
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb" style="background: transparent; padding: 0; margin: 0;">
        <li class="breadcrumb-item"><a href="/" style="color: var(--primary-light); text-decoration: none;">Accueil</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('properties.index') }}"
                style="color: var(--primary-light); text-decoration: none;">Biens</a></li>
        <li class="breadcrumb-item active" style="color: var(--text-gray);">{{ Str::limit($property->title, 30) }}</li>
    </ol>
</nav>

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
                <button class="btn-outline-public" style="padding: 0.75rem 1.25rem;"
                    onclick="alert('Fonctionnalité à venir')">
                    <i class="fas fa-heart"></i>
                </button>
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

@endsection