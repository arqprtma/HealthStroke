<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./recources/css/app.css">
    <title>Pasien - Health Stroke</title>
</head>

<body class="bg-[#F8F8FF]">
    <div class="container mx-auto">
        <div class="back w-[50px] relative top-[50px]  h-[50px] left-[50px] lg:left-[310px]">
            <a href={{ 'dashboard' }}>
                <img src="images/arrow-back.png" alt="">
            </a>
        </div>
        <div class="gambar relative top-[50px] lg:top-[50px]">
            <div class="w-[100px] h-[200] mx-auto">
                <img src="/images/User.png" alt="" class="">
            </div>
            <div class="w-[200px] h-[100] mx-auto">
                <label class="block text-center ms-[-20px] mt-5 mb-3 text-sm font-medium text-gray-900 dark:text-white"
                    for="file_input">Ganti Foto
                    Profile
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="file_input" type="file">
            </div>
        </div>
        <div class="relative top-[65px] lg:top-[65px] w-[70%] lg:w-[50%] mx-auto">
            <div class="mb-4">
                <label class="text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama Lengkap
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="nama" type="text" placeholder="Masukan Nama Lengkap">
            </div>
            <div class="flex justify-between gap-1">
                <div class="mb-4 flex-1">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="email">
                        Jenis Kelamin
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" type="text" placeholder="Masukan Email">
                </div>
                <div class="mb-4 basis-1/3">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="umur">
                        Umur
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="umur" type="text" placeholder="Umur">
                </div>
            </div>

            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Pemicu</h3>
            <ul
                class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="hipertensi-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="hipertensi-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hipertensi</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="diabetes-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="diabetes-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Diabetes
                            Melitus</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="cardio-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="cardio-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cardio
                            Vascular</label>
                    </div>
                </li>
            </ul>

            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white mt-5">Komplikasi</h3>
            <ul
                class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="kelumpuhan-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="kelumpuhan-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelumpuhan /
                            Kelemahan</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="kesulitanmenelean-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="kesulitanmenelean-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kesulitan
                            Menelan</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="kesulianBAB-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="kesulianBAB-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kesulitan
                            BAB</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="penglihatanKabur-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="penglihatanKabur-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penglihatan
                            Kabur</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input id="kesulitanBerbicara-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="kesulitanBerbicara-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kesulitan
                            Berbicara
                        </label>
                    </div>
                </li>
            </ul>

            <div class="text-center mt-7 pb-10">
                <button
                    class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-3xl text-white">Simpan</button>
            </div>

        </div>
    </div>
</body>

</html>
