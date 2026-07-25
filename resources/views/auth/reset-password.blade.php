@extends('layouts.guest')

@section('heading', 'Reset Password')

@section('content')
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ request()->token }}">
        <input type="hidden" name="email" value="{{ request()->email }}">

        <x-input name="password" label="Password Baru" type="password" placeholder="Minimal 8 karakter" required />
        <x-input name="password_confirmation" label="Konfirmasi Password" type="password" placeholder="Ulangi password baru" required />
        <x-button class="mt-2">Simpan Password</x-button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-500">
        <a href="{{ route('login') }}" class="font-semibold text-accent hover:underline">Kembali ke halaman Masuk</a>
    </p>
@endsection
