<!-- select.blade.php -->
@props(['name', 'category', 'selected' => null, 'class' => 'form-control'])

<div class="form-group">
    <label for="{{ $name }}">{{ ucwords(Str::beforeLast($name, '_')) }}</label>
    <select id="{{ $name }}" name="{{ $name }}" class="{{ $class }}">
        <option value="">Select {{ ucwords(Str::beforeLast($name, '_')) }}</option>
        @foreach ($category as $item)
            <option value="{{ $item->id }}" {{ $selected == $item->id ? 'selected' : '' }}>
                {{ $item->name }}
            </option>
        @endforeach
    </select>
</div>
