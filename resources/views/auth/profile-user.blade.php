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
    <title>{{ $title }}Stroke</title>
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
                        id="text" type="text" placeholder="Masukan JEnis Kelamin">
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
            <div class="mb-4">
                <label class="text-gray-700 text-sm font-bold mb-2" for="nama">
                    Username
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" placeholder="Username">
            </div>
            <div class="mb-4">
                <label class="text-gray-700 text-sm font-bold mb-2" for="nama">
                    Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="text" placeholder="Password">
            </div>


            <div class="text-center mt-7 pb-10">
                <button
                    class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-3xl text-white">Simpan</button>
            </div>

        </div>
    </div>
</body>

</html>
