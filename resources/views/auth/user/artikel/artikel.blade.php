<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="./recources/css/app.css">
    <title>Artikel - Health Stroke</title>
</head>

<body class="bg-[#F8F8FF]">
    <div class="container mx-auto">
        <div class="back w-[50px] relative top-[50px]  h-[50px] left-[40px] lg:left-[120px]">
            <a href={{ 'dashboard' }}>
                <img src="images/arrow-back.png" alt="">
            </a>
        </div>
        <div class="content relative top-[50px] lg:top-[50px] w-[80%] mx-auto">
            <h1 class="font-bold mt-5 mb-5 text-[14px] lg:text-[24px]">Artikel untuk kamu</h1>
            <div class="judul flex justify-evenly pt-7 w-[80%] mx-auto">
                <a href="#" class="click-pemahaman">
                    <h1 class="text-center">Pemahaman</h1>
                    <hr class="border-2 border-solid border-[#15ADA7] w-[100px] lg:w-[120px]">
                </a>
                <a href="#" class="click-pertolonganpertama">
                    <h1>Pertolongan Pertama</h1>
                    {{-- <hr class="border-2 border-solid border-[#15ADA7]"> --}}
                </a>
                <a href="#" class="click-tanda-gejala">
                    <h1>Tanda dan Gejala</h1>
                    {{-- <hr class="border-2 border-solid border-[#15ADA7]"> --}}
                </a>
            </div>
            <div class="berita lg:w-[100%] mx-auto px-10 mt-3">
                <div class="judul flex justify-between">

                    <a href="" class="text-sm lg:text-lg">Lihat Lainnya</a>
                </div>
                @for ($i = 0; $i < 5; $i++)
                    <div class="gejala w-[100%] lg:w-[100%] lg:h-[200px] bg-[#FFFF] rounded-lg h-[150px] flex mt-3 justify-evenly shadow-lg"
                        style="display: flex">
                        <div class="avatar w-[30%] lg:w-[30%] lg:w-[30%] flex-1.2 flex justify-center items-center">
                            <img src="/images/Logo-apps.png" alt=""
                                class="ms-2 w-[100px] h-[100px] lg:w-[200px] lg:h-[150px]">
                        </div>
                        <div class="deskripsi flex-1 text-sm ">
                            <div class="konten">
                                <h1 class="font-bold ms-5 mt-5 lg:ms-10 lg:mt-7 text-lg text-[#15ADA7]">
                                    Tanda dan Gejala
                                </h1>
                                <p
                                    class="ms-5 mt-1 lg:ms-10 lg:mt-1 text-md w-[70%] h-[41px] lg:h-[60px] overflow-hidden">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni tenetur veritatis id
                                    at
                                    mollitia,
                                    vero natus veniam temporibus, illo sapiente minima molestiae placeat nostrum
                                    voluptatum
                                    magnam
                                    delectus itaque possimus? Beatae!
                                </p>
                                <p class="ms-5 mt-5 lg:ms-10 lg:mt-10 text-gray-500">Admin, 20 Nov 2023</p>
                            </div>

                        </div>

                    </div>
                @endfor
                @for ($i = 0; $i < 5; $i++)
                    <div
                        class="pertolongan w-[100%] lg:w-[100%] lg:h-[200px] bg-[#FFFF] rounded-lg h-[150px] flex mt-3 justify-evenly shadow-lg">
                        <div class="avatar w-[30%] lg:w-[30%] lg:w-[30%] flex-1.2 flex justify-center items-center">
                            <img src="/images/Logo-apps.png" alt=""
                                class="ms-2 w-[100px] h-[100px] lg:w-[200px] lg:h-[150px]">
                        </div>
                        <div class="deskripsi flex-1 text-sm ">
                            <div class="konten">
                                <h1 class="font-bold ms-5 mt-5 lg:ms-10 lg:mt-7 text-lg text-[#15ADA7]">
                                    Pertolongan
                                </h1>
                                <p
                                    class="ms-5 mt-1 lg:ms-10 lg:mt-1 text-md w-[70%] h-[41px] lg:h-[60px] overflow-hidden">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni tenetur veritatis id
                                    at
                                    mollitia,
                                    vero natus veniam temporibus, illo sapiente minima molestiae placeat nostrum
                                    voluptatum
                                    magnam
                                    delectus itaque possimus? Beatae!
                                </p>
                                <p class="ms-5 mt-5 lg:ms-10 lg:mt-10 text-gray-500">Admin, 20 Nov 2023</p>
                            </div>

                        </div>

                    </div>
                @endfor
                @for ($i = 0; $i < 5; $i++)
                    <div
                        class="pemahaman w-[100%] lg:w-[100%] lg:h-[200px] bg-[#FFFF] rounded-lg h-[150px] flex mt-3 justify-evenly shadow-lg">
                        <div class="avatar w-[30%] lg:w-[30%] lg:w-[30%] flex-1.2 flex justify-center items-center">
                            <img src="/images/Logo-apps.png" alt=""
                                class="ms-2 w-[100px] h-[100px] lg:w-[200px] lg:h-[150px]">
                        </div>
                        <div class="deskripsi flex-1 text-sm ">
                            <div class="konten">
                                <h1 class="font-bold ms-5 mt-5 lg:ms-10 lg:mt-7 text-lg text-[#15ADA7]">
                                    Pemahaman
                                </h1>
                                <p
                                    class="ms-5 mt-1 lg:ms-10 lg:mt-1 text-md w-[70%] h-[41px] lg:h-[60px] overflow-hidden">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni tenetur veritatis id
                                    at
                                    mollitia,
                                    vero natus veniam temporibus, illo sapiente minima molestiae placeat nostrum
                                    voluptatum
                                    magnam
                                    delectus itaque possimus? Beatae!
                                </p>
                                <p class="ms-5 mt-5 lg:ms-10 lg:mt-10 text-gray-500">Admin, 20 Nov 2023</p>
                            </div>

                        </div>

                    </div>
                @endfor



            </div>
        </div>

    </div>
</body>

<script>
    let clickPemahaman = document.querySelector(".click-pemahaman");
    let clickGejala = document.querySelector(".click-gejala");

    let pemahaman = document.querySelector(".pemahaman");
    let pertolongan = document.querySelector(".pertolongan");
    let gejala = document.querySelector(".gejala");

    clickPemahaman.addEventListener("click", function() {
        if (pertolongan.style.display === 'flex') {
            pertolongan.style.display = 'none';
        } else {
            pertolongan.style.display = 'none';
        }

    })
</script>

</html>
