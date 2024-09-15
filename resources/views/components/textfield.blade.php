<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" value="{{ old($name, $value ?? '') }}" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}">
</div>
