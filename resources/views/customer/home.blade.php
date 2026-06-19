@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

{{-- ============================================
    1. HERO SECTION
============================================ --}}
<section class="hero-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1>Votre propriété idéale vous attend</h1>
                <p>Découvrez notre sélection de biens immobiliers de qualité au Maroc</p>
                <div class="search-box mx-auto">
                    <input type="text" placeholder="Rechercher un bien, une ville..." id="searchInput">
                    <button onclick="alert('Fonctionnalité de recherche à venir')">
                        <i class="fas fa-search me-2"></i> Rechercher
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================================
    2. DERNIÈRES PROPRIÉTÉS
============================================ --}}
<section class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="section-title">Nos dernières propriétés</h2>
            <p class="section-subtitle">Découvrez nos biens récemment ajoutés</p>
        </div>
        <a href="{{ route('properties.index') }}" class="btn-outline-public">
            Voir tout <i class="fas fa-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="row g-4">
        @forelse(\App\Models\Property::latest()->take(6)->get() as $property)
        <div class="col-md-4 col-sm-6">
            <div class="property-card">
                {{-- Image --}}
                @if($property->main_image)
                <img src="{{ asset('storage/'.$property->main_image) }}" class="card-img-top"
                    alt="{{ $property->title }}">
                @else
                <div class="card-img-top property-card-placeholder">
                    <i class="fas fa-home"></i>
                </div>
                @endif

                {{-- Body --}}
                <div class="card-body">
                    <h5 class="card-title">{{ Str::limit($property->title, 40) }}</h5>
                    <p class="card-text">{{ Str::limit($property->description ?? 'Superbe propriété à découvrir', 60) }}
                    </p>

                    {{-- Prix --}}
                    <div class="price-tag">
                        {{ number_format($property->price_per_day, 0, ',', ' ') }} MAD
                        <span class="price-unit">/ jour</span>
                    </div>

                    {{-- Meta --}}
                    <div class="property-meta">
                        <span><i class="fas fa-map-marker-alt"></i> {{ $property->city }}</span>
                        <span><i class="fas fa-bed"></i> {{ $property->rooms }}</span>
                        <span><i class="fas fa-tag"></i> {{ ucfirst($property->type) }}</span>
                    </div>

                    {{-- Bouton --}}
                    <div class="mt-3">
                        <a href="{{ route('properties.show', $property) }}"
                            class="btn-primary-public w-100 text-center">
                            <i class="fas fa-eye me-1"></i> Voir le bien
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fas fa-home empty-icon"></i>
            <p class="text-muted">Aucune propriété disponible pour le moment.</p>
        </div>
        @endforelse
    </div>
</section>

{{-- ============================================
    3. VILLES POPULAIRES
============================================ --}}
<section class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="section-title">Villes populaires</h2>
            <p class="section-subtitle">Découvrez nos biens dans les villes les plus recherchées</p>
        </div>
    </div>

    <div class="row g-4">
        {{-- Agadir --}}
        <div class="col-md-6">
            <a href="{{ route('properties.index') }}?city=Agadir" class="city-link">
                <div class="city-card">
                    <div class="city-card-image">
                        <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?w=800&h=400&fit=crop"
                            alt="Agadir">
                        <div class="city-card-overlay">
                            <div class="city-card-name">
                                <i class="fas fa-map-marker-alt me-2"></i> Agadir
                            </div>
                            <div class="city-card-count">
                                <i class="fas fa-home me-1"></i>
                                {{ \App\Models\Property::where('city', 'Agadir')->count() }} biens disponibles
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Taghazout --}}
        <div class="col-md-6">
            <a href="{{ route('properties.index') }}?city=Taghazout" class="city-link">
                <div class="city-card">
                    <div class="city-card-image">
                        <img src="https://images.unsplash.com/photo-1537956965359-757f2c4c9e03?w=800&h=400&fit=crop"
                            alt="Taghazout">
                        <div class="city-card-overlay">
                            <div class="city-card-name">
                                <i class="fas fa-map-marker-alt me-2"></i> Taghazout
                            </div>
                            <div class="city-card-count">
                                <i class="fas fa-home me-1"></i>
                                {{ \App\Models\Property::where('city', 'Taghazout')->count() }} biens disponibles
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- Message si peu de biens --}}
    @php $totalProperties = \App\Models\Property::count(); @endphp
    @if($totalProperties < 10 && $totalProperties> 0)
        <div class="alert alert-info mt-3">
            <i class="fas fa-info-circle me-2"></i>
            <strong>{{ $totalProperties }} biens disponibles</strong> — De nouvelles propriétés arrivent régulièrement.
            Revenez bientôt !
        </div>
        @elseif($totalProperties == 0)
        <div class="alert alert-warning mt-3">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Aucun bien disponible pour le moment. Revenez bientôt pour découvrir nos nouvelles offres !
        </div>
        @endif
</section>

