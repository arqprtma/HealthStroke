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
     <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

      <style>
          *{
              font-family: 'mulish','sans-serif';
          }
      </style>
</head>

<body class="bg-[#F8F8FF]">
    {{-- {{ dd($aktivitas) }} --}}
    <div class="container mx-auto">
        <div class="back w-[50px] relative top-[50px]  h-[50px] left-[40px] lg:left-[120px]">
            <a href={{ '/dashboard' }}>
                <img src="../images/arrow-back.png" alt="">
            </a>
        </div>
        <div class="content relative top-[50px] lg:top-[50px] w-[80%] mx-auto">
            <h1 class="font-bold mt-5 mb-5 text-[14px] lg:text-[24px]">{{ $aktivitas->kategori_aktivitas->nama }}</h1>
            <h2 class="mt-5 mb-5 text-sm lg:text-lg">Deskripsi : </h2>
            <div class=" mx-auto text-sm lg:text-base">{!! $aktivitas->deskripsi !!}</div>
            @if($aktivitas->video)
                <h5 class="mt-5 text-sm lg:text-base">Video Aktivitas Treatment : </h5>
                <iframe class="w-[100%] lg:h-[50vw] h-[300px] mt-5 mb-10" src="https://www.youtube.com/embed/{{ $aktivitas->video }}" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                </iframe>
            @endif

            <h5 class="text-sm font-bold lg:text-lg mt-12">Aktivitas Lainnya</h5>
            @foreach ($list_aktivitas as $key => $list)
                <a href="{{ route('detail-aktivitas', ['id' => $list->id_aktivitas]) }}" class="block container w-[100%] mx-auto mt-2 rounded-sm bg-[#FFFF] p-3">
                    <div class="deskripsi mx-auto">
                        <div class="flex justify-left gap-10 p-2 items-center">
                            <div class="text-sm lg:text-base">
                                {{ $key + 1 }}
                            </div>
                            <div class="deskripsi text-sm lg:text-base">
                                {!! Str::limit($list->deskripsi, 60, '...') !!}
                            </div>
                        </div>
                        {{-- <h1 class="text-sm lg:text-lg">{{ $key+1 }}. {!! $list->deskripsi !!}</h1> --}}
                    </div>
                </a>
            @endforeach

            <div class="text-center mt-7 pb-10">
                <a href="{{ route('add-log-aktivitas', ['id' => $aktivitas->id_aktivitas]) }}">
                    <button class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-lg text-white">Sudah
                    dilakukan
                    </button>
               
                @if((isset($trigerAktivitas)) && $log_treatment == $trigerAktivitas->jumlah )

                    <script>
                        // Menggunakan SweetAlert2 untuk menampilkan konten dari triggered activity
                        Swal.fire({
                            title: 'Informasi Aktivitas',
                            text: '{{ strip_tags($trigerAktivitas->first()->konten) }}', // Menampilkan konten dari aktivitas pertama
                            icon: 'info',
                            confirmButtonText: 'OK'
                        });
                    </script>
                    </a>
                @endif
            </div>

        </div>

    </div>
</body>

</html>
