@extends('admin.admin')

@section('title', 'form')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h3 class="mb-0">Test - Ajouter un bien</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.properties.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="title" class="form-control" placeholder="Ex: Magnifique villa" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-select" required>
                    <option value="villa">Villa</option>
                    <option value="appartment">Appartement</option>
                    <option value="house">Maison</option>
                    <option value="studio">Studio</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Prix par jour (€)</label>
                <input type="number" step="0.01" name="price_per_day" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ville</label>
                <input type="text" name="city" class="form-control" placeholder="Ex: Paris">
            </div>

            <div class="mb-3">
                <label class="form-label">Disponibilité</label>
                <select name="availability_status" class="form-select">
                    <option value="available">Disponible</option>
                    <option value="rented">Loué</option>
                    <option value="reserved">Réservé</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection