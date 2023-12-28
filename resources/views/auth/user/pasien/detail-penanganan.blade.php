<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $title }}</title>
</head>

<body class="bg-[#F8F8FF]">
    {{-- {{ dd($penanganan) }} --}}
    <div class="container mx-auto">
        <div class="back w-[50px] relative top-[50px]  h-[50px] left-[40px] lg:left-[120px]">
            <a href={{ '/dashboard' }}>
                <img src="../images/arrow-back.png" alt="">
            </a>
        </div>
        <div class="content relative top-[50px] lg:top-[50px] w-[80%] mx-auto">
            <h1 class="font-bold mt-5 mb-5 text-[14px] lg:text-[24px]">Aktivitas Kehidupan Sehari - Hari</h1>
            <img src="images/aktivitas1.jpg" alt="" class="w-[100%] object-fit mx-auto">
            <h2 class="mt-5 mb-5 text-sm lg:text-lg">Deskripsi : </h2>
            <p class=" mx-auto text-sm lg:text-lg">{{ $penanganan->deskripsi }}</p>
            <h2 class="mt-5 mb-5">Video Aktivitas Treatment : </h2>
            <iframe class="w-[100%] h-[315px] mt-5 mb-10" {{ $code = 'vjVkXlxsO8Q' }}
                src="https://www.youtube.com/embed/{{ $code }}" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>

            <h3 class="text-[14px] font-bold lg:text-lg">Aktivitas Lainnya</h3>
            @for ($i = 1; $i < 6; $i++)
                <div class="container w-[100%] mx-auto mt-2  rounded-sm bg-[#FFFF] rounded-lg p-5">
                    <div class="deskripsi mx-auto">
                        <h1 class="text-sm lg:text-lg">{{ $i }}. Latihan Kekuatan kaki dengan mengangkat kaki
                            saat duduk
                            dikursi. Lorem
                            ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, neque?
                        </h1>
                    </div>
                </div>
            @endfor

            <div class="text-center mt-7 pb-10">
                <button
                    class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-lg text-white">Sudah
                    dilakukan</button>
            </div>

        </div>

    </div>
</body>

</html>
