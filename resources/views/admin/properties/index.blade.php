@extends('layouts.admin')

@section('title', 'Gestion des propriétés')
@section('page-title', 'Propriétés')
@section('page-subtitle', 'Liste et gestion des biens immobiliers')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">
            <i class="fas fa-list-ul me-1"></i> Toutes vos propriétés
        </p>
    </div>
    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary-custom">
        <i class="fas fa-plus me-2"></i> Ajouter un bien
    </a>
</div>

{{-- STATS CARDS --}}
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-number">{{ \App\Models\Property::count() }}</div>
            <div class="stat-label">Total propriétés</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card" style="border-left-color: #10B981;">
            <div class="stat-number">{{ \App\Models\Property::where('type','villa')->count() }}</div>
            <div class="stat-label">Villas</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card" style="border-left-color: #F59E0B;">
            <div class="stat-number">{{ \App\Models\Property::where('type','apartment')->count() }}</div>
            <div class="stat-label">Appartements</div>
        </div>
    </div>
</div>

{{-- TABLE --}}
<div class="card-custom">
    <div class="card-header">
        <i class="fas fa-table me-2 text-primary"></i> Liste des propriétés
    </div>
    <div class="card-body p-0">
        <table class="table table-custom w-100">
            <thead>
                <tr>
                    <th style="width: 80px;">Image</th>
                    <th>Titre</th>
                    <th>Ville</th>
                    <th>Prix / jour</th>
                    <th>Type</th>
                    <th class="text-center" style="width: 220px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($properties as $property)
                <tr>
                    {{-- IMAGE --}}
                    <td>
                        @if($property->main_image)
                        <img src="{{ asset('storage/'.$property->main_image) }}" alt="{{ $property->title }}" width="55"
                            height="55" class="rounded object-fit-cover" style="border: 2px solid #F3F4F6;">
                        @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px; border: 2px solid #F3F4F6;">
                            <i class="fas fa-home text-muted" style="font-size: 1.2rem;"></i>
                        </div>
                        @endif
                    </td>

                    {{-- TITLE --}}
                    <td class="fw-semibold" style="color: var(--text-dark);">
                        {{ $property->title }}
                    </td>

                    {{-- CITY --}}
                    <td>
                        <i class="fas fa-map-marker-alt me-1" style="color: var(--text-gray); font-size: 0.75rem;"></i>
                        {{ $property->city }}
                    </td>

                    {{-- PRICE --}}
                    <td>
                        <span class="badge-status" style="background: #D1FAE5; color: #065F46;">
                            {{ number_format($property->price_per_day, 0, ',', ' ') }} MAD
                        </span>
                    </td>

                    {{-- TYPE --}}
                    <td>
                        <span class="badge-status" style="background: #E5E7EB; color: #374151;">
                            {{ ucfirst($property->type) }}
                        </span>
                    </td>

                    {{-- ACTIONS --}}
                    <td class="text-center">
                        <a href="{{ route('admin.properties.show', $property) }}"
                            class="btn btn-sm btn-outline-custom me-1" title="Voir">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.properties.edit', $property) }}"
                            class="btn btn-sm btn-primary-custom me-1" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Supprimer cette propriété ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm"
                                style="background: #FEE2E2; color: #991B1B; border: none; border-radius: 8px; padding: 0.35rem 0.7rem; transition: var(--transition);"
                                title="Supprimer" onmouseover="this.style.background='#FECACA'"
                                onmouseout="this.style.background='#FEE2E2'">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-inbox fa-3x d-block mb-3" style="color: var(--text-gray); opacity: 0.3;"></i>
                        <p class="text-muted mb-0" style="font-size: 1rem;">Aucune propriété trouvée</p>
                        <a href="{{ route('admin.properties.create') }}" class="btn btn-primary-custom mt-3">
                            <i class="fas fa-plus me-2"></i> Ajouter votre premier bien
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- PAGINATION (si tu l'utilises) --}}
@if(method_exists($properties, 'links'))
<div class="mt-4">
    {{ $properties->links() }}
</div>
@endif

@endsection