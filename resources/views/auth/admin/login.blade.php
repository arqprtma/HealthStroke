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
        <div class="judul relative top-[130px] lg:top-[150px]">
            <h1 class="font-bold text-[14] text-center lg:text-[24px]">LOGIN ADMIN</h1>
            <hr class="w-[60px] lg:w-[100px] mx-auto border-2 border-solid border-[#15ADA7]">
        </div>
        <div class="relative top-[150px] lg:top-[170px] w-[70%] lg:w-[50%] mx-auto">
            <form action="{{ route('login.proses') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" name="username" value="{{ old('username') }}" type="text" placeholder="Masukan Username">
                </div>
                <div class="mb-4">
                    <label class="text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" name="password" value="{{ old('password') }}" placeholder="Masukan Password">
                </div>
                <div class="text-center mt-7">
                    <button type="submit"
                        class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7] hover:bg-[#FFFF] hover:text-[#15ADA7] w-[197px] h-[40px] rounded-3xl text-white">Login</button>
                </div>
            </form>

            <p class="text-sm lg:text-lg text-center mt-5 text-gray-500">Don't have an Account ? <a
                    href={{ 'register' }} class="text-[#0085FF] cursor-pointer font-bold">Sign
                    up</a>
            </p>
            <p class="mt-4 text-sm lg:text-lg text-center text-[#0085FF] cursor-pointer font-bold"><a
                    href={{ 'forgot-password' }} class="">Forgotten
                    Password ? </a>
            </p>
        </div>
    </div>
</body>

</html>
