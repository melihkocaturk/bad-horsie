@props(['options' => [], 'selected' => null])

<select {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @forelse ($options as $key => $value)
        <option value="{{ $key }}" {{ ($key === $selected) ? 'selected' : '' }}>{{ $value }}</option>
    @empty
    @endforelse
</select>
