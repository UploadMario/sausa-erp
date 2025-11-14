<div class="mb-3">
    <label for="{{ $name }}" class="form-label fw-semibold">
        {{ $label }}
    </label>

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-select @error($name) is-invalid @enderror"
        {{ $attributes ?? '' }}
    >
        <option value="">Seleccione...</option>

        @foreach($options as $key => $text)
            <option value="{{ $key }}" {{ old($name, $value ?? '') == $key ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
