@php
$isEdit = $property->exists;
@endphp

<div class="row g-3">

    {{-- TITLE --}}
    <div class="col-md-6">
        <label class="form-label-custom">
            Titre <span class="text-danger">*</span>
        </label>
        <input type="text" name="title" class="form-control-custom w-100" value="{{ old('title', $property->title) }}"
            placeholder="Ex: Villa moderne avec piscine">
        @error('title')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- PRICE --}}
    <div class="col-md-6">
        <label class="form-label-custom">
            Prix par jour <span class="text-danger">*</span>
        </label>
        <input type="number" name="price_per_day" class="form-control-custom w-100"
            value="{{ old('price_per_day', $property->price_per_day) }}" placeholder="Ex: 1500">
        @error('price_per_day')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- TYPE --}}
    <div class="col-md-4">
        <label class="form-label-custom">
            Type <span class="text-danger">*</span>
        </label>
        <select name="type" class="form-control-custom w-100">
            <option value="">Sélectionner un type</option>
            @foreach(['villa','apartment','house','studio'] as $type)
            <option value="{{ $type }}" {{ old('type', $property->type) == $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
            </option>
            @endforeach
        </select>
        @error('type')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- CITY --}}
    <div class="col-md-4">
        <label class="form-label-custom">
            Ville <span class="text-danger">*</span>
        </label>
        <input type="text" name="city" class="form-control-custom w-100" value="{{ old('city', $property->city) }}"
            placeholder="Ex: Casablanca">
        @error('city')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- ROOMS --}}
    <div class="col-md-4">
        <label class="form-label-custom">Nombre de pièces</label>
        <input type="number" name="rooms" class="form-control-custom w-100" value="{{ old('rooms', $property->rooms) }}"
            placeholder="Ex: 4" min="0">
        @error('rooms')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- ADDRESS --}}
    <div class="col-md-12">
        <label class="form-label-custom">
            Adresse <span class="text-danger">*</span>
        </label>
        <input type="text" name="address" class="form-control-custom w-100"
            value="{{ old('address', $property->address) }}" placeholder="Ex: 123, Avenue Mohamed V">
        @error('address')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- DESCRIPTION --}}
    <div class="col-md-12">
        <label class="form-label-custom">Description</label>
        <textarea name="description" rows="4" class="form-control-custom w-100"
            placeholder="Décrivez votre bien en quelques mots...">{{ old('description', $property->description) }}</textarea>
        @error('description')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- MAIN IMAGE --}}
    <div class="col-md-6">
        <label class="form-label-custom">Image principale</label>
        <input type="file" name="main_image" class="form-control-custom w-100" style="padding: 0.5rem;">
        @if($isEdit && $property->main_image)
        <div class="mt-2">
            <img src="{{ asset('storage/'.$property->main_image) }}" alt="Image principale" width="120" class="rounded"
                style="border: 2px solid #E5E7EB;">
            <small class="d-block text-muted mt-1">Image actuelle</small>
        </div>
        @endif
        @error('main_image')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- GALLERY --}}
    <div class="col-md-6">
        <label class="form-label-custom">Images de la galerie</label>
        <input type="file" name="images[]" class="form-control-custom w-100" multiple style="padding: 0.5rem;">
        <small class="text-muted d-block mt-1">
            <i class="fas fa-info-circle me-1"></i> Vous pouvez sélectionner plusieurs images
        </small>
        @error('images.*')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

    {{-- AMENITIES --}}
    <div class="col-md-12 mt-2">
        <label class="form-label-custom">Équipements</label>
        <div class="row g-2 mt-1">
            @foreach(\App\Models\Amenity::all() as $amenity)
            <div class="col-md-3 col-sm-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="amenities[]" value="{{ $amenity->id }}"
                        id="amenity_{{ $amenity->id }}"
                        {{ $isEdit && $property->amenities->contains($amenity->id) ? 'checked' : '' }}
                        style="border-color: #D1D5DB; cursor: pointer;">
                    <label class="form-check-label" for="amenity_{{ $amenity->id }}"
                        style="font-size: 0.9rem; cursor: pointer;">
                        {{ $amenity->name }}
                    </label>
                </div>
            </div>
            @endforeach
        </div>
        @error('amenities')
        <small class="text-danger d-block mt-1">{{ $message }}</small>
        @enderror
    </div>

</div>