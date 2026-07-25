@props([
    'type' => 'submit',
])

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-2.5 font-semibold text-white shadow-sm transition hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary/40 active:scale-[.98]']) }}
>
    {{ $slot }}
</button>
