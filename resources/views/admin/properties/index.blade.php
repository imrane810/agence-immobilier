@extends('admin.admin')

@section('title', 'index')

@section('content')


<div class="d-flex justify-content-between align-items-center">
    <h1>Les biens</h1>
    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">ajouter un Bien</a>
</div>
<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Liste des biens immobiliers</h3>
    </div>

    <div class="card-body">
        @if(isset($properties) && count($properties) > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Type</th>
                        <th>Prix/jour</th>
                        <th>Ville</th>
                        <th>Disponibilité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->id }}</td>
                        <td>{{ $property->title }}</td>
                        <td>
                            <span class="badge bg-info">
                                {{ $property->type }}
                            </span>
                        </td>
                        <td>{{ number_format($property->price_per_day, 2) }} €</td>
                        <td>{{ $property->city ?? '—' }}</td>
                        <td>
                            @switch($property->availability_status)
                            @case('available')
                            <span class="badge bg-success">Disponible</span>
                            @break
                            @case('rented')
                            <span class="badge bg-danger">Loué</span>
                            @break
                            @case('reserved')
                            <span class="badge bg-warning">Réservé</span>
                            @break
                            @endswitch
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="alert alert-info">
            Aucun bien trouvé dans la base de données.
        </div>
        @endif
    </div>
</div>
@endsection