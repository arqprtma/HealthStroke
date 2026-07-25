@extends('layouts.app')

@section('topbar', 'Profil')
@section('back', route('dashboard'))

@section('content')
    <div class="mx-auto max-w-md">
        {{-- Avatar --}}
        <div class="mb-5 flex flex-col items-center">
            <div class="flex h-24 w-24 items-center justify-center overflow-hidden rounded-full bg-white shadow-md ring-4 ring-primary/10">
                <img src="{{ asset(auth()->user()->gender == 'P' ? 'images/pasien/woman.png' : 'images/pasien/man.png') }}"
                     alt="Foto profil" class="h-20 w-20 object-contain">
            </div>
            <h2 class="mt-3 text-lg font-bold text-gray-800">{{ auth()->user()->nama }}</h2>
            <p class="text-sm text-gray-400">{{ '@' . auth()->user()->username }}</p>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-lg shadow-gray-200/60">
            <form action="{{ route('setting-profile', ['id' => auth()->user()->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                <x-input name="nama" label="Nama Lengkap" placeholder="Masukkan nama lengkap"
                         :value="old('nama', auth()->user()->nama)" required />

                <div class="grid grid-cols-2 gap-3">
                    <x-select name="gender" label="Jenis Kelamin"
                              :options="['L' => 'Laki-Laki', 'P' => 'Perempuan']"
                              :selected="old('gender', auth()->user()->gender)" />
                    <x-input name="umur" label="Umur" type="number" placeholder="Umur"
                             :value="old('umur', auth()->user()->umur)" required />
                </div>

                <x-input name="email" label="Email" type="email" :value="auth()->user()->email"
                         disabled class="cursor-not-allowed bg-gray-50 text-gray-400" />
                <x-input name="username" label="Username" :value="auth()->user()->username"
                         disabled class="cursor-not-allowed bg-gray-50 text-gray-400" />

                <x-input name="password" label="Ubah Password" type="password" placeholder="Password baru" />
                <p class="-mt-3 mb-4 text-xs text-gray-400">*Kosongkan bila tidak ingin mengubah password.</p>

                <x-button class="mt-2">Simpan Perubahan</x-button>
            </form>
        </div>
    </div>
@endsection
