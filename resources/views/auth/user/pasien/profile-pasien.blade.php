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
            <form action="{{ '/pasien' }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="nama">
                        Nama Lengkap
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nama" name="nama" type="text" placeholder="Masukan Nama Lengkap">
                    <input id="id_user" name="id_user" type="hidden" value={{ auth()->user()->id }}>

                </div>
                <div class="flex justify-between gap-1">
                    <div class="mb-4 flex-1">
                        <div>
                            <label for="gender" class="text-gray-700 text-sm font-bold">Jenis Kelamin</label>
                            <div class="relative inline-block w-full">
                                <select id="gender" name="gender"
                                    class="block appearance-none w-full bg-white  hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline lg:text-base text-sm">
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute top-1/2 right-0 transform -translate-x-1/2 translate-y-0 px-1">
                                    <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M14.293 5.293a1 1 0 0 0-1.414 0L10 8.586 6.707 5.293a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 0-1.414z" />
                                    </svg>
                                </div>
                            </div>
                            @error('gender')
                                <span class="text-red-700 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-4 basis-1/3">
                        <label class="text-gray-700 text-sm font-bold mb-2" for="umur">
                            Umur
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="umur" name="umur" type="text" placeholder="Umur">
                    </div>
                </div>

                <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Pemicu</h3>
                <ul
                    class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="hipertensi-checkbox" type="checkbox" name="pemicu[1]" value="Hipertensi"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="hipertensi-checkbox"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hipertensi</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="diabetes-checkbox" type="checkbox" name="pemicu[2]" value="Diabetes Melitus"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="diabetes-checkbox"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Diabetes
                                Melitus</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="cardio-checkbox" type="checkbox" name="pemicu[3]" value="Cardio Vascular"
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
                            <input id="kelumpuhan-checkbox" type="checkbox" name="komplikasi[1]"
                                value="Kelumpuhan/Kelemahan"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="kelumpuhan-checkbox"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kelumpuhan
                                /
                                Kelemahan</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="kesulitanmenelean-checkbox" type="checkbox" name="komplikasi[2]"
                                value="Kesulitan Menelan"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="kesulitanmenelean-checkbox"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kesulitan
                                Menelan</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="kesulianBAB-checkbox" type="checkbox" name="komplikasi[3]"
                                value="Kesulitan BAB"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="kesulianBAB-checkbox"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kesulitan
                                BAB</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="penglihatanKabur-checkbox" type="checkbox" name="komplikasi[4]"
                                value="Penglihatan Kabur"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="penglihatanKabur-checkbox"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penglihatan
                                Kabur</label>
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="kesulitanBerbicara-checkbox" type="checkbox" name="komplikasi[5]"
                                value="Kesulitan Berbicara"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="kesulitanBerbicara-checkbox"
                                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kesulitan
                                Berbicara
                            </label>
                        </div>
                    </li>
                </ul>
                <div class="text-center mt-7 pb-10">
                    <button type="submit"
                        class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-3xl text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
