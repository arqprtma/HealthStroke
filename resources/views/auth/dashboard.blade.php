<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./recources/css/app.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="/path/to/flickity.css" media="screen">

    <title>Dashboard - Health Stroke</title>
    <style>
        .carousel-cell {
            width: 66%;
            margin-right: 10px;
            background: #FFFF;
            border-radius: 5px;
        }

        .avatar {
            border-radius: 5px 0 0 5px;
        }

        /* cell number */
        .carousel-cell:before {
            display: block;
            text-align: center;
            line-height: 200px;
            font-size: 80px;
            color: white;
        }

        .flickity-prev-next-button {
            display: none;
        }
    </style>
</head>

<body class="bg-[#F8F8FF] h-[2500px]">
    <div class="navigasi container lg:w-[80%] mx-auto p-10">
        <div class="navbar flex justify-between h-[20px]">
            <div class="alert flex gap-2 box-border">
                <h1 class="font-bold">Hi,</h1><span> Stroke Care</span>
            </div>
            <div class="logo box-border">
                <img src="/images/Logo-apps.png" alt="logo" class="w-[50px] h-[50px] mt-[-15px]">
            </div>
        </div>
    </div>
    <div class="pasien container lg:w-[80%]  mx-auto ps-10 pe-10">
        <div class="container-card-pasien mt-10">
            <div class="components-pasien flex justify-between">
                <h1 class="font-bold text-sm lg:text-lg ">Daftar Pasien</h1>
                <button
                    class="bg-[#15ADA7] text-sm lg:text-lg rounded-md w-[70px] lg:w-[100px] h-[30px] text-white shadow-md hover:border-2 hover:border-[#15ADA7] hover:bg-[#FFFF] hover:text-[#15ADA7]">Tambah</button>
            </div>
        </div>
        <div class="card-pasien mt-5">
            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                <div class="carousel-cell w-[80%] lg:w-[66%] lg:h-[200px] h-[150px] flex m-2 justify-evenly shadow-md ">
                    <div
                        class="avatar w-[30%] lg:w-[30%] lg:w-[30%] bg-[#15ADA7] flex-1.2 flex justify-center items-center">
                        <img src="/images/Logo-apps.png" alt=""
                            class="w-[50px] h-[50px] lg:w-[100px] lg:h-[100px] ">
                    </div>
                    <div class="deskripsi flex-1 text-sm">
                        <button
                            class="bg-[#2296D1] lg:w-[70px] lg:h-[30px] float-right mt-2 me-3 text-white lg:rounded-lg lg:text-lg text-center text-[12px] rounded ps-2 pe-2">Edit
                        </button>
                        <div class="nama flex mt-2 ">
                            <p
                                class=" text-[12px] h-[20px] lg:h-[35px] lg:text-xl font-bold mt-10 ms-2 lg:ms-10 overflow-hidden">
                                Ariq Pratama

                            </p>
                            <img src="images/male.png" alt=""
                                class="w-[15px] h-[15px] lg:w-[30px] lg:h-[30px] ms-1 lg:ms-2 mt-8 lg:mt-6">
                        </div>
                        <div class="progress-bar">
                            <div class="bar-aktivitas">
                                <h3 class="text-[10px] lg:text-lg ms-2 lg:ms-10 ">Aktivitas dan Treatment</h3>
                                <div
                                    class="step float-right mt-[-21px] lg:mt-[-25px] me-[40px] lg:me-[60px] text-[10px] lg:text-[14px]">
                                    3/4
                                </div>
                                <div class="w-[80%] ms-2 lg:ms-10 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-[#15ADA7] h-2.5 rounded-full" style="width: 45%"></div>
                                </div>
                            </div>
                            <div class="bar-penanganan mt-1 lg:mt-2">
                                <h3 class="text-[10px] lg:text-lg ms-2 lg:ms-10 ">Penanganan</h3>
                                <div
                                    class="step float-right mt-[-21px] lg:mt-[-25px] me-[40px] lg:me-[60px] text-[10px] lg:text-[14px]">
                                    3/4
                                </div>
                                <div class="w-[80%] ms-2 lg:ms-10 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-[#15ADA7] h-2.5 rounded-full" style="width: 55%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="carousel-cell w-[80%] lg:w-[66%] lg:h-[200px] h-[150px] flex justify-evenly shadow-md m-2">
                    <div
                        class="avatar w-[30%] lg:w-[30%] lg:w-[30%] bg-[#15ADA7] flex-1.2 flex justify-center items-center">
                        <img src="/images/Logo-apps.png" alt=""
                            class="w-[50px] h-[50px] lg:w-[100px] lg:h-[100px] ">
                    </div>
                    <div class="deskripsi flex-1 text-sm">
                        <button
                            class="bg-[#2296D1] lg:w-[70px] lg:h-[30px] float-right mt-2 me-3 text-white lg:rounded-lg lg:text-lg text-center text-[12px] rounded ps-2 pe-2">Edit
                        </button>
                        <div class="nama flex mt-2 relative z-10">
                            <p
                                class=" text-[12px] relative h-[25px] lg:h-[35px] lg:text-xl lg:font-bold mt-10 ms-2 lg:ms-10 overflow-hidden">
                                Agung Dwi Sahputra

                            </p>
                            <img src="images/male.png" alt=""
                                class="w-[15px] h-[15px] lg:w-[30px] lg:h-[30px] ms-1 lg:ms-2 mt-8 lg:mt-6">
                        </div>
                        <div class="progress-bar">
                            <div class="bar-aktivitas">
                                <h3 class="text-[10px] lg:text-lg ms-2 lg:ms-10 ">Aktivitas dan Treatment</h3>
                                <div
                                    class="step float-right mt-[-21px] lg:mt-[-25px] me-[40px] lg:me-[60px] text-[10px] lg:text-[14px]">
                                    3/4
                                </div>
                                <div class="w-[80%] ms-2 lg:ms-10 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-[#15ADA7] h-2.5 rounded-full" style="width: 45%"></div>
                                </div>
                            </div>
                            <div class="bar-penanganan mt-1 lg:mt-2">
                                <h3 class="text-[10px] lg:text-lg ms-2 lg:ms-10 ">Penanganan</h3>
                                <div
                                    class="step float-right mt-[-21px] lg:mt-[-25px] me-[40px] lg:me-[60px] text-[10px] lg:text-[14px]">
                                    3/4
                                </div>
                                <div class="w-[80%] ms-2 lg:ms-10 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                    <div class="bg-[#15ADA7] h-2.5 rounded-full" style="width: 55%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tasks container lg:w-[80%] mx-auto p-10 mt-5">
        <div class="judul flex justify-between">
            <h1 class="font-bold text-sm lg:text-lg">Aktivitas Penanganan</h1>
            <a href="" class="text-sm lg:text-lg">Lihat Lainnya</a>
        </div>
        <div class="container bg-[#FFFF] w-[100%] h-[500px] rounded-lg shadow-lg mt-2 overflow-scroll">
            <div class="judul flex justify-evenly pt-7 w-[80%] mx-auto">
                <a href="#" class="aktivitas">
                    <h1 class="text-center">Aktivitas</h1>
                    <hr class="border-2 border-solid border-[#15ADA7] w-[100px] lg:w-[120px]">
                </a>
                <a href="#" class="penanganan">
                    <h1>Penanganan</h1>
                    {{-- <hr class="border-2 border-solid border-[#15ADA7]"> --}}
                </a>
            </div>
            <div class="task flex w-[80%] mx-auto justify-evenly mt-2">
                <div class="flex gap-5 w-[100%] mx-auto pt-5">
                    <div class="gambar">
                        <img src="images/Logo-apps.png" alt="" class="w-[50px] h-[50px]">
                    </div>
                    <div class="deskripsi">
                        <div class="judul text-sm lg:text-lg">
                            <h1>Aktivitas</h1>
                        </div>
                        <div class="kategori text-sm lg:text-lg">
                            <h3>Makanan dan Minuman</h3>
                        </div>
                    </div>
                </div>
                <div class="dropdown p-5 mt-2 cursor-pointer">
                    <h1>V</h1>
                </div>
            </div>
            <hr class="mt-1 border-1 border-solid  mx-auto w-[80%]">
            <div class="task flex w-[80%] mx-auto justify-evenly mt-2">
                <div class="flex gap-5 w-[100%] mx-auto pt-5">
                    <div class="gambar">
                        <img src="images/Logo-apps.png" alt="" class="w-[50px] h-[50px]">
                    </div>
                    <div class="deskripsi">
                        <div class="judul text-sm lg:text-lg">
                            <h1>Aktivitas</h1>
                        </div>
                        <div class="kategori text-sm lg:text-lg">
                            <h3>Olahraga</h3>
                        </div>
                    </div>
                </div>
                <div class="dropdown p-5 mt-2 cursor-pointer">
                    <h1>V</h1>
                </div>
            </div>
            <hr class="mt-1 border-1 border-solid  mx-auto w-[80%]">
            <div class="task flex w-[80%] mx-auto justify-evenly mt-2">
                <div class="flex gap-5 w-[100%] mx-auto pt-5">
                    <div class="gambar">
                        <img src="images/Logo-apps.png" alt="" class="w-[50px] h-[50px]">
                    </div>
                    <div class="deskripsi">
                        <div class="judul text-sm lg:text-lg">
                            <h1>Aktivitas</h1>
                        </div>
                        <div class="kategori text-sm lg:text-lg">
                            <h3>Terapi</h3>
                        </div>
                    </div>
                </div>
                <div class="dropdown p-5 mt-2 cursor-pointer">
                    <h1>V</h1>
                </div>
            </div>
            <hr class="mt-1 border-1 border-solid  mx-auto w-[80%]">
            <div class="task flex w-[80%] mx-auto justify-evenly mt-2">
                <div class="flex gap-5 w-[100%] mx-auto pt-5">
                    <div class="gambar">
                        <img src="images/Logo-apps.png" alt="" class="w-[50px] h-[50px]">
                    </div>
                    <div class="deskripsi">
                        <div class="judul text-sm lg:text-lg">
                            <h1>Aktivitas</h1>
                        </div>
                        <div class="kategori text-sm lg:text-lg">
                            <h3>Olahraga</h3>
                        </div>
                    </div>
                </div>
                <div class="dropdown p-5 mt-2 cursor-pointer">
                    <h1>V</h1>
                </div>
            </div>
            <hr class="mt-1 border-1 border-solid  mx-auto w-[80%]">
        </div>
    </div>
    <div class="berita lg:w-[80%] mx-auto px-10 mt-3">
        <div class="judul flex justify-between">
            <h1 class="font-bold text-sm lg:text-lg">Berita Terkini</h1>
            <a href="" class="text-sm lg:text-lg">Lihat Lainnya</a>
        </div>
        @for ($i = 0; $i < 5; $i++)
            <div
                class=" w-[100%] lg:w-[100%] lg:h-[200px] bg-[#FFFF] rounded-lg h-[150px] flex mt-3 justify-evenly shadow-lg">
                <div class="avatar w-[30%] lg:w-[30%] lg:w-[30%] flex-1.2 flex justify-center items-center">
                    <img src="/images/Logo-apps.png" alt=""
                        class="ms-2 w-[100px] h-[100px] lg:w-[200px] lg:h-[150px]">
                </div>
                <div class="deskripsi flex-1 text-sm ">
                    <div class="konten">
                        <h1 class="font-bold ms-5 mt-5 lg:ms-10 lg:mt-7 text-lg text-[#15ADA7]">
                            Tanda dan Gejala
                        </h1>
                        <p class="ms-5 mt-1 lg:ms-10 lg:mt-1 text-md w-[70%] h-[41px] lg:h-[60px] overflow-hidden">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni tenetur veritatis id at
                            mollitia,
                            vero natus veniam temporibus, illo sapiente minima molestiae placeat nostrum voluptatum
                            magnam
                            delectus itaque possimus? Beatae!
                        </p>
                        <p class="ms-5 mt-5 lg:ms-10 lg:mt-10 text-gray-500">Admin, 20 Nov 2023</p>
                    </div>

                </div>

            </div>
        @endfor

    </div>
</body>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="/path/to/flickity.pkgd.min.js"></script>
<script>
    $('.main-carousel').flickity({
        // options
        cellAlign: 'left',
        contain: true
    });
</script>

</html>
