<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'StrokeCare' }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    {{-- Font Mulish --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body class="min-h-screen bg-ghost font-sans text-gray-800 antialiased">
    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-10 sm:px-6">
        <div class="w-full max-w-md">
            {{-- Brand --}}
            <div class="mb-6 flex flex-col items-center text-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/Logo-apps.png') }}" alt="StrokeCare" class="mb-3 h-16 w-auto">
                </a>
                <h1 class="text-xl font-bold text-gray-800 sm:text-2xl">@yield('heading')</h1>
                <span class="mt-2 h-1 w-14 rounded-full bg-primary"></span>
            </div>

            {{-- Kartu konten --}}
            <div class="rounded-2xl bg-white p-6 shadow-lg shadow-gray-200/60 sm:p-8">
                @yield('content')
            </div>

            <p class="mt-6 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} StrokeCare &middot; Universitas Esa Unggul
            </p>
        </div>
    </div>

    {{-- Flash message terpusat --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))
            Swal.fire({ icon: 'success', title: 'Berhasil', text: @json(session('success')), confirmButtonColor: '#15ADA7' });
        @endif
        @if (session('status'))
            Swal.fire({ icon: 'success', title: 'Berhasil', text: @json(session('status')), confirmButtonColor: '#15ADA7' });
        @endif
        @if (session('error'))
            Swal.fire({ icon: 'error', title: 'Oops...', text: @json(session('error')), confirmButtonColor: '#15ADA7' });
        @endif
        @if ($errors->any() && ! session('error'))
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Terjadi kesalahan. Mohon periksa kembali isian Anda.', confirmButtonColor: '#15ADA7' });
        @endif
    </script>
    @stack('scripts')
</body>

</html>
