<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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
    <div class="flex items-center justify-around bg-auto bg-cover bg-left-top bg-no-repeat -mt-4 lg:h-[356px] h-[300px]"
        id="bg-blub">
        <div class="px-5">
            <a href="{{ route('admin.aktivitas.tambah') }}" class="flex gap-2 mb-2">
                <img src="{{ asset('images/icons/arrow-left.png ') }}" width="30px" alt="Back Arrow">
            </a>
            <h2 class="text-left font-bold text-black lg:text-xl text-sm m-0">Tambah Aktivitas Treatment</h2>
        </div>
        <div class="px-5">
            {{-- <a href="#"><button class="px-2 py-2 bg-[#8DD67A] hover:bg-[#85D470] text-white rounded ml-auto block lg:text-base text-sm" id="dropdown">Tambah Kategori
                Aktivitas</button></a> --}}
        </div>
    </div>
    <form method="post" action="{{ route('admin.aktivitas.kategori.store') }}"
        class="container lg:w-[80%] mx-auto pb-7 px-5 lg:-mt-20 -mt-24">
        @csrf
        <div class="lg:w-[80%] w-full rounded-md shadow-md bg-[#F2F2F2] p-3 lg:mx-auto">
            <div>
                <label for="aktivitas" class="text-base">Nama Aktivitas</label>
                <div class="relative inline-block w-full mt-1 mb-2">
                    <input type="text"
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline lg:text-base text-sm mt-2"
                        name="aktivitas" id="aktivitas" placeholder="Masukan Kategori Aktivitas">
                </div>
            </div>
        </div>
        <div class=""><button type="submit"
                class="px-10 py-2 bg-[#15ADA7] hover:bg-[#13A29C] text-white rounded mx-auto block mt-5">Tambah</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Responsive background Image -->
    <script>
        if ($(window).width() < 768) {
            $('#bg-blub').css('background-image', 'url("/images/bg-mobile.png")');
            $('#bg-blub').css('background-position', 'center -50px');
        } else if ($(window).width() < 992) {
            $('#bg-blub').css('background-image', 'url("/images/bg-tablet.png")');
            $('#bg-blub').css('background-position', 'center -20px');
        } else {
            $('#bg-blub').css('background-image', 'url("/images/bg-desktop.png")');
            $('#bg-blub').css('background-position', 'center -20px');
        }
    </script>

    {{-- ALERT --}}
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
