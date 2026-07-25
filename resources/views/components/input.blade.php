@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
])

@php
    $hasError = $errors->has($name);
    $baseClass = 'w-full rounded-xl border bg-white px-4 py-2.5 text-gray-800 placeholder-gray-400 shadow-sm transition focus:outline-none focus:ring-2';
    $stateClass = $hasError
        ? 'border-red-400 focus:border-red-400 focus:ring-red-100'
        : 'border-gray-200 focus:border-primary focus:ring-primary/30';
@endphp

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="mb-1.5 block text-sm font-semibold text-gray-700">
            {{ $label }}
        </label>
    @endif

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        @if ($required) required @endif
        {{ $attributes->merge(['class' => trim("$baseClass $stateClass")]) }}
    >

    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
