@props([
    'name',
    'label' => null,
    'options' => [],
    'placeholder' => 'Pilih...',
    'selected' => '',
])

@php
    $hasError = $errors->has($name);
    $baseClass = 'w-full appearance-none rounded-xl border bg-white px-4 py-2.5 pr-9 text-gray-800 shadow-sm transition focus:outline-none focus:ring-2';
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

    <div class="relative">
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $attributes->merge(['class' => trim("$baseClass $stateClass")]) }}
        >
            <option value="" disabled {{ (string) $selected === '' ? 'selected' : '' }}>{{ $placeholder }}</option>
            @foreach ($options as $val => $text)
                <option value="{{ $val }}" {{ (string) $selected === (string) $val ? 'selected' : '' }}>{{ $text }}</option>
            @endforeach
        </select>

        <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 fill-current text-gray-400"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z" />
        </svg>
    </div>

    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
