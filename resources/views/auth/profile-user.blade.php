<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $title }}Stroke</title>
</head>

<body class="bg-[#F8F8FF]">
    <div class="container mx-auto">
        {{-- {{ auth()->user() }} --}}
        <div class="back w-[50px] relative top-[50px]  h-[50px] left-[50px] lg:left-[310px]">
            <a href={{ 'dashboard' }}>
                <img src="images/arrow-back.png" alt="">
            </a>
        </div>
        <div class="gambar relative top-[50px] lg:top-[50px]">
            @if (auth()->user()->gender == 'L')
                <div class="w-[100px] h-[200] mx-auto">
                    <img src="images/pasien/man.png" alt="Laki-Laki" class="img-preview">
                </div>
            @elseif (auth()->user()->gender == 'P')
                <div class="w-[100px] h-[200] mx-auto">
                    <img src="images/pasien/woman.png" alt="Perempuan" class="img-preview">
                </div>
            @endif
        </div>
        <div class="relative top-[65px] lg:top-[65px] w-[70%] lg:w-[50%] mx-auto">
            <form action="{{ route('setting-profile', ['id' => auth()->user()->id]) }}" method="POST">
                @csrf
                <?php $nama = auth()->user()->nama;
                $namaArray = explode(' ', $nama);

                $namaDepan = $namaArray[0];
                $namaBelakang = $namaArray[1];
                ?>
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="nama">
                        Nama Lengkap
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nama" name="nama" type="text" value="{{ $namaDepan . ' ' . $namaBelakang }}">
                    @error('nama')
                        <span class="text-red-700 text-xs">{{ $message }}</span>
                    @enderror
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="id" name="id" type="text" hidden value={{ auth()->user()->id }}>
                </div>
                <div class="flex justify-between gap-1">
                    <div class="mb-4 flex-1">
                        <div>
                            <label for="aktivitas" class="text-gray-700 text-sm font-bold">Jenis Kelamin</label>
                            <div class="relative inline-block w-full">
                                <select id="gender" name="gender"
                                    class="block appearance-none w-full bg-white  hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline lg:text-base text-sm">

                                    @if (auth()->user()->gender == 'L')
                                        <option value="L" selected>Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    @elseif (auth()->user()->gender == 'P')
                                        <option value="L">Laki-Laki</option>
                                        <option value="P" selected>Perempuan</option>
                                    @endif

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
                            id="umur" type="text" name="umur" value={{ auth()->user()->umur }}>
                        @error('umur')
                            <span class="text-red-700 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="email" value={{ auth()->user()->email }}>
                    @error('email')
                        <span class="text-red-700 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="nama">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text" name="username" placeholder="Username"
                        value={{ auth()->user()->username }}>
                    @error('email')
                        <span class="text-red-700 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="nama">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" name="password" type="password" placeholder="Password"
                        value={{ auth()->user()->password }}>
                    @error('password')
                        <span class="text-red-700 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center mt-7 pb-10">
                    <button onclick="ConfirmUpdate()"
                        class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-3xl text-white">Simpan</button>
                </div>
            </form>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('error'))
        <script>
            var pesan = "{{ session('error') }}"

            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: pesan
            });
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            var pesan = "{{ session('success') }}"
            Swal.fire({
                icon: "success",
                title: "Yeayy...",
                text: pesan
            });
        </script>
    @endif
</body>

</html>
