<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{ $title }}</title>
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        {{-- cdn tailwindcss --}}
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">



        <style>
            * {
                font-family: 'mulish', 'sans-serif';
            }

            .avatar {
                border-radius: 5px 0 0 5px;
            }

            /* cell number */
            .carousel-cell:before {
                display: block;
                text-align: center;
                line-height: 200px;
                font-size: 80px;
                color: white;
            }

            /*
        .flickity-prev-next-button {
            display: none;
        } */

            .bottom-menu {
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(6.3px);
                -webkit-backdrop-filter: blur(6.3px);
                border: 1px solid #ffffff;
                width: 80%;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: auto;
            }



            .detail-task-aktivitas,
            .detail-task-penanganan {
                display: none;
            }

            .parent-penanganan {
                display: none;
            }

            .inactive {
                display: none;
            }

            .active {
                display: block;
            }
        </style>
    </head>

    <body class="bg-[#F8F8FF] h-[210vh]">
        <div class="bg-auto bg-cover bg-left-top bg-no-repeat pt-10 lg:h-[356px] h-[350px]" id="bg-blub">

            <div class="navigasi container lg:w-[80%] mx-auto px-4">
                <div class="navbar flex justify-between h-[20px]">
                    <div class="alert flex gap-2 box-border">
                        <h1 class="font-bold">Hi, </h1><span>{{ auth()->user()->nama }}</span>
                    </div>
                    <div class="logo box-border cursor-pointer" id="profile">
                        @if (auth()->user()->gender == 'L')
                            <div class="mx-auto">
                                <img src="images/pasien/man.png" alt="Laki-Laki" class="w-[50px] h-[50px] mt-[-15px] ">
                            </div>
                        @elseif (auth()->user()->gender == 'P')
                            <div class="mx-auto">
                                <img src="images/pasien/woman.png" alt="Perempuan" class="w-[50px] h-[50px] mt-[-15px] ">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="dropdown-profile lg:w-[10vw] w-[35vw] h-auto bg-white absolute lg:right-40 right-6 top-20 rounded shadow-lg py-2 px-4 inactive">
                    <ul class="mb-2">
                        <li onclick="profile()" class="uil uil-user cursor-pointer font-bold text-green-500"><span class="ms-3 text-sm lg:text-lg">Profile</span></li>
                    </ul>
                    <hr>
                    <ul class="mt-2">
                        <li onclick="logout()" class="uil uil-sign-out-alt cursor-pointer font-bold text-red-500"><span class="ms-3 text-sm lg:text-lg">Logout</span></li>
                    </ul>
                </div>
            </div>
            <div class="pasien container lg:w-[80%]  mx-auto px-4 pt-10">
                <div class="container-card-pasien mt-10">
                    <div class="components-pasien flex justify-between">
                        <h1 class="font-bold text-sm lg:text-lg ">Daftar Pasien</h1>
                        @if (!$pasien)
                            <a href="{{ route('pasien') }}" class="tambah-pasien bg-[#15ADA7] text-sm lg:text-lg rounded-md w-[80px] lg:w-[100px] h-[auto] py-1 text-white shadow-md hover:border-2 hover:border-[#15ADA7] hover:bg-[#FFFF] hover:text-[#15ADA7] text-center">Tambah</a>
                        @endif
                    </div>
                </div>
                <div class="card-pasien mt-5">
                    @if ($pasien)
                        <div class="main-carousel">
                            <div class="carousel-pasien carousel-cell lg:w-[66%] w-100 lg:h-[200px] h-[150px] flex m-2 justify-evenly shadow-m bg-white">
                                <div class="avatar w-[30%] bg-[#15ADA7] flex-1.2 flex justify-center items-center">
                                    <img src="/images/Logo-apps.png" alt="" class="w-[50px] h-[50px] lg:w-[100px] lg:h-[100px] ">
                                </div>
                                <div class="deskripsi flex-1 text-sm">
                                    <a href={{ route('pasien.update', $pasien->id_pasien) }} class="bg-[#2296D1] lg:w-[70px] lg:h-[30px] float-right mt-2 me-3 text-white lg:rounded-lg lg:text-lg text-center text-[12px] rounded ps-2 pe-2 flex items-center justify-center">Edit
                                    </a>
                                    <div class="nama flex mt-2 ">
                                        <p class=" text-[12px] h-[20px] lg:h-[35px] lg:text-xl font-bold mt-10 ms-2 lg:ms-10 overflow-hidden">
                                            {{ $pasien->nama }}

                                        </p>
                                        @if ($pasien->gender == 'L')
                                            <img src="images/male.png" alt="" class="w-[10px] h-[10px] lg:w-[20px] lg:h-[20px] ms-1 lg:ms-2 mt-10 lg:mt-8">
                                        @elseif ($pasien->gender == 'P')
                                            <img src="images/female.png" alt="" class="w-[10px] h-[10px] lg:w-[20px] lg:h-[20px] ms-1 lg:ms-2 mt-10 lg:mt-8">
                                        @endif

                                    </div>
                                    <div class="progress-bar">
                                        @php
                                            $countAktivitasId = $aktivitasId ? count($aktivitasId) : 0;
                                            $countPenangananId = $penangananId ? count($penangananId) : 0;

                                            // Check if $countAktivitasId is not zero before performing the division
                                            $percentAktivitas = $countAktivitasId !== 0 ? (count($log_aktivitas) / $countAktivitasId) * 100 : 0;

                                            // Check if $countPenangananId is not zero before performing the division
                                            $percentPenanganan = $countPenangananId !== 0 ? (count($log_penanganan) / $countPenangananId) * 100 : 0;
                                        @endphp

                                        <div class="bar-aktivitas">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-[10px] lg:text-lg ms-2 lg:ms-10 ">Aktivitas
                                                </h3>
                                                <div class="step me-[40px] text-[10px] lg:text-[14px]">
                                                    {{ count($log_aktivitas) }}/{{ $aktivitasId ? count($aktivitasId) : 0 }}
                                                </div>
                                            </div>
                                            <div class="w-[80%] ms-2 lg:ms-10 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                <div class="bg-[#15ADA7] h-2.5 rounded-full" style="width: {{ $percentAktivitas }}%"></div>
                                            </div>
                                        </div>
                                        <div class="bar-penanganan mt-1 lg:mt-2">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-[10px] lg:text-lg ms-2 lg:ms-10 ">Penanganan</h3>
                                                <div class="step me-[40px] text-[10px] lg:text-[14px]">
                                                    {{ count($log_penanganan) }}/{{ $penangananId ? count($penangananId) : 0 }}
                                                </div>
                                            </div>
                                            <div class="w-[80%] ms-2 lg:ms-10 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                <div class="bg-[#15ADA7] h-2.5 rounded-full" style="width: {{ $percentPenanganan }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @else
                        <img src="images/pasien/empty.svg" alt="" class="width-[150px] h-[150px] mx-auto mt-10">
                        <div class="text-center pt-5"><span class="text-center text-red-500">Data masih kosong</span>
                        </div>
                    @endif
                </div>
            </div>

            <div id="pengetahuan" class="pengetahuan container lg:w-[80%] mx-auto px-4 mb-10 mt-[50px]">
                <h1 class="font-bold text-sm lg:text-lg mb-2">Pengetahuan</h1>
                <div class="modal-button max-w-sm rounded-md overflow-hidden shadow-lg bg-white hover:scale-105 cursor-pointer" data-modal-target="#pengetahuan-hipertensi">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Stroke</div>
                        <p class="text-gray-700 text-base two-lines">
                            Pecah atau terjepit pembuluh darah di otak sehingga menyebabkan kerusakan jaringan otak
                        </p>
                    </div>
                </div>
            </div>

            @if ($pasien)
                <div id="deskripsi" class="deskripsi container lg:w-[80%] mx-auto px-4 mb-10 mt-[50px]">
                    <h1 class="font-bold text-sm lg:text-lg mb-2">Hasil perawatan yang dikerjakan</h1>
                    <div class="lg:w-[100%] w-[100%] mx-auto top-12 p-5 bg-[#FFFF] rounded-lg text-sm">
                        <div class="float-right">
                            Filter per minggu : <input type="date" onchange="filterDate()" id="firstDate" name="firstDate" class="lg:me-2 p-1 rounded-lg border-[#15ADA7] border-2">
                        </div>
                        <canvas id="myChart" width="400" height="400"></canvas>
                        <h3 class="font-bold">Hasil </h3>
                        <p>Total perawatan : {{ count($aktivitasId) + count($penangananId) }} </p>
                        <p>Total yang dikerjakan (1 Minggu) : <span id="total_treatment">...</span> </p>
                    </div>
                </div>
            @endif

            <div id="tasks" class="tasks container lg:w-[80%] mx-auto px-4 mb-10 mt-[5px]">
                <div class="judul flex justify-between">
                    <h1 class="font-bold text-sm lg:text-lg">Perawatan</h1>
                </div>
                <div class="container bg-[#FFFF] w-[100%] h-[500px] rounded-lg pb-5 shadow-lg mt-2 overflow-y-auto">
                    <div class="judul flex justify-evenly pt-7 w-[80%] mx-auto">
                        <button class="aktivitas-button" onclick="toggleParent('aktivitas')">
                            <h1 class="text-center">Aktivitas</h1>
                            <hr class="border-aktivitas border-2 border-solid border-[#15ADA7] w-[100px] lg:w-[120px]">
                        </button>
                        <button class="penanganan-button" onclick="toggleParent('penanganan')">
                            <h1>Penanganan</h1>
                            <hr class="border-penanganan border-2 border-solid border-[#15ADA7] w-[100px] lg:w-[120px] inactive">
                        </button>
                    </div>
                    @foreach ($kat_aktivitas as $key => $data_kategori)
                        <div class="parent-aktivitas cursor-pointer">
                            @if (!empty($list_aktivitas))
                                @if (isset($list_aktivitas[$data_kategori->id_kat_aktivitas]))
                                    <div class="task flex mx-auto px-10 lg:px-20 justify-evenly mt-2" onclick="toggleContent('aktivitas', {{ $key }})">
                                        <div class="flex gap-5 w-[100%] mx-auto pt-5">
                                            <div class="gambar">
                                                <img src="images/Logo-apps.png" alt="" class="w-[50px] h-[50px]">
                                            </div>
                                            <div class="deskripsi">
                                                <div class="judul text-sm lg:text-lg">
                                                    <h1>Aktivitas</h1>
                                                </div>
                                                <div class="kategori text-sm lg:text-lg">
                                                    <h3>{{ $data_kategori->nama }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="toggle-button text-sm lg:text-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </div>
                                    <hr class="mt-1 border-1 border-solid  mx-auto w-[80%]">
                                @endif
                                <div id="content{{ $key }}" class="detail-task-aktivitas text-white cursor-pointer">
                                    @if (isset($list_aktivitas[$data_kategori->id_kat_aktivitas]))
                                        @foreach ($list_aktivitas[$data_kategori->id_kat_aktivitas] as $jkey => $data_aktivitas)
                                            <a href="{{ route('detail-aktivitas', ['id' => $data_aktivitas->id_aktivitas]) }}">
                                                <div class="container p-1 w-[80%] mx-auto mt-2 rounded-sm {{ in_array($data_aktivitas->id_aktivitas, $log_aktivitas) ? 'bg-[#2296D1]' : 'bg-[#15ADA7]' }}">
                                                    <div class="flex justify-left gap-10 p-2 items-center">
                                                        <div class="text-sm lg:text-lg">
                                                            {{ $jkey + 1 }}
                                                        </div>
                                                        <div class="deskripsi text-sm lg:text-lg">
                                                            {!! $data_aktivitas->deskripsi !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            @else
                                <img src="images/pasien/empty.svg" alt="" class="width-[150px] h-[150px] mx-auto mt-10">
                                <div class="text-center pt-5"><span class="text-center text-red-500">Data masih
                                        kosong</span>
                                </div>
                            @endif
                        </div>
                        @if (!empty($list_aktivitas))
                        @else
                        @break
                    @endif
                @endforeach
                @foreach ($kat_penanganan as $key => $data_kategori)
                    <div class="parent-penanganan cursor-pointer">
                        @if (!empty($list_penanganan))
                            @if (isset($list_penanganan[$data_kategori->id_kat_penanganan]))
                                <div class="task flex mx-auto px-10 lg:px-20 justify-evenly mt-2" onclick="toggleContent('penanganan', {{ $key }})">
                                    <div class="flex gap-5 w-[100%] mx-auto pt-5">
                                        <div class="gambar">
                                            <img src="images/Logo-apps.png" alt="" class="w-[50px] h-[50px]">
                                        </div>
                                        <div class="deskripsi">
                                            <div class="judul text-sm lg:text-lg">
                                                <h1>Penanganan</h1>
                                            </div>
                                            <div class="kategori text-sm lg:text-lg">
                                                <h3>{{ $data_kategori->nama }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="toggle-button text-sm lg:text-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </div>
                                <hr class="mt-1 border-1 border-solid mx-auto w-[80%]">
                            @endif
                            <div id="content{{ $key }}" class="detail-task-penanganan text-white">
                                @if (isset($list_penanganan[$data_kategori->id_kat_penanganan]))
                                    @foreach ($list_penanganan[$data_kategori->id_kat_penanganan] as $jkey => $data_penanganan)
                                        {{-- @if (!in_array($data_penanganan->id_penanganan, $log_penanganan)) --}}
                                        <a href="{{ route('detail-penanganan', ['id' => $data_penanganan->id_penanganan]) }}">
                                            <div class="container p-1 w-[80%] mx-auto mt-2 rounded-sm {{ in_array($data_penanganan->id_penanganan, $log_penanganan) ? 'bg-[#2296D1]' : 'bg-[#15ADA7]' }}">
                                                <div class="flex justify-left gap-10 p-2 items-center">
                                                    <div class="text-sm lg:text-lg">
                                                        {{ $jkey + 1 }}
                                                    </div>
                                                    <div class="deskripsi text-sm lg:text-lg">
                                                        {!! $data_penanganan->deskripsi !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        {{-- @endif --}}
                                    @endforeach
                                @endif
                            </div>
                        @else
                            <img src="images/pasien/empty.svg" alt="" class="width-[150px] h-[150px] mx-auto mt-10">
                            <div class="text-center pt-5"><span class="text-center text-red-500">Data masih
                                    kosong</span>
                            </div>
                        @endif
                    </div>
                    @if (!empty($list_penanganan))
                    @else
                    @break
                @endif
            @endforeach
        </div>
    </div>

    {{-- end tasks --}}


    <div class="container lg:w-[80%] mx-auto px-4 mb-10 mt-[5px]">
        <div class="judul flex justify-between">
            <h1 class="font-bold text-sm lg:text-lg">Artikel</h1>
            {{-- <a href="{{ route('artikel') }}" class="text-sm lg:text-lg">Lihat Lainnya</a> --}}
        </div>
        @foreach ($artikel as $data)
            @php
                $tanggal = date('d M Y', strtotime($data->created_at));
            @endphp
            <a href="{{ route('detail-artikel', ['id' => $data->id]) }}" class="w-[100%] lg:w-[100%] lg:h-[200px] bg-[#FFFF] rounded-lg h-[120px] flex mt-3 justify-evenly shadow-lg relative">
                <div class="avatar w-[35%] lg:w-[30%] p-3 md:block hidden">
                    <div class="w-full bg-center bg-cover" style="height: -webkit-fill-available; background-image: url('{{ asset(Storage::url("artikel/cover/$data->cover")) }}')"></div>
                </div>
                <div class="deskripsi flex-1 text-sm lg:ps-4 p-3 lg:py-5 py-2">
                    <div class="konten">
                        <h2 class="font-bold text-base lg:text-lg text-[#15ADA7] truncate w-[60vw]">{{ $data->judul }}</h2>
                        <div class="text-md w-[70%] four-lines">
                            {!! $data->deskripsi !!}
                        </div>
                        <p class="text-gray-500 absolute bottom-5">Admin, {{ $tanggal }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <nav class="nav-bottom md:hidden w-[100%] h-[60px] bottom-[0.8rem] fixed z-10 ">
        <ul class="flex justify-evenly items-center h-[60px] bottom-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="me-10">
                    <i class="uil uil-estate text-[30px] text-black"></i>
                </a>
            </li>
            <li>
                <a href="#deskripsi" class="me-10 cursor-pointer" data-modal-target="profileModal" data-modal-toggle="profileModal">
                    <i class="uil uil-chart-bar text-[30px] text-black"></i>
                </a>
            </li>
            <li>
                <a href="#tasks" class="me-10">
                    <i class="uil uil-calendar-alt text-[30px] text-black"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('artikel') }}" class="">
                    <i class="uil uil-newspaper text-[30px] text-black"></i>
                </a>
            </li>
        </ul>
    </nav>

    <div id="pengetahuan-hipertensi" class="modal fixed inset-0 bg-black bg-opacity-50 d-none items-center justify-center">
        <div class="bg-white rounded-lg p-6 max-w-lg w-full shadow-lg transition-transform transform">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Stroke</h2>
            <div class="content">
                <h4 class="font-semibold mt-4 text-lg text-gray-700">Pengertian</h4>
                <p class="text-gray-600 mb-4">Pecah atau terjepit pembuluh darah di otak sehingga menyebabkan kerusakan jaringan otak.</p>

                <h4 class="font-semibold mt-4 text-lg text-gray-700">Tanda dan Gejala</h4>
                <ol class="list-decimal pl-5 text-gray-600">
                    <li class="mb-2">Kelemahan pada wajah, lengan, kaki, terutama pada salah satu sisi tubuh</li>
                    <li class="mb-2">Merasa Bingung</li>
                    <li class="mb-2">Kesulitan Berbicara</li>
                    <li class="mb-2">Gangguan Penglihatan</li>
                    <li class="mb-2">Kesulitan berjalan, pusing, atau kehilangan keseimbangan</li>
                    <li class="mb-2">Tiba-tiba sakit kepala parah</li>
                </ol>

                <h4 class="font-semibold mt-4 text-lg text-gray-700">Pertolongan Pertama</h4>
                <ol class="list-decimal pl-5 text-gray-600">
                    <li class="mb-2">Cari Pertolongan Pertama</li>
                    <li class="mb-2">Sampai 4 jam paska serangan adalah waktu yang sangat penting untuk mengurangi masalah pada tubuh</li>
                    <li class="mb-2">Segera bawa ke RS, Puskesmas atau klinik kesehatan</li>
                </ol>
            </div>
            <div class="flex justify-end mt-6">
                <button id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">Tutup</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Tambahkan library moment.js -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    @if ($pasien)
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart;

            var pasienId = '{{ $pasien->id_pasien }}'

            // Fungsi untuk berdasarkan filter Data
            function fetchData(startDate) {
                $.ajax({
                    url: '/dashboard/get-data-for-chart',
                    method: 'GET',
                    data: {
                        start_date: startDate.toISOString(),
                        id_pasien: pasienId
                    },
                    success: function(data) {
                        // console.log(data);
                        // console.log(data.weekDayValues); // [0,0,2,0,0,0,0]

                        // Hancurkan objek Chart jika sudah ada
                        if (myChart) {
                            myChart.destroy();
                        }

                        // Buat objek Chart yang baru
                        // const hariIndonesia = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: data.weekDayNames, // Menggunakan nama hari dalam bahasa Indonesia
                                datasets: [{
                                    label: 'Jumlah Perawatan Selesai',
                                    data: data.weekDayValues,
                                    backgroundColor: 'rgba(34, 150, 209, 0.7)',
                                    borderColor: 'rgba(34, 150, 209, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                scales: {
                                    x: {
                                        beginAtZero: true
                                    },
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1
                                        }
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Grafik Histori Perawatan'
                                },
                                legend: {
                                    display: true,
                                    position: 'top'
                                },
                                tooltips: {
                                    mode: 'index',
                                    intersect: false
                                }
                            }
                        });


                        $('#total_treatment').html(data.total_treatment)
                        // console.log(data.total_treatment);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Event listener for filter button click
            function filterDate() {
                var startDate = new Date($('#firstDate').val());

                // Fetch data for the selected week
                fetchData(startDate);
            };

            fetchData(new Date());
        </script>
    @endif

    <script>
        $(document).ready(function() {
            // Menampilkan modal saat tombol dibuka diklik
            $('.modal-button').click(function() {
                let target = $(this).data('modal-target');

                // Merubah d-none jadi flex
                $(target).removeClass('d-none');
                $(target).addClass('flex');
                $(target).fadeIn();
            });

            // Menutup modal saat tombol tutup diklik
            $('#closeModal').click(function() {
                $('.modal').fadeOut();
            });

            // Menutup modal saat area di luar modal diklik
            $('.modal').click(function(event) {
                if ($(event.target).is('.modal')) {
                    $('.modal').fadeOut();
                }
            });
        });
    </script>

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

        // const tambahPasien = document.querySelector('.tambah-pasien');
        // tambahPasien.addEventListener("click", function() {
        //     window.location.href = '/pasien';
        // })

        let logo = document.querySelector('#profile');
        let dropdownProfile = document.querySelector('.dropdown-profile');

        logo.addEventListener('click', function() {
            dropdownProfile.classList.toggle('inactive');
        });

        function logout() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Jangan lupa untuk kembali lagi",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
            });
        }


        function profile() {
            window.location.href = '/profile';
        }

        function toggleParent(type) {
            var aktivitasParents = document.querySelectorAll('.parent-aktivitas');
            var penangananParents = document.querySelectorAll('.parent-penanganan');

            let borderAktivitas = document.querySelector('.border-aktivitas');
            let borderPenanganan = document.querySelector('.border-penanganan');

            if (type === 'aktivitas') {

                aktivitasParents.forEach(function(parent) {
                    parent.classList.add('active');
                    parent.classList.remove('inactive');
                    borderAktivitas.classList.add('active');
                    borderAktivitas.classList.remove('inactive');
                });
                penangananParents.forEach(function(parent) {
                    parent.classList.remove('active');
                    parent.classList.add('inactive');
                    borderPenanganan.classList.remove('active');
                    borderPenanganan.classList.add('inactive');
                });
            } else if (type === 'penanganan') {
                penangananParents.forEach(function(parent) {
                    parent.classList.add('active');
                    parent.classList.remove('inactive');
                    borderPenanganan.classList.add('active');
                    borderPenanganan.classList.remove('inactive');
                });
                aktivitasParents.forEach(function(parent) {
                    parent.classList.remove('active');
                    parent.classList.add('inactive');
                    borderAktivitas.classList.remove('active');
                    borderAktivitas.classList.add('inactive');
                });
            }
        }

        function toggleContent(type, index) {
            var aktivitasContents = document.querySelectorAll('.detail-task-aktivitas');
            var penangananContents = document.querySelectorAll('.detail-task-penanganan');

            if (type === 'aktivitas') {
                aktivitasContents[index].classList.toggle('active');
            } else if (type === 'penanganan') {
                penangananContents[index].classList.toggle('active');
            }
        }

        // Menambahkan event listener untuk tombol pada carousel
        // $('.main-carousel').on('select.flickity', function(event, index) {
        //     // Menonaktifkan semua konten ketika slider berpindah
        //     contents.forEach(function(content) {
        //         content.classList.remove('active');
        //     });

        //     // Mengaktifkan konten yang sesuai dengan indeks slider
        //     contents[index].classList.add('active');
        // });
    </script>
</body>

</html>
