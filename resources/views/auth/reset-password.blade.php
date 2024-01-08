<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Reset Password</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
</head>

<body class="bg-[#F8F8FF]">
    <div class="container mx-auto">
        @if ($errors->any())
        <h1>error</h1>
        @endif
        @if (session()->has('status'))
            {{session()->get('status')}}

        @endif
        <div class="judul relative top-[150px] lg:top-[150px]">
            <h1 class="font-bold text-[14] text-center lg:text-[24px]">RESET PASSWORD</h1>
            <hr class="w-[100px] lg:w-[150px] mx-auto border-2 border-solid border-[#15ADA7]">
        </div>
        <div class="relative top-[170px] lg:top-[170px] w-[70%] lg:w-[50%] mx-auto">
            <form action="{{route('password.update')}}" method="post">
            @csrf
            <div class="mb-4">
                <label class="text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input type="hidden" name="token" value="{{request()->token}}">
                <input type="hidden" name="email" value="{{request()->email}}">
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" type="password" name="password">
            </div>
            <div class="mb-4">
                <label class="text-gray-700 text-sm font-bold mb-2" for="confirm-password">
                    Konfirmasi Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="password_confirmation" type="password"  name="password_confirmation">
            </div>

            <div class="text-center mt-5">
                <button type="submit" value="Request Password Reset"
                    class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-3xl text-white">Kirim</button>
            </div>
            <p class="text-center mt-5 text-gray-500">Already have an Account ? <a href={{ 'login' }}
                    class="text-[#0085FF] cursor-pointer font-bold">Sign
                    in</a>
            </p>
        </form>
        </div>
    </div>
</body>

</html>