{{-- ============================================
    4. POURQUOI NOUS CHOISIR
============================================ --}}
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="section-title">Pourquoi nous choisir ?</h2>
        <p class="section-subtitle">Une expérience de réservation simple, rapide et sécurisée</p>
    </div>

    <div class="row g-4">
        @php
        $features = [
        ['icon' => 'fa-bolt', 'title' => 'Réservation rapide', 'desc' => 'Réservez votre bien en quelques clics'],
        ['icon' => 'fa-shield-alt', 'title' => 'Paiement sécurisé', 'desc' => 'Transactions 100% sécurisées'],
        ['icon' => 'fa-headset', 'title' => 'Support 24/7', 'desc' => 'Une équipe à votre écoute en permanence'],
        ['icon' => 'fa-check-circle', 'title' => 'Biens vérifiés', 'desc' => 'Tous nos biens sont certifiés et
        contrôlés'],
        ];
        @endphp

        @foreach($features as $feature)
        <div class="col-md-3 col-6">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas {{ $feature['icon'] }}"></i>
                </div>
                <h5 class="feature-title">{{ $feature['title'] }}</h5>
                <p class="feature-desc">{{ $feature['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection

{{-- ============================================
    STYLES
============================================ --}}
@push('styles')
<style>
/* ==========================================
       HERO
    ========================================== */
.hero-section {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
    padding: 4rem 0;
    border-radius: var(--radius);
    margin-bottom: 2rem;
    color: var(--white);
}

.hero-section h1 {
    font-weight: 700;
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

.hero-section p {
    font-size: 1.1rem;
    opacity: 0.9;
}

.search-box {
    background: var(--white);
    border-radius: var(--radius-sm);
    padding: 0.5rem;
    display: flex;
    gap: 0.5rem;
    max-width: 600px;
}

.search-box input {
    border: none;
    padding: 0.7rem 1rem;
    flex: 1;
    border-radius: var(--radius-sm);
    outline: none;
    font-size: 0.95rem;
}

.search-box button {
    background: var(--primary-light);
    border: none;
    color: var(--white);
    padding: 0.7rem 1.5rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    transition: var(--transition);
}

.search-box button:hover {
    background: var(--primary-hover);
}

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
    height: 220px;
    object-fit: cover;
}

.property-card-placeholder {
    height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #F3F4F6;
}

.property-card-placeholder i {
    font-size: 4rem;
    color: #D1D5DB;
}

.property-card .card-body {
    padding: 1.25rem;
}

.property-card .card-title {
    font-weight: 600;
    font-size: 1.05rem;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.property-card .card-text {
    font-size: 0.9rem;
    color: var(--text-gray);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.price-tag {
    font-weight: 700;
    color: var(--primary-light);
    font-size: 1.2rem;
}

.price-unit {
    font-size: 0.8rem;
    font-weight: 400;
    color: var(--text-gray);
}

.property-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.85rem;
    color: var(--text-gray);
    padding-top: 0.75rem;
    border-top: 1px solid #F3F4F6;
    margin-top: 0.75rem;
}

.property-meta i {
    color: var(--primary-light);
    width: 16px;
}

/* ==========================================
       CITY CARDS
    ========================================== */
.city-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.city-card {
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    background: white;
    height: 100%;
}

.city-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-md) !important;
}

.city-card-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.city-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.city-card:hover .city-card-image img {
    transform: scale(1.05);
}

.city-card-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
    padding: 1.5rem 1.25rem;
}

.city-card-name {
    color: white;
    font-weight: 700;
    font-size: 1.3rem;
}

.city-card-name i {
    color: var(--primary-light);
}

.city-card-count {
    color: rgba(255, 255, 255, 0.85);
    font-size: 0.9rem;
}

/* ==========================================
       FEATURE CARDS
    ========================================== */
.feature-card {
    text-align: center;
    padding: 1.5rem 1rem;
    background: white;
    border-radius: var(--radius);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    height: 100%;
}

.feature-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md) !important;
}

.feature-icon {
    font-size: 2.5rem;
    color: var(--primary-light);
    margin-bottom: 0.75rem;
    transition: var(--transition);
    display: inline-block;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1);
}

.feature-title {
    font-weight: 600;
    font-size: 1rem;
    color: var(--text-dark);
}

.feature-desc {
    font-size: 0.85rem;
    color: var(--text-gray);
    margin-bottom: 0;
}

/* ==========================================
       BUTTONS
    ========================================== */
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

/* ==========================================
       SECTION TITLES
    ========================================== */
.section-title {
    font-weight: 700;
    font-size: 1.75rem;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
}

.section-subtitle {
    color: var(--text-gray);
    font-size: 1rem;
    margin-bottom: 0;
}

/* ==========================================
       ALERTS
    ========================================== */
.alert-info {
    border-radius: var(--radius-sm);
    border: none;
    background: #EFF6FF;
    color: #1E3A8A;
    border-left: 4px solid var(--primary-light);
}

.alert-warning {
    border-radius: var(--radius-sm);
    border: none;
    background: #FEF3C7;
    color: #92400E;
    border-left: 4px solid #F59E0B;
}

/* ==========================================
       EMPTY STATE
    ========================================== */
.empty-icon {
    font-size: 3rem;
    color: #D1D5DB;
    display: block;
    margin-bottom: 1rem;
}

/* ==========================================
       RESPONSIVE
    ========================================== */
@media (max-width: 768px) {
    .hero-section {
        padding: 2.5rem 0;
    }

    .hero-section h1 {
        font-size: 1.75rem;
    }

    .search-box {
        flex-direction: column;
    }

    .search-box button {
        width: 100%;
    }

    .city-card-image {
        height: 160px;
    }

    .section-title {
        font-size: 1.4rem;
    }

    .property-card .card-img-top,
    .property-card-placeholder {
        height: 180px;
    }
}

@media (max-width: 576px) {
    .hero-section h1 {
        font-size: 1.4rem;
    }

    .city-card-image {
        height: 140px;
    }

    .property-card .card-img-top,
    .property-card-placeholder {
        height: 160px;
    }

    .feature-card {
        padding: 1rem 0.75rem;
    }

    .feature-icon {
        font-size: 2rem;
    }

    .feature-title {
        font-size: 0.85rem;
    }

    .feature-desc {
        font-size: 0.75rem;
    }
}
</style>
@endpush