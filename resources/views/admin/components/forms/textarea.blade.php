<div class="col-md-12">
    <label class="form-label-custom">{{ $label }}</label>
    <textarea name="{{ $name }}" rows="{{ $rows ?? 4 }}" class="form-control-custom w-100"
        placeholder="{{ $placeholder ?? '' }}">{{ old($name, $value ?? '') }}</textarea>
    @error($name)
    <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>