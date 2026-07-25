@extends('layouts.admin')

@section('title', $title ?? 'Tambah Kategori Aktivitas | StrokeCare')
@section('page-title', 'Tambah Kategori Aktivitas')

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.aktivitas.tambah') }}" class="text-sm font-semibold text-accent hover:underline">&larr; Kembali</a>
    </div>

    <form method="post" action="{{ route('admin.aktivitas.kategori.store') }}" class="mx-auto max-w-xl">
        @csrf
        <div class="rounded-2xl bg-white p-6 shadow-sm">
            <label for="aktivitas" class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Kategori Aktivitas</label>
            <input type="text" name="aktivitas" id="aktivitas" placeholder="Masukkan kategori aktivitas" required
                   class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
            @error('aktivitas')
                <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn-primary mx-auto mt-6 !w-auto px-10">Tambah</button>
    </form>
@endsection
