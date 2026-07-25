<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $title ?? 'StrokeCare')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    {{-- Font Mulish --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body class="min-h-screen bg-ghost font-sans text-gray-800 antialiased">
    {{-- Top bar --}}
    <header class="sticky top-0 z-30 border-b border-gray-100 bg-white/95 backdrop-blur">
        <div class="mx-auto flex h-14 max-w-screen-md items-center justify-between px-4">
            <div class="flex items-center gap-2">
                @hasSection('back')
                    <a href="@yield('back')" aria-label="Kembali"
                       class="-ml-2 flex h-9 w-9 items-center justify-center rounded-full text-gray-600 transition hover:bg-gray-100">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </a>
                @else
                    <img src="{{ asset('images/Logo-apps.png') }}" alt="StrokeCare" class="h-8 w-auto">
                @endif
                <span class="font-bold text-gray-800">@yield('topbar', 'StrokeCare')</span>
            </div>

            <a href="{{ route('logout') }}" aria-label="Keluar"
               class="flex h-9 w-9 items-center justify-center rounded-full text-gray-500 transition hover:bg-red-50 hover:text-red-500">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
            </a>
        </div>
    </header>

    {{-- Konten --}}
    <main class="mx-auto max-w-screen-md px-4 pb-28 pt-5">
        @yield('content')
    </main>

    {{-- Bottom navigation (mobile-first) --}}
    @php
        $navItems = [
            ['route' => 'dashboard', 'label' => 'Beranda', 'active' => request()->routeIs('dashboard'),
             'icon' => 'M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75'],
            ['route' => 'artikel', 'label' => 'Artikel', 'active' => request()->routeIs('artikel') || request()->routeIs('detail-artikel'),
             'icon' => 'M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z'],
            ['route' => 'profile', 'label' => 'Profil', 'active' => request()->routeIs('profile'),
             'icon' => 'M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z'],
        ];
    @endphp
    <nav class="fixed inset-x-0 bottom-0 z-30 px-4 pb-4">
        <div class="mx-auto flex max-w-sm items-center justify-around rounded-2xl border border-white bg-white/90 py-2 shadow-[0_4px_30px_rgba(0,0,0,0.1)] backdrop-blur">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                   class="flex flex-1 flex-col items-center gap-1 rounded-xl py-1 text-[11px] font-semibold transition {{ $item['active'] ? 'text-primary' : 'text-gray-400 hover:text-gray-600' }}">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="{{ $item['active'] ? '2.2' : '1.8' }}" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                    </svg>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </nav>

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
