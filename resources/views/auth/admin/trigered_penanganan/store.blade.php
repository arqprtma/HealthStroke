<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- cdn tailwindcss --}}
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        {{-- <script src="https://cdn.tiny.cloud/1/n5fwf9rl9zha92sitq4ifncibtnjo2h6y1mdfwew55yurj1x/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}

        <title>{{ $title }}</title>
        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">

        <style>
            * {
                font-family: 'mulish', 'sans-serif';
            }
        </style>

        <!-- CSS CKEditor 5 -->
        <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />

        <!-- Select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>

    <body class="bg-[#F8F8FF]">
        <div class="flex items-center bg-auto bg-cover bg-left-top bg-no-repeat -mt-4 lg:h-[356px] h-[300px]" id="bg-blub">
            <div class="px-5 flex items-center justify-center lg:ms-[250px] gap-2">
                <a href="{{ route('admin.trigered.penanganan') }}" class="flex-shrink-0">
                    <img src="{{ asset('images/icons/arrow-left.png') }}" width="30px" alt="Back Arrow">
                </a>
                <h2 class="text-left font-bold text-black lg:text-xl text-sm m-0">Trigger penanganan</h2>
            </div>
        </div>

        <form method="post" action="{{ route('admin.trigered.penanganan.store') }}" class="container lg:w-[80%] mx-auto pb-7 px-5 lg:-mt-20 -mt-24">
            @csrf
            <div class="lg:w-[80%] w-full rounded-md shadow-md bg-[#F2F2F2] p-3 lg:mx-auto">
                <div>
                    <!-- Select Option -->
                    <div class="mb-4">
                        <label for="penanganan" class="block text-sm font-medium text-gray-700">Pilih Penanganan</label>
                        <div class="relative">
                            <select id="penanganan" name="penanganan" class="select2 block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline focus:border-[#15ADA7]">
                                <option value="">-- Pilih --</option>
                                @foreach ($penanganan as $data)
                                    <option class="two-lines" value="{{ $data->id_penanganan }}">{!! $data->deskripsi !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Input Text -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" id="judul" name="judul" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukkan Judul">
                        <span class="text-xs text-red-500">* Contoh : Tidak ada kontraksi atau reaksi otot</span>
                    </div>
                    <!-- Input Number -->
                    <div class="mb-4">
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <input type="number" id="level" name="level" min="0" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="0">
                    </div>
                </div>
                <!-- Textarea -->
                <div class="mb-4">
                    <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                    <textarea id="konten" name="konten" rows="4" class="ckeditor5 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukkan isi Konten"></textarea>
                    <span class="text-xs text-red-500">* Contoh : Angkat bagian kaki atau tangan yang mengalami kelumpuhan. Jika tidak ada kontraksi otot atau reaksi dari bagian yang lumpuh maka nilainya 0</span>
                </div>
                <!-- Input Text -->
                <div class="mb-4">
                    <label for="kemajuan" class="block text-sm font-medium text-gray-700">Kemajuan</label>
                    <input type="text" id="kemajuan" name="kemajuan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukkan kalimat kemajuan">
                    <span class="text-xs text-red-500">* Contoh : Terdapat sedikit perbaikan. Mulai lakukan latihan aktif-asistif ringan untuk mendorong aktivasi otot</span>
                </div>
                <!-- Input Text -->
                <div class="mb-4">
                    <label for="kemunduran" class="block text-sm font-medium text-gray-700">Kemunduran</label>
                    <input type="text" id="kemunduran" name="kemunduran" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukkan kalimat kemunduran">
                    <span class="text-xs text-red-500">* Contoh : Pasien mengalami penurunan; evaluasi kemungkinan komplikasi baru atau hambatan lain.</span>
                </div>
            </div>
            <div class=""><button type="submit" class="px-10 py-2 bg-[#15ADA7] hover:bg-[#13A29C] text-white rounded mx-auto block mt-5">Simpan</button>
            </div>
        </form>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        @include('ckeditor.ckeditor5')
        <script>
            // Implement CKEditor5
            CKEDITOR5('.ckeditor5');
        </script>

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

        <script>
            // Implement Selec2 to Select Option
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.select2').select2();
            });
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
