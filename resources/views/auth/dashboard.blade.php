<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="/path/to/flickity.css" media="screen">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <title>{{ $title }}</title>
    <style>
        .carousel-cell {
            width: 66%;
            margin-right: 10px;
            background: #FFFF;
            border-radius: 5px;
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

        .flickity-prev-next-button {
            display: none;
        }

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

<body class="bg-[#F8F8FF] h-[2500px]">
    <div class="bg-auto bg-cover bg-left-top bg-no-repeat pt-10 lg:h-[356px] h-[350px]" id="bg-blub">

        <div class="navigasi container lg:w-[80%] mx-auto px-4">
            <div class="navbar flex justify-between h-[20px]">
                <div class="alert flex gap-2 box-border">
                    <h1 class="font-bold">Hi, </h1><span>{{ auth()->user()->nama }}</span>
                </div>
                <div class="logo box-border cursor-pointer" id="profile">
                    <img src="/images/Logo-apps.png" alt="logo" class="w-[50px] h-[50px] mt-[-15px]">
                </div>
            </div>
            <div
                class="dropdown-profile lg:w-[10vw] w-[22vw] h-auto bg-white absolute lg:right-40 right-5 top-20 rounded shadow-lg py-2 px-4 inactive">
                <ul>
                    <li onclick="logout()" class="cursor-pointer font-bold text-red-500">Logout</li>
                </ul>
            </div>
        </div>
        <div class="pasien container lg:w-[80%]  mx-auto px-4 pt-10">
            <div class="container-card-pasien mt-10">
                <div class="components-pasien flex justify-between">
                    <h1 class="font-bold text-sm lg:text-lg ">Daftar Pasien</h1>
                    <button
                        class="tambah-pasien bg-[#15ADA7] text-sm lg:text-lg rounded-md w-[70px] lg:w-[100px] h-[30px] text-white shadow-md hover:border-2 hover:border-[#15ADA7] hover:bg-[#FFFF] hover:text-[#15ADA7]">Tambah</button>
                </div>
            </div>
            <div class="card-pasien mt-5">
                @if ($pasien->isNotEmpty())
                    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                        @foreach ($pasien as $item)
                            <div
                                class="carousel-pasien carousel-cell w-[100%] lg:w-[66%] lg:h-[200px] h-[150px] flex m-2 justify-evenly shadow-md ">
                                <div
                                    class="avatar w-[30%] lg:w-[30%] lg:w-[30%] bg-[#15ADA7] flex-1.2 flex justify-center items-center">
                                    <img src="/images/Logo-apps.png" alt=""
                                        class="w-[50px] h-[50px] lg:w-[100px] lg:h-[100px] ">
                                </div>
                                <div class="deskripsi flex-1 text-sm">
                                    <a href={{ route('pasien.update', $item->id_pasien) }}
                                        class="bg-[#2296D1] lg:w-[70px] lg:h-[30px] float-right mt-2 me-3 text-white lg:rounded-lg lg:text-lg text-center text-[12px] rounded ps-2 pe-2">Edit
                                    </a>
                                    <div class="nama flex mt-2 ">
                                        <p
                                            class=" text-[12px] h-[20px] lg:h-[35px] lg:text-xl font-bold mt-10 ms-2 lg:ms-10 overflow-hidden">
                                            {{ $item->nama }}

                                        </p>
                                        @if ($item->gender == 'L')
                                            <img src="images/male.png" alt=""
                                                class="w-[10px] h-[10px] lg:w-[20px] lg:h-[20px] ms-1 lg:ms-2 mt-10 lg:mt-8">
                                        @elseif ($item->gender == 'P')
                                            <img src="images/female.png" alt=""
                                                class="w-[10px] h-[10px] lg:w-[20px] lg:h-[20px] ms-1 lg:ms-2 mt-10 lg:mt-8">
                                        @endif

                                    </div>
                                    <div class="progress-bar">
                                        <div class="bar-aktivitas">
                                            <h3 class="text-[10px] lg:text-lg ms-2 lg:ms-10 ">Aktivitas dan Treatment
                                            </h3>
                                            <div
                                                class="step float-right mt-[-21px] lg:mt-[-25px] me-[40px] lg:me-[60px] text-[10px] lg:text-[14px]">
                                                0/{{ $aktivitasId ? count($aktivitasId) : 0 }}
                                            </div>
                                            <div
                                                class="w-[80%] ms-2 lg:ms-10 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                <div class="bg-[#15ADA7] h-2.5 rounded-full" style="width: 45%"></div>
                                            </div>
                                        </div>
                                        <div class="bar-penanganan mt-1 lg:mt-2">
                                            <h3 class="text-[10px] lg:text-lg ms-2 lg:ms-10 ">Penanganan</h3>
                                            <div
                                                class="step float-right mt-[-21px] lg:mt-[-25px] me-[40px] lg:me-[60px] text-[10px] lg:text-[14px]">
                                                0/{{ $penangananId ? count($penangananId) : 0 }}
                                            </div>
                                            <div
                                                class="w-[80%] ms-2 lg:ms-10 bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                                <div class="bg-[#15ADA7] h-2.5 rounded-full" style="width: 55%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @else
                    <img src="images/pasien/empty.svg" alt="" class="width-[150px] h-[150px] mx-auto mt-10">
                    <div class="text-center pt-5"><span class="text-center text-red-500">Data masih kosong</span>
                    </div>
                @endif
            </div>
        </div>


        <div class="deskripsi container lg:w-[80%] mx-auto px-4 mb-10 mt-[50px]">
            <h1 class="font-bold text-sm lg:text-lg mb-2">Hasil treatment yang dikerjakan</h1>
            <div class="lg:w-[100%] w-[100%] mx-auto top-12 p-5 bg-[#FFFF] rounded-lg text-sm">
                <div class="float-right">
                    Filter per minggu : <input type="date" onchange="filterDate()" id="firstDate" name="firstDate"
                        class="lg:me-2 p-1 rounded-lg border-[#15ADA7] border-2">
                    <input type="date" onchange="filterDate()" id="endDate" name="endDate"
                        class="p-1 rounded-lg border-[#15ADA7] border-2 p-1">
                </div>
                <canvas id="myChart" class="lg:w-[100%] h-[50%]"></canvas>
                <h3>Hasil </h3>
                <p>Total treatment : 42 </p>
                <p>Total yang dikerjakan : 35 </p>
            </div>
        </div>

        <div class="tasks container lg:w-[80%] mx-auto px-4 mb-10 mt-[5px]">
            <div class="judul flex justify-between">
                <h1 class="font-bold text-sm lg:text-lg">Aktivitas Penanganan</h1>
                <a href="" class="text-sm lg:text-lg">Lihat Lainnya</a>
            </div>
            <div class="container bg-[#FFFF] w-[100%] h-[500px] rounded-lg pb-5 shadow-lg mt-2 overflow-y-scroll">
                <div class="judul flex justify-evenly pt-7 w-[80%] mx-auto">
                    <button class="aktivitas-button" onclick="toggleParent('aktivitas')">
                        <h1 class="text-center">Aktivitas</h1>
                        <hr class="border-aktivitas border-2 border-solid border-[#15ADA7] w-[100px] lg:w-[120px]">
                    </button>
                    <button class="penanganan-button" onclick="toggleParent('penanganan')">
                        <h1>Penanganan</h1>
                        <hr
                            class="border-penanganan border-2 border-solid border-[#15ADA7] w-[100px] lg:w-[120px] inactive">
                    </button>
                </div>
                @foreach ($kat_aktivitas as $key => $data_kategori)
                    <div class="parent-aktivitas">
                        @if (!empty($list_aktivitas))
                            @if (isset($list_aktivitas[$data_kategori->id_kat_aktivitas]))
                                <div class="task flex w-[80%] mx-auto justify-evenly mt-2">
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
                                    <button class="toggle-button text-sm lg:text-lg"
                                        onclick="toggleContent('aktivitas', {{ $key }})">Tampilkan Konten
                                        {{ $key }}</button>
                                </div>
                                <hr class="mt-1 border-1 border-solid  mx-auto w-[80%]">
                            @endif
                            <div id="content{{ $key }}"
                                class="detail-task-aktivitas text-white cursor-pointer">
                                @if (isset($list_aktivitas[$data_kategori->id_kat_aktivitas]))
                                    @foreach ($list_aktivitas[$data_kategori->id_kat_aktivitas] as $jkey => $data_aktivitas)
                                        <a
                                            href="{{ route('detail-aktivitas', ['id' => $data_aktivitas->id_aktivitas]) }}">
                                            <div class="container p-1 w-[80%] mx-auto mt-2 rounded-sm bg-[#15ADA7]">
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
                            <img src="images/pasien/empty.svg" alt=""
                                class="width-[150px] h-[150px] mx-auto mt-10">
                            <div class="text-center pt-5"><span class="text-center text-red-500">Data masih
                                    kosong</span>
                            </div>
                        @break
                    @endif
                </div>
            @endforeach
            @foreach ($kat_penanganan as $key => $data_kategori)
                <div class="parent-penanganan">
                    @if (!empty($list_penanganan))
                        @if (isset($list_penanganan[$data_kategori->id_kat_penanganan]))
                            <div class="task flex w-[80%] mx-auto justify-evenly mt-2">
                                <div class="flex gap-5 w-[100%] mx-auto pt-5">
                                    <div class="gambar">
                                        <img src="images/Logo-apps.png" alt="" class="w-[50px] h-[50px]">
                                    </div>
                                    <div class="deskripsi">
                                        <div class="judul text-sm lg:text-lg">
                                            <h1>Penanganan</h1>
                                        </div>
                                        <div class="kategori text-sm lg:text-lg">
                                            <h3>Makanan dan Minuman</h3>
                                        </div>
                                    </div>
                                </div>
                                <button class="toggle-button text-sm lg:text-lg"
                                    onclick="toggleContent('penanganan', {{ $key }})">Tampilkan Konten
                                    {{ $key }}</button>
                            </div>
                            <hr class="mt-1 border-1 border-solid mx-auto w-[80%]">
                        @endif
                        <div id="content{{ $key }}" class="detail-task-penanganan text-white">
                            @if (isset($list_penanganan[$data_kategori->id_kat_penanganan]))
                                @foreach ($list_penanganan[$data_kategori->id_kat_penanganan] as $jkey => $data_penanganan)
                                    <a
                                        href="{{ route('detail-penanganan', ['id' => $data_penanganan->id_penanganan]) }}">
                                        <div class="container p-1 w-[80%] mx-auto mt-2 rounded-sm bg-[#15ADA7]">
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
                                @endforeach
                            @endif
                        </div>
                    @else
                        <img src="images/pasien/empty.svg" alt=""
                            class="width-[150px] h-[150px] mx-auto mt-10">
                        <div class="text-center pt-5"><span class="text-center text-red-500">Data masih
                                kosong</span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    {{-- end tasks --}}


    <div class="container lg:w-[80%] w-[95%] berita mx-auto mt-3">
        <div class="judul flex justify-between">
            <h1 class="font-bold text-sm lg:text-lg">Berita Terkini</h1>
            <a href="" class="text-sm lg:text-lg">Lihat Lainnya</a>
        </div>
        @foreach ($artikel as $data)
            <a href="{{ route('detail-artikel', ['id' => $data->id]) }}"
                class=" w-[100%] lg:w-[100%] lg:h-[200px] bg-[#FFFF] rounded-lg h-[120px] flex mt-3 justify-evenly shadow-lg">
                <div class="avatar w-[35%] lg:w-[30%] p-3">
                    <div class="w-full bg-center bg-cover"
                        style="height: -webkit-fill-available;background-image: url({{ asset(Storage::url('public/artikel/cover/' . $data->cover)) }})">
                    </div>
                    {{-- <img src="{{ asset(Storage::url("public/artikel/cover/$data->cover")) }}" alt="Cover {{ $data->id }}"
                        class="ms-2 w-[100px] h-[100px] lg:w-[200px] lg:h-[150px]"> --}}
                </div>
                <div class="deskripsi flex-1 text-sm lg:ps-4 ps-2 lg:py-5 py-2">
                    <div class="konten">
                        <h1 class="font-bold text-lg text-[#15ADA7]">
                            {{ $data->judul }}
                        </h1>
                        <div class="text-md w-[70%] h-[41px] lg:h-[60px] overflow-hidden">
                            {!! $data->deskripsi !!}
                        </div>
                        <p class="text-gray-500">Admin,
                            {{ Carbon\Carbon::parse($data->create_at)->format('d M Y') }}
                        </p>
                    </div>

                </div>

            </a>
        @endforeach

    </div>
    <nav class="nav-bottom md:hidden w-[100%] h-[60px] bottom-[0.8rem] fixed z-10 ">
        <ul class="flex justify-center items-center h-[60px] bottom-menu">
            <li>
                <a href="" class="me-10">
                    <i class="uil uil-estate text-[30px] text-black"></i>
                </a>
            </li>
            <li>
                <a type="button" class="me-10 cursor-pointer" data-modal-target="profileModal"
                    data-modal-toggle="profileModal">
                    <i class="uil uil-user text-[30px] text-black"></i>
                </a>
            </li>
            <li>
                <a href="" class="">
                    <i class="uil uil-chart-bar text-[30px] text-black"></i>
                </a>
            </li>

        </ul>
    </nav>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    {{-- <script src="/path/to/flickity.pkgd.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Tambahkan library moment.js -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <script>
        function filterDate() {
            // Mendapatkan nilai dari input tanggal
            var startDate = document.getElementById('firstDate').value;

            // Mendapatkan nilai maksimal untuk endDate (7 hari setelah startDate, termasuk startDate)
            var maxEndDate = new Date(startDate);
            maxEndDate.setDate(maxEndDate.getDate() + 6); // 6 hari tambahan untuk total 7 hari
            var endDateInput = document.getElementById('endDate');
            endDateInput.max = maxEndDate.toISOString().slice(0, 10);

            // Mendapatkan nilai dari input endDate
            var endDate = endDateInput.value;

            // Menghasilkan array hari sesuai dengan rentang waktu
            var dayArray = getDays(startDate, endDate);

            // Mengganti data pada chart dengan data baru
            myChart.data.labels = dayArray;
            myChart.update();
        }

        function getDays(startDate, endDate) {
            var dayArray = [];
            var currentDate = new Date(startDate);
            var endDateObj = new Date(endDate);

            while (currentDate <= endDateObj) {
                // Menggunakan moment.js untuk mendapatkan nama hari dalam Bahasa Indonesia
                var dayName = moment(currentDate).locale('id').format('dddd');

                // Menambahkan nama hari ke dalam array
                dayArray.push(dayName);

                // Melanjutkan ke hari berikutnya
                currentDate.setDate(currentDate.getDate() + 1);
            }

            return dayArray;
        }

        // Inisialisasi Chart
        const ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [], // Label awal kosong
                datasets: [{
                    label: 'Riwayat treatment pasien mingguan',
                    data: [6, 4, 2, 4, 3, 2, 5],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Set nilai maksimal awal saat halaman dimuat
        filterDate();
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

        const tambahPasien = document.querySelector('.tambah-pasien');
        tambahPasien.addEventListener("click", function() {
            window.location.href = '/pasien';
        })

        let logo = document.querySelector('.logo');
        let dropdownProfile = document.querySelector('.dropdown-profile');

        logo.addEventListener('click', function() {
            dropdownProfile.classList.toggle('inactive');
        });


        // LOGOUT
        function logout() {
            window.location.href = '/logout';
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
        $('.main-carousel').on('select.flickity', function(event, index) {
            // Menonaktifkan semua konten ketika slider berpindah
            contents.forEach(function(content) {
                content.classList.remove('active');
            });

            // Mengaktifkan konten yang sesuai dengan indeks slider
            contents[index].classList.add('active');
        });
    </script>
</body>

</html>
