<div class="col-md-{{ $col ?? 6 }}">
    <label class="form-label-custom">
        {{ $label }}
        @if($required ?? false)<span class="text-danger">*</span>@endif
    </label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" class="form-control-custom w-100"
        value="{{ old($name, $value ?? '') }}" placeholder="{{ $placeholder ?? '' }}" {{ $attributes }} @if($required ??
        false) required @endif>
    @error($name)
    <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>