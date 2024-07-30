@props(['name', 'type' => 'text', 'value' => null, 'placeholder' => null, 'multiple' => false])

<div class="form-group">
    <label for="{{ $name }}">{{ ucwords(Str::beforeLast($name, '_')) }}</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}{{ $multiple ? '[]' : '' }}" class="form-control" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" {{ $multiple ? 'multiple' : '' }}>
</div>
