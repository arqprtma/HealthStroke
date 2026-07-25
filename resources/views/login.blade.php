@extends('layouts.guest')

@section('heading', 'Masuk')

@section('content')
    <form action="{{ route('login.proses') }}" method="POST">
        @csrf
        <x-input name="username" label="Username" placeholder="Masukkan username" :value="old('username')" required />
        <x-input name="password" label="Password" type="password" placeholder="Masukkan password" required />
        <x-button class="mt-2">Masuk</x-button>
    </form>

    <div class="mt-6 space-y-2 text-center text-sm text-gray-500">
        <p>Belum punya akun?
            <a href="{{ route('register') }}" class="font-semibold text-accent hover:underline">Daftar</a>
        </p>
        <p>
            <a href="{{ route('forgot-password') }}" class="font-semibold text-accent hover:underline">Lupa password?</a>
        </p>
    </div>
@endsection
