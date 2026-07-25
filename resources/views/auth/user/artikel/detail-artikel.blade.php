@extends('layouts.app')

@section('title', $artikel->judul . ' | ' . ($title ?? 'StrokeCare'))
@section('topbar', 'Detail Artikel')
@section('back', route('artikel'))

@section('content')
    <article class="mx-auto max-w-2xl overflow-hidden rounded-2xl bg-white shadow-lg shadow-gray-200/60">
        <img src="{{ asset(Storage::url("/artikel/cover/$artikel->cover")) }}" alt="Cover artikel"
             class="h-48 w-full object-cover sm:h-64">

        <div class="p-6">
            <span class="inline-block rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">
                {{ $artikel->kategori_artikel?->nama ?? 'Artikel' }}
            </span>
            <h1 class="mt-3 text-xl font-bold text-gray-800 sm:text-2xl">{{ $artikel->judul }}</h1>
            <p class="mt-1 text-sm text-gray-400">
                Admin &middot; {{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
            </p>

            <hr class="my-5 border-gray-100">

            <div class="prose prose-sm max-w-none text-gray-700">{!! $artikel->deskripsi !!}</div>
        </div>
    </article>
@endsection
