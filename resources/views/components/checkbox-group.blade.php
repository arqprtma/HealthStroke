@props([
    'name',
    'label' => null,
    'hint' => null,
    'options' => [],
    'valueKey' => 'id',
    'labelKey' => 'nama',
    'checked' => [],
])

<div class="mb-5">
    @if ($label)
        <h3 class="mb-1 text-sm font-semibold text-gray-700">{{ $label }}</h3>
    @endif
    @if ($hint)
        <p class="mb-2 text-xs text-gray-400">{{ $hint }}</p>
    @endif

    <div class="space-y-2">
        @foreach ($options as $opt)
            @php
                $val = $opt->{$valueKey};
                $isChecked = in_array($val, (array) $checked);
            @endphp
            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 bg-white px-4 py-3 shadow-sm transition hover:border-primary/50">
                <input type="checkbox" name="{{ $name }}[]" value="{{ $val }}" {{ $isChecked ? 'checked' : '' }}
                       class="h-4 w-4 accent-primary">
                <span class="text-sm text-gray-700">{{ $opt->{$labelKey} }}</span>
            </label>
        @endforeach
    </div>

    @error($name)
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
    @enderror
</div>
