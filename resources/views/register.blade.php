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
        <div class="judul relative top-[50px] lg:top-[50px]">
            <h1 class="font-bold text-[14] text-center lg:text-[24px]">REGISTER</h1>
            <hr class="w-[60px] lg:w-[100px] mx-auto border-2 border-solid border-[#15ADA7]">
        </div>
        <div class="relative top-[65px] lg:top-[65px] w-[70%] lg:w-[50%] mx-auto">
            <form action="{{ route('regiter.proses') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="nama">
                        Nama Lengkap
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="nama" name="nama" type="text" value="{{ old('nama') }}" placeholder="Masukan Nama Lengkap">
                    @error('nama')
                        <span class="text-red-700 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Masukan Email">
                    @error('email')
                        <span class="text-red-700 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-between gap-1">
                    <div class="mb-4 flex-1">
                        <label class="text-gray-700 text-sm font-bold mb-2" for="gender">
                            Jenis Kelamin
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="gender" name="gender" type="text" value="{{ old('gender') }}" placeholder="Masukan Gender">
                        @error('gender')
                            <span class="text-red-700 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4 basis-1/3">
                        <label class="text-gray-700 text-sm font-bold mb-2" for="umur">
                            Umur
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="umur" name="umur" type="text" value="{{ old('umur') }}" placeholder="Umur">
                        @error('umur')
                            <span class="text-red-700 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Masukan Username">
                    @error('username')
                        <span class="text-red-700 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" name="password" type="password" {{ old('password') }} placeholder="Masukan Password">
                    @error('password')
                        <span class="text-red-700 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center mt-7">
                    <button
                        class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-3xl text-white">Register</button>
                </div>
            </form>  
            <p class="text-center mt-5 text-gray-500">Already have an Account ? <a href={{ 'login' }}
                    class="text-[#0085FF] cursor-pointer font-bold">Sign
                    in</a>
            </p>
        </div>
    </div>
</body>

</html>
