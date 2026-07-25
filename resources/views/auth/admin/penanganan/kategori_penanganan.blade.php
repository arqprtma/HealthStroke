@extends('layouts.admin')

@section('title', $title ?? 'Tambah Kategori Penanganan | StrokeCare')
@section('page-title', 'Tambah Kategori Penanganan')

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.penanganan.tambah') }}" class="text-sm font-semibold text-accent hover:underline">&larr; Kembali</a>
    </div>

    <form method="post" action="{{ route('admin.penanganan.kategori.store') }}" class="mx-auto max-w-xl">
        @csrf
        <div class="rounded-2xl bg-white p-6 shadow-sm">
            <label for="penanganan" class="mb-1.5 block text-sm font-semibold text-gray-700">Nama Kategori Penanganan</label>
            <input type="text" name="penanganan" id="penanganan" placeholder="Masukkan kategori penanganan" required
                   class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
            @error('penanganan')
                <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn-primary mx-auto mt-6 !w-auto px-10">Tambah</button>
    </form>
@endsection
