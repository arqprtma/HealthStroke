@extends('layouts.app')

@section('title', 'Artikel | StrokeCare')
@section('topbar', 'Artikel')
@section('back', route('dashboard'))

@section('content')
    <h1 class="mb-4 text-lg font-bold text-gray-800">Artikel untuk kamu</h1>

    {{-- Tab kategori --}}
    <div class="mb-4 flex gap-2 overflow-x-auto pb-1">
        <button type="button" class="click-pemahaman shrink-0 rounded-full px-4 py-1.5 text-sm font-semibold">
            Pemahaman
            <span class="border-pemahaman mt-1 block h-0.5 rounded-full bg-primary"></span>
        </button>
        <button type="button" class="click-pertolonganpertama shrink-0 rounded-full px-4 py-1.5 text-sm font-semibold">
            Pertolongan Pertama
            <span class="border-pertolongan mt-1 block h-0.5 rounded-full bg-primary"></span>
        </button>
        <button type="button" class="click-tanda-gejala shrink-0 rounded-full px-4 py-1.5 text-sm font-semibold">
            Tanda dan Gejala
            <span class="border-gejala mt-1 block h-0.5 rounded-full bg-primary"></span>
        </button>
    </div>

    {{-- Daftar artikel --}}
    <div class="space-y-3">
        @forelse ($list_artikel as $artikel)
            @php
                if ($artikel->kategori == '1') {
                    $kategori = 'pemahaman';
                } elseif ($artikel->kategori == '2') {
                    $kategori = 'pertolongan';
                } elseif ($artikel->kategori == '3') {
                    $kategori = 'gejala';
                } else {
                    $kategori = 'pemahaman';
                }
                $tanggal = date('d M Y', strtotime($artikel->created_at));
            @endphp

            <a href="{{ route('detail-artikel', ['id' => $artikel->id]) }}"
               class="{{ $kategori }} items-center gap-4 rounded-2xl bg-white p-3 shadow-sm transition hover:shadow-md" style="display: flex">
                <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-xl bg-primary/5">
                    <img src="{{ asset('images/Logo-apps.png') }}" alt="" class="h-14 w-14 object-contain">
                </div>
                <div class="min-w-0 flex-1">
                    <h2 class="truncate font-bold text-primary">{{ $artikel->judul }}</h2>
                    <div class="mt-1 line-clamp-2 text-sm text-gray-500">{!! $artikel->deskripsi !!}</div>
                    <p class="mt-1 text-xs text-gray-400">Admin &middot; {{ $tanggal }}</p>
                </div>
            </a>
        @empty
            <p class="rounded-2xl bg-white p-6 text-center text-sm text-gray-400 shadow-sm">Belum ada artikel.</p>
        @endforelse
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = {
            pemahaman: document.querySelector('.click-pemahaman'),
            pertolongan: document.querySelector('.click-pertolonganpertama'),
            gejala: document.querySelector('.click-tanda-gejala'),
        };
        const groups = {
            pemahaman: document.querySelectorAll('.pemahaman'),
            pertolongan: document.querySelectorAll('.pertolongan'),
            gejala: document.querySelectorAll('.gejala'),
        };
        const borders = {
            pemahaman: document.querySelector('.border-pemahaman'),
            pertolongan: document.querySelector('.border-pertolongan'),
            gejala: document.querySelector('.border-gejala'),
        };

        function activate(key) {
            Object.keys(groups).forEach(function (k) {
                groups[k].forEach(function (item) { item.style.display = (k === key) ? 'flex' : 'none'; });
                if (borders[k]) borders[k].style.visibility = (k === key) ? 'visible' : 'hidden';
                if (tabs[k]) tabs[k].classList.toggle('text-primary', k === key);
                if (tabs[k]) tabs[k].classList.toggle('text-gray-400', k !== key);
            });
        }

        tabs.pemahaman.addEventListener('click', function () { activate('pemahaman'); });
        tabs.pertolongan.addEventListener('click', function () { activate('pertolongan'); });
        tabs.gejala.addEventListener('click', function () { activate('gejala'); });

        activate('pemahaman');
    });
</script>
@endpush
