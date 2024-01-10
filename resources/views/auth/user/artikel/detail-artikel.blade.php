<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $artikel->judul.' | '.$title }}</title>
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
        <div class="back w-[50px] relative top-[50px]  h-[50px] left-[40px] lg:left-[120px]">
            <a href={{ route('dashboard') }}>
                <img src="/images/arrow-back.png" alt="Arrow">
            </a>
        </div>
        <div class="content relative top-[50px] lg:top-[50px] w-[80%] mx-auto">
            <h1 class="font-bold mt-5 text-[14px] lg:text-[24px] mb-0">{{ $artikel->judul }}</h1>
            <h2 class="mb-5 text-sm lg:text-base">{{ $artikel->kategori_artikel->nama }}</h2>
            <h2 class="mt-5 mb-5 text-sm lg:text-base">Admin | {{ Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}</h2>
            <img src="{{ asset(Storage::url("/artikel/cover/$artikel->cover")) }}" alt="Cover" class="w-[100%] object-fit mx-auto">
            <h2 class="mt-5 text-sm lg:text-lg font-bold">Deskripsi : </h2>
            <div class=" mx-auto text-sm lg:text-base">{!! $artikel->deskripsi !!}</div>
        </div>

    </div>
</body>

</html>
