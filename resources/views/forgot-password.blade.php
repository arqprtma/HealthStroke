<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
     {{-- font --}}
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">

     <style>
         *{
             font-family: 'mulish','sans-serif';
         }
     </style>
</head>

<body class="bg-[#F8F8FF]">
    <div class="container mx-auto">
        <div class="judul relative top-[150px] lg:top-[150px]">
            <h1 class="font-bold text-[14] text-center lg:text-[24px]">FORGOT PASSWORD</h1>
            <hr class="w-[100px] lg:w-[150px] mx-auto border-2 border-solid border-[#15ADA7]">
        </div>
        <div class="relative top-[170px] lg:top-[170px] w-[70%] lg:w-[50%] mx-auto">
            <form action="{{route('password.email')}}" method="post">
            @csrf
            <div class="mb-4">
                <label class="text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" type="email" placeholder="Masukan Email" name="email">
            </div>
            <span class="text-red-500 text-sm lg:text-lg">* Password akan di kirimkan ke email aktif saat daftar</span>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Terjadi kesalahan. Mohon periksa kembali isian Anda."
        });
    </script>
@endif

@if (session()->has('status'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Yeayy...",
            text: "Kami telah mengirimkan tautan pengaturan ulang kata sandi Anda melalui email."
        });
    </script>

@endif

</body>

</html>
