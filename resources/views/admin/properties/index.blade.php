@extends('layouts.admin')

@section('title', 'index')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Dashboard des propriétés</h2>

    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
        + Ajouter un bien
    </a>
</div>

{{-- STATS CARDS --}}
<div class="row">

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6 class="text-muted">Total Properties</h6>
                <h2 class="text-primary">{{ \App\Models\Property::count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6 class="text-muted">Villas</h6>
                <h2 class="text-success">
                    {{ \App\Models\Property::where('type','villa')->count() }}
                </h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h6 class="text-muted">Apartments</h6>
                <h2 class="text-warning">
                    {{ \App\Models\Property::where('type','apartment')->count() }}
                </h2>
            </div>
        </div>
    </div>

</div>
{{-- TABLE --}}
<div class="card shadow-sm border-0 mt-4">

    <div class="card-header bg-dark text-white">
        Properties List
    </div>

    <div class="card-body p-0">

        <table class="table table-hover mb-0 align-middle">

            <thead class="table-light">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>City</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($properties as $property)

                <tr>

                    {{-- IMAGE --}}
                    <td>
                        @if($property->main_image)
                        <img src="{{ asset('storage/'.$property->main_image) }}" width="60" height="60"
                            class="rounded object-fit-cover">
                        @endif
                    </td>

                    {{-- TITLE --}}
                    <td class="fw-semibold">
                        {{ $property->title }}
                    </td>

                    {{-- CITY --}}
                    <td>{{ $property->city }}</td>

                    {{-- PRICE --}}
                    <td>
                        <span class="badge bg-success">
                            {{ $property->price_per_day }} MAD
                        </span>
                    </td>

                    {{-- TYPE --}}
                    <td>
                        <span class="badge bg-dark">
                            {{ ucfirst($property->type) }}
                        </span>
                    </td>

                    {{-- ACTIONS --}}
                    <td class="text-center">

                        <a href="{{ route('admin.properties.show', $property) }}" class="btn btn-sm btn-info">
                            View
                        </a>

                        <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this property?')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center py-4">
                        No properties found
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

</div>

@endsection