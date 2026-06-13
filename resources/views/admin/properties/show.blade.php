@extends('layouts.admin')

@section('content')

@section('title', 'show')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">{{ $property->title }}</h2>

        <div>
            <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-warning">
                Edit
            </a>

            <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>
    </div>

    <div class="row">

        {{-- LEFT SIDE : IMAGES --}}
        <div class="col-md-7">

            {{-- MAIN IMAGE --}}
            <div class="card shadow-sm mb-3">
                <img src="{{ asset('storage/'.$property->main_image) }}" class="card-img-top"
                    style="height: 400px; object-fit: cover;">
            </div>

            {{-- GALLERY --}}
            <div class="row">

                @forelse($property->images as $image)
                <div class="col-4 mb-2">
                    <img src="{{ asset('storage/'.$image->image_path) }}" class="img-fluid rounded"
                        style="height: 120px; object-fit: cover;">
                </div>
                @empty
                <p class="text-muted">No gallery images</p>
                @endforelse

            </div>

        </div>

        {{-- RIGHT SIDE : INFO --}}
        <div class="col-md-5">

            <div class="card shadow-sm p-3">

                <h4 class="text-primary">
                    {{ $property->price_per_day }} MAD / day
                </h4>

                <hr>

                <p><strong>City:</strong> {{ $property->city }}</p>
                <p><strong>Address:</strong> {{ $property->address }}</p>
                <p><strong>Type:</strong>
                    <span class="badge bg-dark">
                        {{ ucfirst($property->type) }}
                    </span>
                </p>

                <p><strong>Rooms:</strong> {{ $property->rooms }}</p>

                <hr>

                {{-- DESCRIPTION --}}
                <h5>Description</h5>
                <p class="text-muted">
                    {{ $property->description }}
                </p>

                <hr>

                {{-- AMENITIES --}}
                <h5>Amenities</h5>

                <div class="d-flex flex-wrap gap-2">

                    @forelse($property->amenities as $amenity)
                    <span class="badge bg-success">
                        {{ $amenity->name }}
                    </span>
                    @empty
                    <span class="text-muted">No amenities</span>
                    @endforelse

                </div>

                <hr>

                {{-- BOOK BUTTON (future reservation system) --}}
                <button class="btn btn-primary w-100 mt-3">
                    Reserve Now
                </button>

            </div>

        </div>

    </div>

</div>

@endsection