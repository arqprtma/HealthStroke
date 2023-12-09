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
    <div class="bg-auto bg-cover bg-left-top bg-no-repeat -mt-4" id="bg-blub">
        <div class="navigasi container lg:w-[80%] mx-auto pt-10 pb-7 px-5">
            <div class="navbar flex justify-between h-[20px]">
                <div class="alert flex gap-2 box-border">
                    <h1 class="font-bold">Hi, </h1><span>{{ auth()->user()->nama }}</span>
                </div>
                <div class="logo box-border relative">
                    <img src="{{ asset('images/User.png') }}" alt="logo" class="w-[30px] h-[30px]" id="profile" data-target="#profile-admin">
                    <div id="profile-admin" class="w-[13vw] h-auto bg-white absolute right-0 top-10 rounded shadow-lg py-2 px-4 hidden">
                        <ul>
                            <li onclick="logout()" class="cursor-pointer font-bold text-red-500">Logout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container lg:w-[80%] mx-auto pt-10 pb-7 px-5">
            <h2 class="text-left font-bold text-black lg:text-xl text-base mb-2">Dashboard</h2>
            <div class="flex align-items-center flex-nowrap flex-row">
                <div class="w-[50%] h-auto lg:py-12 py-7 mx-1 bg-[#15ADA7] shadow-md flex items-center justify-center flex-col rounded">
                    <h3 class="text-center lg:text-4xl text-xl font-bold text-white">130</h3>
                    <span class="text-center lg:text-lg text-sm font-medium text-white">Pengguna</span>
                </div>
                <div class="w-[50%] h-auto lg:py-12 py-7 mx-1 bg-[#2296D1] shadow-md flex items-center justify-center flex-col rounded">
                    <h3 class="text-center lg:text-4xl text-xl font-bold text-white">120</h3>
                    <span class="text-center lg:text-lg text-sm font-medium text-white">Pasien Stroke</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container lg:w-[80%] mx-auto pb-7 px-5">
        <section id="presentase">
            <h2 class="text-left font-bold text-black lg:text-xl text-base mb-2">Presentase pemicu stroke</h2>
            <div class="bg-[#FFFFFF] p-5 rounded shadow-md">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </section>
        <section id="menu" class="mt-8">
            <h2 class="text-left font-bold text-black lg:text-xl text-base mb-2">Kelola Layanan</h2>
            <div class="grid lg:grid-rows-1 md:grid-rows-2 grid-rows-4 grid-flow-col gap-4">
                <a href="#" class="w-full">
                    <button class="px-5 py-3 bg-[#15ADA7] hover:bg-[#0FA7A1] w-full text-white rounded text-left flex align-center">
                        <img class="inline-block me-2 h-[22px]" src="{{ asset('images/admin/icons/Pemicu.png') }}" alt="Pemicu"> Pemicu
                    </button>
                </a>
                <a href="#" class="w-full">
                    <button class="px-5 py-3 bg-[#15ADA7] hover:bg-[#0FA7A1] w-full text-white rounded text-left flex align-center">
                        <img class="inline-block me-2 h-[22px]" src="{{ asset('images/admin/icons/Blog.png') }}" alt="Blog"> Artikel
                    </button>
                </a>
                <a href="#" class="w-full">
                    <button class="px-5 py-3 bg-[#15ADA7] hover:bg-[#0FA7A1] w-full text-white rounded text-left flex align-center"> 
                        <img class="inline-block me-2 h-[22px]" src="{{ asset('images/admin/icons/Aktivitas.png') }}" alt="Aktivitas"> Aktivitas
                    </button>
                </a>
                <a href="#" class="w-full">
                    <button class="px-5 py-3 bg-[#15ADA7] hover:bg-[#0FA7A1] w-full text-white rounded text-left flex align-center">
                        <img class="inline-block me-2 h-[22px]" src="{{ asset('images/admin/icons/Penanganan.png') }}" alt="Penanganan"> Penanganan
                    </button>
                </a>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Responsive background Image -->
    <script>
        if ($(window).width() < 768) {
            $('#bg-blub').css('background-image', 'url("/images/bg-mobile.png")');
            $('#bg-blub').css('background-position', 'center -50px');
        } else if($(window).width() < 992) {
            $('#bg-blub').css('background-image', 'url("/images/bg-tablet.png")');
            $('#bg-blub').css('background-position', 'center -20px');
        } else {
            $('#bg-blub').css('background-image', 'url("/images/bg-desktop.png")');
            $('#bg-blub').css('background-position', 'center -20px');
        }
    </script>

    <!-- Chart -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Label 1', 'Label 2', 'Label 3'],
                datasets: [{
                    label: 'Dataset Label',
                    data: [10, 20, 30],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // membuat grafik responsif
                maintainAspectRatio: false, // mempertahankan rasio aspek, terutama ketika lebar dan tinggi canvas diatur melalui HTML atau CSS
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                title: {
                    display: true,
                    text: 'Grafik Contoh'
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
    </script>

    <!-- Popup Navbar -->
    <script>
        $('#profile').on('click', function () {
            var data_target = $(this).data('target')
            
            if($(data_target).hasClass('hidden')){
                $(data_target).removeClass('hidden')
            }else{
                $(data_target).addClass('hidden')
            }
        })
    </script>

    <!-- Logout -->
    <script>
        // LOGOUT
        function logout() {
            window.location.href = '/logout';
        }
    </script>
</body>

</html>
