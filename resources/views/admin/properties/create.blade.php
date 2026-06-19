@extends('layouts.admin')

@section('title', 'Ajouter un bien')
@section('page-title', 'Ajouter un bien')
@section('page-subtitle', 'Créez une nouvelle propriété')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="text-muted mb-0" style="font-size: 0.9rem;">
            <i class="fas fa-plus-circle me-1"></i> Remplissez tous les champs obligatoires (*)
        </p>
    </div>
    <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-custom">
        <i class="fas fa-arrow-left me-2"></i> Retour
    </a>
</div>

<div class="card-custom">
    <div class="card-header">
        <i class="fas fa-home me-2 text-primary"></i> Nouvelle propriété
    </div>
    <div class="card-body">

        <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            @include('admin.properties.shared.form', [
            'property' => new \App\Models\Property()
            ])

            {{-- BOUTONS --}}
            <div class="mt-4 pt-3 border-top d-flex gap-2">
                <button type="submit" class="btn btn-primary-custom">
                    <i class="fas fa-save me-2"></i> Enregistrer
                </button>

                <a href="{{ route('admin.properties.index') }}" class="btn"
                    style="background: #F3F4F6; color: #374151; border: none; border-radius: 8px; padding: 0.5rem 1.25rem; font-weight: 500; font-size: 0.9rem; transition: var(--transition); text-decoration: none;"
                    onmouseover="this.style.background='#E5E7EB'" onmouseout="this.style.background='#F3F4F6'">
                    <i class="fas fa-times me-2"></i> Annuler
                </a>
            </div>

        </form>

    </div>
</div>

@endsection