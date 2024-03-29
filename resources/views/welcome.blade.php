<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap');
    </style>

    <title>Strokecare | Melangkah Bersama ke Arah Kesembuhan</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />


    <script src="https://cdn.tailwindcss.com"></script>

    {{-- font mulish --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: 'mulish', sans-serif;
        }
        .loader {
            margin: 150px auto;
            border: 5px solid #EAF0F6;
            border-radius: 50%;
            border-top: 5px solid #15ADA7;
            width: 30px;
            height: 30px;
            animation: spinner 4s linear infinite;
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body class="bg-[#F8F8FF] font-sans">
    <img src="images/Logo-apps.png" alt="" class="w-[230] h-[230] mx-auto relative top-[150px]">
    <div class="loader"></div>
    <div class="absolute bottom-[25px] left-[50%] translate-x-[-50%] text-center opacity-50">
        <p class="text-xs font-bold mb-[-10px]">Powered By : </p>
        {{-- <p class="text-xs">Agung Dwi Sahputra</p>
        <p class="text-xs">Ariq Pratama</p> --}}
        <img src="{{ asset('images/esaunggul.png') }}" alt="Universitas Esa Unggul" width="150px">
    </div>
</body>

<script>
    let random = Math.floor(Math.random() * 2000) + 1500;
    window.setTimeout(() => {
        window.location.assign("/login")
    }, random);
</script>

</html>
