<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $artikel->judul.' | '.$title }}</title>
</head>

<body class="bg-[#F8F8FF]">
    <div class="container mx-auto">
        <div class="back w-[50px] relative top-[50px]  h-[50px] left-[40px] lg:left-[120px]">
            <a href={{ route('dashboard') }}>
                <img src="/images/arrow-back.png" alt="Arrow">
            </a>
        </div>
        <div class="content relative top-[50px] lg:top-[50px] w-[80%] mx-auto">
            <h1 class="font-bold mt-5 mb-5 text-[14px] lg:text-[24px]">{{ $artikel->judul }}</h1>
            <h2 class="mt-5 mb-5">{{ $artikel->kategori_artikel->nama }}</h2>
            <img src="images/artikel1.png" alt="" class="w-[100%] object-fit mx-auto">
            <h2 class="mt-5 mb-5 text-sm lg:text-lg">Deskripsi : </h2>
            <p class=" mx-auto text-sm lg:text-lg">{!! $artikel->deskripsi !!}</p>



        </div>

    </div>
</body>

</html>
