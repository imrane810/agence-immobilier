@php
$isEdit = $property->exists;
@endphp

<div class="row">

    {{-- TITLE --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Title *</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $property->title) }}">
    </div>

    {{-- PRICE --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Price per day *</label>
        <input type="number" name="price_per_day" class="form-control"
            value="{{ old('price_per_day', $property->price_per_day) }}">
    </div>

    {{-- TYPE --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">Type *</label>
        <select name="type" class="form-select">

            @foreach(['villa','apartment','house','studio'] as $type)
            <option value="{{ $type }}" {{ old('type', $property->type) == $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
            </option>
            @endforeach

        </select>
    </div>

    {{-- CITY --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">City *</label>
        <input type="text" name="city" class="form-control" value="{{ old('city', $property->city) }}">
    </div>

    {{-- ROOMS --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">Rooms</label>
        <input type="number" name="rooms" class="form-control" value="{{ old('rooms', $property->rooms) }}">
    </div>

    {{-- ADDRESS --}}
    <div class="col-md-12 mb-3">
        <label class="form-label">Address *</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $property->address) }}">
    </div>

    {{-- DESCRIPTION --}}
    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="4"
            class="form-control">{{ old('description', $property->description) }}</textarea>
    </div>

    {{-- MAIN IMAGE --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Main Image</label>
        <input type="file" name="main_image" class="form-control">

        @if($isEdit && $property->main_image)
        <div class="mt-2">
            <img src="{{ asset('storage/'.$property->main_image) }}" width="120" class="rounded">
        </div>
        @endif
    </div>

    {{-- GALLERY --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Gallery Images</label>
        <input type="file" name="images[]" class="form-control" multiple>
    </div>

    {{-- AMENITIES --}}
    <div class="col-md-12 mb-3">
        <label class="form-label">Amenities</label>

        <div class="row mt-2">

            @foreach(\App\Models\Amenity::all() as $amenity)

            <div class="col-md-3">
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" name="amenities[]" value="{{ $amenity->id }}"
                        id="amenity_{{ $amenity->id }}"
                        {{ $isEdit && $property->amenities->contains($amenity->id) ? 'checked' : '' }}>

                    <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                        {{ $amenity->name }}
                    </label>

                </div>
            </div>

            @endforeach

        </div>
    </div>

</div>