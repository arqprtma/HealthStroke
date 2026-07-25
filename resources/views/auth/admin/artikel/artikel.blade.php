@extends('layouts.admin')

@section('title', $title ?? 'Tambah Artikel | StrokeCare')
@section('page-title', 'Tambah Artikel')

@push('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
@endpush

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.artikel') }}" class="text-sm font-semibold text-accent hover:underline">&larr; Kembali</a>
    </div>

    <form method="post" action="{{ route('admin.artikel.store') }}" enctype="multipart/form-data" class="mx-auto max-w-2xl">
        @csrf
        <div class="space-y-4 rounded-2xl bg-white p-6 shadow-sm">
            <div>
                <label for="judul" class="mb-1.5 block text-sm font-semibold text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul" placeholder="Masukkan judul"
                       class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
            </div>

            <div>
                <label for="fileInput" class="mb-1.5 block text-sm font-semibold text-gray-700">Cover</label>
                <input type="file" id="fileInput" name="fileInput"
                       class="block w-full rounded-xl border border-gray-200 bg-white text-sm text-gray-500 shadow-sm file:mr-4 file:border-0 file:bg-primary/10 file:px-4 file:py-2.5 file:font-semibold file:text-primary hover:file:bg-primary/20">
            </div>

            <div>
                <label for="kat_artikel" class="mb-1.5 block text-sm font-semibold text-gray-700">Kategori</label>
                <div class="relative">
                    <select name="kat_artikel" id="kat_artikel"
                            class="w-full appearance-none rounded-xl border border-gray-200 bg-white px-4 py-2.5 pr-9 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach ($kat_artikel as $data)
                            <option value="{{ $data->id_kat_artikel }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 fill-current text-gray-400" viewBox="0 0 20 20"><path d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z"/></svg>
                </div>
            </div>

            <div>
                <label for="deskripsi" class="mb-1.5 block text-sm font-semibold text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi"></textarea>
                @error('deskripsi')
                    <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn-primary mx-auto mt-6 !w-auto px-10">Simpan</button>
    </form>
@endsection

@push('scripts')
    @include('ckeditor.ckeditor5')
    <script>
        CKEDITOR5('#deskripsi');
    </script>
@endpush
