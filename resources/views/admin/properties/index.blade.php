@extends('admin.admin')

@section('title', 'Biens immobiliers')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Les biens</h1>

    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
        + Ajouter
    </a>
</div>

<x-card>
    <x-slot name="header">
        Liste des biens immobiliers
    </x-slot>

    @if($properties->count())
    <table class="table align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Type</th>
                <th>Prix/jour</th>
                <th>Ville</th>
                <th>Statut</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($properties as $property)
            <tr>
                <td>{{ $property->id }}</td>
                <td>{{ $property->title }}</td>
                <td>{{ $property->type }}</td>
                <td>{{ $property->price_per_day }} MAD</td>
                <td>{{ $property->city ?? '-' }}</td>

                <td>
                    <x-status-badge :status="$property->availability_status" />
                </td>

                <td class="text-end">
                    <x-table-actions :edit-url="route('admin.properties.edit', $property)"
                        :delete-url="route('admin.properties.destroy', $property)" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="p-3 text-muted">
        Aucun bien trouvé
    </div>
    @endif
</x-card>

@endsection