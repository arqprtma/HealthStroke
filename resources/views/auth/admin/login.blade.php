@extends('layouts.guest')

@section('heading', 'Masuk Admin')

@section('content')
    <form action="{{ route('login.proses') }}" method="POST">
        @csrf
        <x-input name="username" label="Username" placeholder="Masukkan username" :value="old('username')" required />
        <x-input name="password" label="Password" type="password" placeholder="Masukkan password" required />
        <x-button class="mt-2">Masuk</x-button>
    </form>

    <div class="mt-6 text-center text-sm text-gray-500">
        <a href="{{ route('forgot-password') }}" class="font-semibold text-accent hover:underline">Lupa password?</a>
    </div>
@endsection
