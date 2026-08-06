<div class="col-md-12 mt-2">
    <label class="form-label-custom">{{ $label }}</label>
    <div class="row g-2 mt-1">
        {{ $slot }}
    </div>
    @error($name)
    <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>