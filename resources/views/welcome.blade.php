<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap');
    </style>

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>



</head>

<body class="bg-[#BEEBC226] font-sans">
    {{-- navbar --}}
    <div class="w-[100%] h-[70px] flex justify-between border-b-2 ">
        <div class="pt-6 lg:ps-20 ps-10">
            <h1>Logo</h1>
        </div>

        <div class="lg:pe-20 pe-5 pt-6">
            <a href="{{ route('register') }}">
                <button class="pe-10">Sign Up</button>
            </a>
            <a href="{{ route('login') }}">
                <button class="pe-10">Sign In</button>
            </a>

        </div>
    </div>
    {{-- end navbar --}}
    {{-- banner --}}
    <div class="banner w-100% h-[500px] flex justify-center items-center"
        style="background-image:url(/images/Banner.png)">
        <div
            class="card w-[80%] h-[400px] lg:h-[250px] bg-white rounded-lg flex flex-wrap justify-center gap-10 pt-10 text-center">
            <div class="cards-left p-5">
                <img src="/images/education.png" alt="healt-eat" class="w-[100px] h-[100px] mx-auto">
                <h1 class="text-bold">Knowledge</h1>
            </div>
            <div class="cards-center p-5">
                <img src="/images/headache.png" alt="healt-eat" class="w-[100px] h-[100px] mx-auto">
                <h1>Complication</h1>
            </div>
            <div class="cards-right p-5">
                <img src="/images/patient.png" alt="healt-eat" class="w-[100px] h-[100px] mx-auto">
                <h1>Activity and Treatment</h1>
            </div>
            <div class="cards-right p-5">
                <img src="/images/healthcare.png" alt="healt-eat" class="w-[100px] h-[100px] mx-auto">
                <h1>Handling</h1>
            </div>

        </div>

    </div>
    {{-- end banner --}}

</body>

</html>
