<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StrokeCare | Melangkah Bersama ke Arah Kesembuhan</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    {{-- Font Mulish --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body class="flex min-h-screen flex-col items-center justify-center bg-ghost font-sans">
    <div class="flex flex-1 flex-col items-center justify-center px-6">
        <img src="{{ asset('images/Logo-apps.png') }}" alt="StrokeCare" class="w-40 sm:w-52">
        <div class="mt-8 h-9 w-9 animate-spin rounded-full border-4 border-gray-200 border-t-primary"></div>
    </div>

    <div class="mb-8 text-center opacity-60">
        <p class="text-[10px] font-bold uppercase tracking-wide">Powered By</p>
        <img src="{{ asset('images/esaunggul.png') }}" alt="Universitas Esa Unggul" class="mx-auto mt-1 w-32">
    </div>

    <script>
        const delay = Math.floor(Math.random() * 2000) + 1500;
        window.setTimeout(() => window.location.assign("/login"), delay);
    </script>
</body>

</html>
