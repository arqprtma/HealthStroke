@extends('layouts.guest')

@section('heading', 'Daftar Akun')

@section('content')
    <form action="{{ route('regiter.proses') }}" method="POST">
        @csrf
        <x-input name="nama" label="Nama Lengkap" placeholder="Masukkan nama lengkap" :value="old('nama')" required />
        <x-input name="email" label="Email" type="email" placeholder="Masukkan email" :value="old('email')" required />

        <div class="grid grid-cols-2 gap-3">
            <x-select name="gender" label="Jenis Kelamin" placeholder="Pilih"
                      :options="['L' => 'Laki-Laki', 'P' => 'Perempuan']" :selected="old('gender')" />
            <x-input name="umur" label="Umur" type="number" placeholder="Umur" :value="old('umur')" required />
        </div>

        <x-input name="username" label="Username" placeholder="Masukkan username" :value="old('username')" required />
        <x-input name="password" label="Password" type="password" placeholder="Minimal 8 karakter" required />
        <x-button class="mt-2">Daftar</x-button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-500">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="font-semibold text-accent hover:underline">Masuk</a>
    </p>
@endsection
