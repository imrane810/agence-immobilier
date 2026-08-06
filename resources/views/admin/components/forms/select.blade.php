<div class="col-md-{{ $col ?? 4 }}">
    <label class="form-label-custom">
        {{ $label }}
        @if($required ?? false)<span class="text-danger">*</span>@endif
    </label>
    <select name="{{ $name }}" class="form-control-custom w-100" @if($required ?? false) required @endif>
        <option value="">{{ $placeholder ?? 'Sélectionner' }}</option>
        {{ $slot }}
    </select>
    @error($name)
    <small class="text-danger d-block mt-1">{{ $message }}</small>
    @enderror
</div>