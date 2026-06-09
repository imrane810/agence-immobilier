<!-- Note: old('nom_du_champ', valeur_par_defaut) -->
@csrf

@if($property->exists)
@method('PUT')
@endif

<div class="mb-3">
    <label class="form-label">Titre</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $property->title) }}">
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $property->description) }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Prix / jour</label>
    <input type="number" step="0.01" name="price_per_day" class="form-control"
        value="{{ old('price_per_day', $property->price_per_day) }}">
</div>

<div class="mb-3">
    <label class="form-label">Type</label>
    <select name="type" class="form-select">
        @foreach(['villa','appartment','house','studio'] as $type)
        <option value="{{ $type }}" @selected(old('type', $property->type) == $type)>
            {{ ucfirst($type) }}
        </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">
    {{ $property->exists ? 'Modifier' : 'Créer' }}
</button>