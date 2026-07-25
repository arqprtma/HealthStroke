@extends('layouts.app')

@section('topbar', 'Edit Pasien')
@section('back', route('dashboard'))

@section('content')
    <div class="mx-auto max-w-md">
        <div class="mb-5 flex justify-center">
            <div class="flex h-24 w-24 items-center justify-center overflow-hidden rounded-full bg-white shadow-md ring-4 ring-primary/10">
                <img src="{{ asset($pasien->gender == 'P' ? 'images/pasien/woman.png' : 'images/pasien/man.png') }}"
                     alt="Pasien" class="h-20 w-20 object-contain">
            </div>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-lg shadow-gray-200/60">
            <form action="{{ route('setting-pasien', ['id' => $pasien->id_pasien]) }}" method="POST">
                @csrf
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">

                <x-input name="nama" label="Nama Lengkap" placeholder="Masukkan nama lengkap"
                         :value="old('nama', $pasien->nama)" required />

                <div class="grid grid-cols-2 gap-3">
                    <x-select name="gender" label="Jenis Kelamin"
                              :options="['L' => 'Laki-Laki', 'P' => 'Perempuan']"
                              :selected="old('gender', $pasien->gender)" />
                    <x-input name="umur" label="Umur" type="number" placeholder="Umur"
                             :value="old('umur', $pasien->umur)" required />
                </div>

                <x-checkbox-group name="pemicu" label="Pemicu" hint="Pilih maksimal 2 pemicu"
                                  :options="$pemicu" value-key="id_pemicu" label-key="nama"
                                  :checked="old('pemicu', $pasien->pemicu)" />

                <x-checkbox-group name="komplikasi" label="Komplikasi" hint="Pilih minimal 1 komplikasi"
                                  :options="$komplikasi" value-key="id_komplikasi" label-key="nama"
                                  :checked="old('komplikasi', $pasien->komplikasi)" />

                <x-button class="mt-2">Simpan Perubahan</x-button>
            </form>
        </div>
    </div>
@endsection
