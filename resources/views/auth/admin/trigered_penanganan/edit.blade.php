@extends('layouts.admin')

@section('title', $title ?? 'Edit Trigger Penanganan | StrokeCare')
@section('page-title', 'Edit Trigger Penanganan')

@push('styles')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.trigered.penanganan') }}" class="text-sm font-semibold text-accent hover:underline">&larr; Kembali</a>
    </div>

    <form method="post" action="{{ route('admin.trigered.penanganan.update', $trigerPenanganan->id_trigered_penanganan) }}" class="mx-auto max-w-2xl">
        @csrf
        @method('PUT')
        <div class="space-y-4 rounded-2xl bg-white p-6 shadow-sm">
            @php $inputClass = 'mt-1 w-full rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30'; @endphp

            <div>
                <label for="penanganan" class="block text-sm font-semibold text-gray-700">Pilih Penanganan</label>
                <select id="penanganan" name="penanganan" class="select2 {{ $inputClass }}">
                    <option value="">-- Pilih --</option>
                    @foreach ($penanganan as $data)
                        <option value="{{ $data->id_penanganan }}" {{ $data->id_penanganan == $trigerPenanganan->id_penanganan ? 'selected' : '' }}>{!! $data->deskripsi !!}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-700">Judul</label>
                <input type="text" id="judul" name="judul" value="{{ $trigerPenanganan->judul }}" class="{{ $inputClass }}" placeholder="Masukkan judul">
            </div>

            <div>
                <label for="level" class="block text-sm font-semibold text-gray-700">Level</label>
                <input type="number" id="level" name="level" min="0" value="{{ $trigerPenanganan->level }}" class="{{ $inputClass }}" placeholder="0">
            </div>

            <div>
                <label for="konten" class="block text-sm font-semibold text-gray-700">Konten</label>
                <textarea id="konten" name="konten" rows="4" class="ckeditor5 {{ $inputClass }}">{{ $trigerPenanganan->konten }}</textarea>
            </div>

            <div>
                <label for="kemajuan" class="block text-sm font-semibold text-gray-700">Kemajuan</label>
                <input type="text" id="kemajuan" name="kemajuan" value="{{ $trigerPenanganan->kemajuan }}" class="{{ $inputClass }}" placeholder="Masukkan kalimat kemajuan">
            </div>

            <div>
                <label for="kemunduran" class="block text-sm font-semibold text-gray-700">Kemunduran</label>
                <input type="text" id="kemunduran" name="kemunduran" value="{{ $trigerPenanganan->kemunduran }}" class="{{ $inputClass }}" placeholder="Masukkan kalimat kemunduran">
            </div>
        </div>

        <button type="submit" class="btn-primary mx-auto mt-6 !w-auto px-10">Simpan</button>
    </form>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@include('ckeditor.ckeditor5')
<script>
    CKEDITOR5('.ckeditor5');
    $(function () { $('.select2').select2(); });
</script>
@endpush
