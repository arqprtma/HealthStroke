@extends('layouts.admin')

@section('title', $title ?? 'Edit Aktivitas | StrokeCare')
@section('page-title', 'Edit Aktivitas')

@push('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
@endpush

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.aktivitas') }}" class="text-sm font-semibold text-accent hover:underline">&larr; Kembali</a>
    </div>

    <form method="post" action="{{ route('admin.aktivitas.update', $aktivitas->id_aktivitas) }}" class="mx-auto max-w-2xl">
        @csrf
        @method('PUT')
        <div class="space-y-4 rounded-2xl bg-white p-6 shadow-sm">
            @php $selectClass = 'w-full appearance-none rounded-xl border border-gray-200 bg-white px-4 py-2.5 pr-9 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30'; @endphp

            <div>
                <label for="aktivitas" class="mb-1.5 block text-sm font-semibold text-gray-700">Kategori Aktivitas</label>
                <div class="relative">
                    <select name="aktivitas" id="aktivitas" class="{{ $selectClass }}">
                        @foreach ($kat_aktivitas as $data)
                            <option value="{{ $data->id_kat_aktivitas }}" {{ $data->id_kat_aktivitas == $aktivitas->id_kat_aktivitas ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 fill-current text-gray-400" viewBox="0 0 20 20"><path d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z"/></svg>
                </div>
            </div>

            <div>
                <label for="pemicu" class="mb-1.5 block text-sm font-semibold text-gray-700">Pemicu</label>
                <div class="relative">
                    <select name="pemicu" id="pemicu" class="{{ $selectClass }}">
                        @foreach ($pemicu as $data)
                            <option value="{{ $data->id_pemicu }}" {{ $data->id_pemicu == $aktivitas->id_pemicu ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 fill-current text-gray-400" viewBox="0 0 20 20"><path d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z"/></svg>
                </div>
            </div>

            <div>
                <label for="komplikasi" class="mb-1.5 block text-sm font-semibold text-gray-700">Komplikasi</label>
                <div class="relative">
                    <select name="komplikasi" id="komplikasi" class="{{ $selectClass }}">
                        @foreach ($komplikasi as $data)
                            <option value="{{ $data->id_komplikasi }}" {{ $data->id_komplikasi == $aktivitas->id_komplikasi ? 'selected' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 fill-current text-gray-400" viewBox="0 0 20 20"><path d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z"/></svg>
                </div>
            </div>

            <div>
                <label for="link_video" class="mb-1.5 block text-sm font-semibold text-gray-700">Kode Video YouTube (opsional)</label>
                <input type="text" name="link_video" id="link_video" value="{{ $aktivitas->video }}" placeholder="iCwBadO1W0Q"
                       class="w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
            </div>

            <div>
                <label for="deskripsi" class="mb-1.5 block text-sm font-semibold text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="ckeditor5">{{ $aktivitas->deskripsi }}</textarea>
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
        CKEDITOR5('.ckeditor5');
    </script>
@endpush
