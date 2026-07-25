@extends('layouts.guest')

@section('heading', 'Lupa Password')

@section('content')
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <x-input name="email" label="Email" type="email" placeholder="Masukkan email terdaftar" :value="old('email')" required />
        <p class="mb-4 text-xs text-gray-500">
            Tautan atur ulang password akan dikirim ke email yang Anda gunakan saat mendaftar.
        </p>
        <x-button>Kirim Tautan</x-button>
    </form>

    <p class="mt-6 text-center text-sm text-gray-500">
        Ingat password Anda?
        <a href="{{ route('login') }}" class="font-semibold text-accent hover:underline">Masuk</a>
    </p>
@endsection
