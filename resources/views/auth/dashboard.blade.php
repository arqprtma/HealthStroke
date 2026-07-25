@extends('layouts.app')

@section('title', $title ?? 'Dashboard | StrokeCare')
@section('topbar', 'Beranda')

@push('styles')
<style>
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
@endpush

@section('content')
    {{-- Sapaan --}}
    <section class="mb-6 flex items-center justify-between rounded-2xl bg-primary p-5 text-white shadow-sm">
        <div class="min-w-0">
            <p class="text-sm opacity-90">Selamat datang,</p>
            <h1 class="truncate text-lg font-bold">{{ auth()->user()->nama }}</h1>
        </div>
        <a href="{{ route('profile') }}" aria-label="Profil" class="shrink-0">
            <img src="{{ asset(auth()->user()->gender == 'P' ? 'images/pasien/woman.png' : 'images/pasien/man.png') }}"
                 alt="Profil" class="h-12 w-12 rounded-full bg-white/20 object-contain p-1 transition hover:bg-white/30">
        </a>
    </section>

    {{-- Daftar Pasien --}}
    <section class="mb-8">
        <div class="mb-3 flex items-center justify-between">
            <h2 class="text-base font-bold text-gray-800">Daftar Pasien</h2>
            @if (!$pasien)
                <a href="{{ route('pasien') }}" class="btn-primary !w-auto px-4 text-sm">+ Tambah</a>
            @endif
        </div>

        @if ($pasien)
            @php
                $countAktivitasId = $aktivitasId ? count($aktivitasId) : 0;
                $countPenangananId = $penangananId ? count($penangananId) : 0;
                $percentAktivitas = $countAktivitasId !== 0 ? (count($log_aktivitas) / $countAktivitasId) * 100 : 0;
                $percentPenanganan = $countPenangananId !== 0 ? (count($log_penanganan) / $countPenangananId) * 100 : 0;
            @endphp
            <div class="flex overflow-hidden rounded-2xl bg-white shadow-sm">
                <div class="flex w-24 shrink-0 items-center justify-center bg-primary sm:w-32">
                    <img src="{{ asset('images/Logo-apps.png') }}" alt="" class="h-14 w-14 object-contain sm:h-20 sm:w-20">
                </div>
                <div class="min-w-0 flex-1 p-4">
                    <div class="flex items-start justify-between gap-2">
                        <div class="flex min-w-0 items-center gap-1.5">
                            <h3 class="truncate font-bold text-gray-800">{{ $pasien->nama }}</h3>
                            @if ($pasien->gender == 'L')
                                <img src="{{ asset('images/male.png') }}" alt="Laki-laki" class="h-3.5 w-3.5 shrink-0">
                            @elseif ($pasien->gender == 'P')
                                <img src="{{ asset('images/female.png') }}" alt="Perempuan" class="h-3.5 w-3.5 shrink-0">
                            @endif
                        </div>
                        <a href="{{ route('pasien.update', $pasien->id_pasien) }}"
                           class="shrink-0 rounded-lg bg-[#2296D1] px-3 py-1 text-xs font-semibold text-white transition hover:opacity-90">Edit</a>
                    </div>

                    {{-- Progress hari ini --}}
                    <div class="mt-3 space-y-2">
                        <div>
                            <div class="mb-1 flex items-center justify-between text-xs text-gray-500">
                                <span>Aktivitas</span>
                                <span>{{ count($log_aktivitas) }}/{{ $countAktivitasId }}</span>
                            </div>
                            <div class="h-2.5 w-full rounded-full bg-gray-200">
                                <div class="h-2.5 rounded-full bg-primary" style="width: {{ $percentAktivitas }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1 flex items-center justify-between text-xs text-gray-500">
                                <span>Penanganan</span>
                                <span>{{ count($log_penanganan) }}/{{ $countPenangananId }}</span>
                            </div>
                            <div class="h-2.5 w-full rounded-full bg-gray-200">
                                <div class="h-2.5 rounded-full bg-primary" style="width: {{ $percentPenanganan }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="rounded-2xl bg-white p-8 text-center shadow-sm">
                <img src="{{ asset('images/pasien/empty.svg') }}" alt="" class="mx-auto h-28 w-28">
                <p class="mt-3 text-sm text-red-500">Data masih kosong</p>
            </div>
        @endif
    </section>

    {{-- Pengetahuan --}}
    <section id="pengetahuan" class="mb-8">
        <h2 class="mb-3 text-base font-bold text-gray-800">Pengetahuan</h2>
        <div class="modal-button cursor-pointer rounded-2xl bg-white p-5 shadow-sm transition hover:shadow-md"
             data-modal-target="#pengetahuan-hipertensi">
            <h3 class="mb-1 text-lg font-bold text-primary">Stroke</h3>
            <p class="two-lines text-sm text-gray-600">
                Pecah atau terjepit pembuluh darah di otak sehingga menyebabkan kerusakan jaringan otak
            </p>
            <span class="mt-2 inline-block text-xs font-semibold text-accent">Baca selengkapnya &rarr;</span>
        </div>
    </section>

    {{-- Chart hasil perawatan --}}
    @if ($pasien)
        <section id="deskripsi" class="mb-8">
            <h2 class="mb-3 text-base font-bold text-gray-800">Hasil perawatan yang dikerjakan</h2>
            <div class="rounded-2xl bg-white p-5 shadow-sm">
                <div class="mb-3 flex flex-wrap items-center justify-between gap-2 text-sm text-gray-600">
                    <span class="font-semibold">Filter per minggu</span>
                    <input type="date" onchange="filterDate()" id="firstDate" name="firstDate"
                           class="rounded-xl border border-gray-200 px-3 py-1.5 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
                </div>
                <div class="relative h-64 w-full sm:h-80">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="mt-4 grid grid-cols-2 gap-3 text-center">
                    <div class="rounded-xl bg-primary/5 p-3">
                        <p class="text-lg font-bold text-primary">{{ count($aktivitasId) + count($penangananId) }}</p>
                        <p class="text-xs text-gray-500">Total perawatan</p>
                    </div>
                    <div class="rounded-xl bg-primary/5 p-3">
                        <p class="text-lg font-bold text-primary" id="total_treatment">...</p>
                        <p class="text-xs text-gray-500">Dikerjakan (1 minggu)</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Perawatan (tab Aktivitas / Penanganan) --}}
    <section id="tasks" class="mb-8">
        <h2 class="mb-3 text-base font-bold text-gray-800">Perawatan</h2>
        <div class="max-h-[500px] overflow-y-auto rounded-2xl bg-white pb-5 shadow-sm">
            <div class="sticky top-0 z-10 flex justify-evenly gap-2 bg-white px-4 pt-5">
                <button class="aktivitas-button pb-1 text-sm font-semibold text-gray-700" onclick="toggleParent('aktivitas')">
                    Aktivitas
                    <hr class="border-aktivitas mt-1 rounded-full border-2 border-solid border-primary">
                </button>
                <button class="penanganan-button pb-1 text-sm font-semibold text-gray-700" onclick="toggleParent('penanganan')">
                    Penanganan
                    <hr class="border-penanganan inactive mt-1 rounded-full border-2 border-solid border-primary">
                </button>
            </div>

            @foreach ($kat_aktivitas as $key => $data_kategori)
                <div class="parent-aktivitas cursor-pointer">
                    @if (!empty($list_aktivitas))
                        @if (isset($list_aktivitas[$data_kategori->id_kat_aktivitas]))
                            <div class="task mx-auto flex w-[92%] items-center justify-between gap-3 pt-4"
                                 onclick="toggleContent('aktivitas', {{ $key }})">
                                <div class="flex min-w-0 items-center gap-3">
                                    <img src="{{ asset('images/Logo-apps.png') }}" alt="" class="h-10 w-10 shrink-0 object-contain">
                                    <div class="min-w-0">
                                        <p class="text-xs text-gray-400">Aktivitas</p>
                                        <h3 class="truncate text-sm font-semibold text-gray-800">{{ $data_kategori->nama }}</h3>
                                    </div>
                                </div>
                                <button class="toggle-button shrink-0 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </div>
                            <hr class="mx-auto mt-3 w-[92%] border-gray-100">
                        @endif
                        <div id="content{{ $key }}" class="detail-task-aktivitas cursor-pointer text-white">
                            @if (isset($list_aktivitas[$data_kategori->id_kat_aktivitas]))
                                @foreach ($list_aktivitas[$data_kategori->id_kat_aktivitas] as $jkey => $data_aktivitas)
                                    <a href="{{ route('detail-aktivitas', ['id' => $data_aktivitas->id_aktivitas]) }}">
                                        <div class="mx-auto mt-2 w-[92%] rounded-xl p-1 transition hover:opacity-90 {{ in_array($data_aktivitas->id_aktivitas, $log_aktivitas) ? 'bg-[#2296D1]' : 'bg-primary' }}">
                                            <div class="flex items-center gap-4 p-2 text-sm">
                                                <span class="shrink-0 font-bold">{{ $jkey + 1 }}</span>
                                                <div class="deskripsi min-w-0 truncate">{{ previewText($data_aktivitas->deskripsi, 70) }}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    @else
                        <img src="{{ asset('images/pasien/empty.svg') }}" alt="" class="mx-auto mt-10 h-28 w-28">
                        <div class="pt-5 text-center"><span class="text-sm text-red-500">Data masih kosong</span></div>
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
                            <div class="task mx-auto flex w-[92%] items-center justify-between gap-3 pt-4"
                                 onclick="toggleContent('penanganan', {{ $key }})">
                                <div class="flex min-w-0 items-center gap-3">
                                    <img src="{{ asset('images/Logo-apps.png') }}" alt="" class="h-10 w-10 shrink-0 object-contain">
                                    <div class="min-w-0">
                                        <p class="text-xs text-gray-400">Penanganan</p>
                                        <h3 class="truncate text-sm font-semibold text-gray-800">{{ $data_kategori->nama }}</h3>
                                    </div>
                                </div>
                                <button class="toggle-button shrink-0 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </div>
                            <hr class="mx-auto mt-3 w-[92%] border-gray-100">
                        @endif
                        <div id="content{{ $key }}" class="detail-task-penanganan text-white">
                            @if (isset($list_penanganan[$data_kategori->id_kat_penanganan]))
                                @foreach ($list_penanganan[$data_kategori->id_kat_penanganan] as $jkey => $data_penanganan)
                                    <a href="{{ route('detail-penanganan', ['id' => $data_penanganan->id_penanganan]) }}">
                                        <div class="mx-auto mt-2 w-[92%] rounded-xl p-1 transition hover:opacity-90 {{ in_array($data_penanganan->id_penanganan, $log_penanganan) ? 'bg-[#2296D1]' : 'bg-primary' }}">
                                            <div class="flex items-center gap-4 p-2 text-sm">
                                                <span class="shrink-0 font-bold">{{ $jkey + 1 }}</span>
                                                <div class="deskripsi min-w-0 truncate">{{ previewText($data_penanganan->deskripsi, 70) }}</div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    @else
                        <img src="{{ asset('images/pasien/empty.svg') }}" alt="" class="mx-auto mt-10 h-28 w-28">
                        <div class="pt-5 text-center"><span class="text-sm text-red-500">Data masih kosong</span></div>
                    @endif
                </div>
                @if (!empty($list_penanganan))
                @else
                    @break
                @endif
            @endforeach
        </div>
    </section>

    {{-- Artikel --}}
    <section class="mb-8">
        <div class="mb-3 flex items-center justify-between">
            <h2 class="text-base font-bold text-gray-800">Artikel</h2>
            <a href="{{ route('artikel') }}" class="text-sm font-semibold text-accent hover:underline">Lihat semua</a>
        </div>
        <div class="space-y-3">
            @forelse ($artikel as $data)
                @php
                    $tanggal = date('d M Y', strtotime($data->created_at));
                @endphp
                <a href="{{ route('detail-artikel', ['id' => $data->id]) }}"
                   class="flex items-stretch gap-0 overflow-hidden rounded-2xl bg-white shadow-sm transition hover:shadow-md">
                    <div class="hidden w-32 shrink-0 bg-cover bg-center md:block"
                         style="background-image: url('{{ asset(Storage::url("artikel/cover/$data->cover")) }}')"></div>
                    <div class="min-w-0 flex-1 p-4">
                        <h3 class="truncate font-bold text-primary">{{ $data->judul }}</h3>
                        <div class="two-lines mt-1 text-sm text-gray-500">{!! $data->deskripsi !!}</div>
                        <p class="mt-2 text-xs text-gray-400">Admin &middot; {{ $tanggal }}</p>
                    </div>
                </a>
            @empty
                <p class="rounded-2xl bg-white p-6 text-center text-sm text-gray-400 shadow-sm">Belum ada artikel.</p>
            @endforelse
        </div>
    </section>

    {{-- Modal Pengetahuan --}}
    <div id="pengetahuan-hipertensi" class="modal fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50 px-4">
        <div class="max-h-[85vh] w-full max-w-lg overflow-auto rounded-2xl bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-xl font-bold text-gray-800">Stroke</h2>
            <div class="content text-sm">
                <h4 class="mt-4 text-base font-semibold text-gray-700">Pengertian</h4>
                <p class="mb-4 text-gray-600">Pecah atau terjepit pembuluh darah di otak sehingga menyebabkan kerusakan jaringan otak.</p>

                <h4 class="mt-4 text-base font-semibold text-gray-700">Tanda dan Gejala</h4>
                <ol class="list-decimal pl-5 text-gray-600">
                    <li class="mb-2">Kelemahan pada wajah, lengan, kaki, terutama pada salah satu sisi tubuh</li>
                    <li class="mb-2">Merasa Bingung</li>
                    <li class="mb-2">Kesulitan Berbicara</li>
                    <li class="mb-2">Gangguan Penglihatan</li>
                    <li class="mb-2">Kesulitan berjalan, pusing, atau kehilangan keseimbangan</li>
                    <li class="mb-2">Tiba-tiba sakit kepala parah</li>
                </ol>

                <h4 class="mt-4 text-base font-semibold text-gray-700">Pertolongan Pertama</h4>
                <ol class="list-decimal pl-5 text-gray-600">
                    <li class="mb-2">Cari Pertolongan Pertama</li>
                    <li class="mb-2">Sampai 4 jam paska serangan adalah waktu yang sangat penting untuk mengurangi masalah pada tubuh</li>
                    <li class="mb-2">Segera bawa ke RS, Puskesmas atau klinik kesehatan</li>
                </ol>
            </div>
            <div class="mt-6 flex justify-end">
                <button id="closeModal" class="rounded-full bg-red-500 px-5 py-2 text-sm font-semibold text-white transition hover:bg-red-600">Tutup</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    // Hancurkan objek Chart jika sudah ada
                    if (myChart) {
                        myChart.destroy();
                    }

                    myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.weekDayNames,
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
                            maintainAspectRatio: false,
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
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top'
                                }
                            }
                        }
                    });

                    $('#total_treatment').html(data.total_treatment)
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
        // Menampilkan modal saat kartu pengetahuan diklik
        $('.modal-button').click(function() {
            let target = $(this).data('modal-target');

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
</script>
@endpush
