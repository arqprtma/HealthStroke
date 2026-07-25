<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $title ?? 'Admin | StrokeCare')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    {{-- Font Mulish --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
    @stack('styles')
</head>

<body class="min-h-screen bg-ghost font-sans text-gray-800 antialiased">
    @php
        $adminNav = [
            ['route' => 'admin.index', 'label' => 'Dashboard', 'active' => request()->routeIs('admin.index'),
             'icon' => 'M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75'],
            ['route' => 'admin.pemicu', 'label' => 'Pemicu', 'active' => request()->routeIs('admin.pemicu*'),
             'icon' => 'M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z'],
            ['route' => 'admin.komplikasi', 'label' => 'Komplikasi', 'active' => request()->routeIs('admin.komplikasi*'),
             'icon' => 'M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z'],
            ['route' => 'admin.aktivitas', 'label' => 'Aktivitas', 'active' => request()->routeIs('admin.aktivitas*'),
             'icon' => 'M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z'],
            ['route' => 'admin.penanganan', 'label' => 'Penanganan', 'active' => request()->routeIs('admin.penanganan*'),
             'icon' => 'M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z'],
            ['route' => 'admin.artikel', 'label' => 'Artikel', 'active' => request()->routeIs('admin.artikel*'),
             'icon' => 'M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z'],
            ['route' => 'admin.trigered.aktivitas', 'label' => 'Trigger Aktivitas', 'active' => request()->routeIs('admin.trigered.aktivitas*'),
             'icon' => 'M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z'],
            ['route' => 'admin.trigered.penanganan', 'label' => 'Trigger Penanganan', 'active' => request()->routeIs('admin.trigered.penanganan*'),
             'icon' => 'M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0'],
        ];
    @endphp

    {{-- Backdrop (mobile) --}}
    <div id="admin-backdrop" class="fixed inset-0 z-30 hidden bg-black/40 lg:hidden"></div>

    {{-- Sidebar --}}
    <aside id="admin-sidebar"
           class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col border-r border-gray-100 bg-white transition-transform duration-200 lg:translate-x-0">
        <div class="flex h-16 items-center gap-2 border-b border-gray-100 px-5">
            <img src="{{ asset('images/Logo-apps.png') }}" alt="StrokeCare" class="h-8 w-auto">
            <span class="font-bold text-gray-800">StrokeCare <span class="text-primary">Admin</span></span>
        </div>
        <nav class="flex-1 space-y-1 overflow-y-auto px-3 py-4">
            @foreach ($adminNav as $item)
                <a href="{{ route($item['route']) }}"
                   class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold transition {{ $item['active'] ? 'bg-primary text-white shadow-sm' : 'text-gray-600 hover:bg-primary/5 hover:text-primary' }}">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                    </svg>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="border-t border-gray-100 p-3">
            <a href="{{ route('logout') }}"
               class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold text-red-500 transition hover:bg-red-50">
                <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
                Keluar
            </a>
        </div>
    </aside>

    {{-- Konten --}}
    <div class="lg:ml-64">
        {{-- Top bar --}}
        <header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-gray-100 bg-white/95 px-4 backdrop-blur sm:px-6">
            <div class="flex items-center gap-3">
                <button id="admin-hamburger" aria-label="Menu"
                        class="flex h-9 w-9 items-center justify-center rounded-lg text-gray-600 transition hover:bg-gray-100 lg:hidden">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <h1 class="text-lg font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <span class="hidden sm:inline">Hi, <span class="font-semibold text-gray-700">{{ auth()->user()->nama }}</span></span>
                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-primary/10">
                    <img src="{{ asset('images/User.png') }}" alt="" class="h-5 w-5">
                </span>
            </div>
        </header>

        <main class="px-4 py-6 sm:px-6">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Drawer sidebar (mobile)
        (function () {
            const sb = document.getElementById('admin-sidebar');
            const bd = document.getElementById('admin-backdrop');
            const open = () => { sb.classList.remove('-translate-x-full'); bd.classList.remove('hidden'); };
            const close = () => { sb.classList.add('-translate-x-full'); bd.classList.add('hidden'); };
            document.getElementById('admin-hamburger')?.addEventListener('click', open);
            bd?.addEventListener('click', close);
        })();

        // Konfirmasi edit/hapus (dipakai halaman CRUD)
        function ConfirmUpdate(id) {
            Swal.fire({
                title: 'Simpan perubahan?', icon: 'question', showCancelButton: true,
                confirmButtonColor: '#15ADA7', cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Ya, simpan', cancelButtonText: 'Batal'
            }).then((r) => { if (r.isConfirmed) document.getElementById('updateForm' + id).submit(); });
        }
        function ConfirmDelete(id) {
            Swal.fire({
                title: 'Yakin hapus data ini?', text: 'Data yang dihapus tidak dapat dikembalikan.', icon: 'warning',
                showCancelButton: true, confirmButtonColor: '#d33', cancelButtonColor: '#94a3b8',
                confirmButtonText: 'Ya, hapus', cancelButtonText: 'Batal'
            }).then((r) => { if (r.isConfirmed) document.getElementById('deleteForm' + id).submit(); });
        }

        // Flash message terpusat
        @if (session('success'))
            Swal.fire({ icon: 'success', title: 'Berhasil', text: @json(session('success')), confirmButtonColor: '#15ADA7' });
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
