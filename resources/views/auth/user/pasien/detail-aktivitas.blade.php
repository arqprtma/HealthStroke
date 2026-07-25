<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- cdn tailwindcss --}}
        @vite('resources/css/app.css')

        <title>{{ $title }}</title>
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

        <!-- Requirement Progress Desain -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/loading-bar.min.css') }}" />
        <script type="text/javascript" src="{{ asset('js/loading-bar.min.js') }}"></script>
        <style type="text/css">
            .ldBar-label {
                color: #09f;
                font-size: 1.2em;
                font-weight: 700;
            }

            .ldBar path.mainline {
                stroke-width: 10;
                stroke: #09f;
                stroke-linecap: round;
            }

            .ldBar path.baseline {
                margin: 5px;
                stroke-width: 14;
                stroke: #f1f2f3;
                stroke-linecap: round;
                filter: url(#custom-shadow);
            }
        </style>
        <!-- End Requirement Progress Desain -->

        <style>
            * {
                font-family: 'mulish', 'sans-serif';
            }

            /* Custom SweetAlert2 */
            div:where(.swal2-container) h2:where(.swal2-title) {
                font-size: 1.125rem !important;
                /* 18px */
                line-height: 1.75rem !important;
                /* 28px */
            }

            @media(max-width:768px) {
                div:where(.swal2-container) h2:where(.swal2-title) {
                    font-size: 1rem !important;
                    /* 16px */
                    line-height: 1.5rem !important;
                    /* 24px */
                }
            }

            /* End Custom SweetAlert2 */
        </style>
    </head>

    <body class="bg-ghost">
        <header class="sticky top-0 z-30 border-b border-gray-100 bg-white/95 backdrop-blur">
            <div class="mx-auto flex h-14 max-w-screen-md items-center gap-2 px-4">
                <a href="{{ route('dashboard') }}" aria-label="Kembali"
                   class="-ml-2 flex h-9 w-9 items-center justify-center rounded-full text-gray-600 transition hover:bg-gray-100">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <span class="font-bold text-gray-800">Detail Aktivitas</span>
            </div>
        </header>
        <div class="mx-auto max-w-screen-md px-4 pb-16 pt-5">
            <div class="content">
                <h1 class="mb-5 text-lg font-bold text-primary lg:text-2xl">{{ $aktivitas->kategori_aktivitas->nama }}</h1>

                <!-- Pemberitahuan User -->
                @if (count($log_treatment) > 0)
                    @php
                        // Mengambil object terakhir dari data $log_treatment
                        $first_log_treatment = $log_treatment->first();
                        $daysStagnant_lastLogTreatment = \Carbon\Carbon::parse($first_log_treatment->created_at)->diffInDays(\Carbon\Carbon::now());
                    @endphp
                    @if ($daysStagnant_lastLogTreatment == 21 || $daysStagnant_lastLogTreatment == 42)
                        @if ($daysStagnant_lastLogTreatment < 84)
                            <div class="p-4 mb-4 text-orange-700 bg-orange-100 rounded-lg" role="alert">
                                <span class="font-bold">Pemberitahuan!</span><br>Berhenti sementara jika pasien merasa kelelahan, jika kelelahan sudah reda maka lanjutkan latihan
                            </div>
                        @endif
                        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg" role="alert">
                            Terus bersemangat untuk latihan jika nilai kekuatan otot meningkat.
                        </div>
                    @endif
                @endif
                <!-- End Pemberitahuan User -->

                <!-- Decision Card -->
                @if ($trigerAktivitas != null && $userHealth != null)
                    <div class="mx-auto max-w-md rounded-2xl bg-white p-6 shadow-sm">
                        <div class="flex items-center justify-between flex-col mb-4">
                            <h2 class="text-lg font-semibold text-gray-800">Decision Progress</h2>
                            <div>
                                <div class="flex items-center justify-center">
                                    <span class="text-gray-600 text-center text-sm">Level {{ $userHealth->level }}</span>
                                    @if ($userHealth->status == 'kemajuan')
                                        <!-- Up -->
                                        <svg class="w-[20px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>Kemajuan</title>
                                                <defs> </defs>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.00003 15.5C6.59557 15.5 6.23093 15.2564 6.07615 14.8827C5.92137 14.509 6.00692 14.0789 6.29292 13.7929L11.2929 8.79289C11.6834 8.40237 12.3166 8.40237 12.7071 8.79289L17.7071 13.7929C17.9931 14.0789 18.0787 14.509 17.9239 14.8827C17.7691 15.2564 17.4045 15.5 17 15.5H7.00003Z" fill="#22C55E"></path>
                                            </g>
                                        </svg>
                                        <!-- End Up -->
                                    @elseif($userHealth->status == 'kemunduran')
                                        <!-- Down -->
                                        <svg class="w-[20px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>Kemunduran</title>
                                                <defs> </defs>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.00003 8.5C6.59557 8.5 6.23093 8.74364 6.07615 9.11732C5.92137 9.49099 6.00692 9.92111 6.29292 10.2071L11.2929 15.2071C11.6834 15.5976 12.3166 15.5976 12.7071 15.2071L17.7071 10.2071C17.9931 9.92111 18.0787 9.49099 17.9239 9.11732C17.7691 8.74364 17.4045 8.5 17 8.5H7.00003Z" fill="#EF4444"></path>
                                            </g>
                                        </svg>
                                        <!-- End Down -->
                                    @else
                                        <!-- Stagnasi -->
                                        @if (count($log_treatment) >= 3)
                                            <svg class="w-[12px] ms-2" viewBox="0 -12 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <title>Stagnasi</title>
                                                    <defs> </defs>
                                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                                        <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-414.000000, -1049.000000)" fill="#F97316">
                                                            <path d="M442,1049 L418,1049 C415.791,1049 414,1050.79 414,1053 C414,1055.21 415.791,1057 418,1057 L442,1057 C444.209,1057 446,1055.21 446,1053 C446,1050.79 444.209,1049 442,1049" id="minus" sketch:type="MSShapeGroup"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        @endif
                                        <!-- End Stagnasi -->
                                    @endif
                                </div>
                                <span class="text-center text-xs">({{ getTrigerAktivitas($aktivitas->id_aktivitas, $userHealth->level)->judul }})</span>
                            </div>
                        </div>
                        <!-- Progress Circle -->
                        <div class="lg:flex-[0_0_120px] flex-[0_0_100px]">
                            <div class="ldBar label-center" data-min="0" data-max="{{ count($trigerAktivitas) }}" data-value="{{ $userHealth->level }}" data-preset="circle" style="width: 100%;height: 90px;"></div>
                            <style>
                                .ldBar-label:after {
                                    content: " / {{ count($trigerAktivitas) }}";
                                }
                            </style>
                        </div>
                        <p class="mt-4 text-center text-gray-600">
                            @if ($userHealth->status == 'kemajuan')
                                <span class="block text-base font-semibold text-green-500">Kemajuan!</span>
                            @elseif ($userHealth->status == 'kemunduran')
                                <span class="block text-base font-semibold text-red-500">Kemunduran!</span>
                            @else
                                @if (count($log_treatment) >= 3)
                                    <span class="block text-base font-semibold text-orange-500">Stagnasi!</span>
                                @endif
                            @endif
                            @if ($userHealth->status == 'stagnasi' && count($log_treatment) >= 3)
                                @php
                                    $daysStagnant = \Carbon\Carbon::parse($userHealth->updated_at)->diffInDays(\Carbon\Carbon::now());
                                @endphp
                                @if ($daysStagnant > 365)
                                    <span><b>Waktunya Bangkit!</b> Satu tahun adalah pencapaian tersendiri, tetapi ini saatnya beraksi lebih kuat. Anda memiliki potensi luar biasa untuk berkembang. Mari buat tahun berikutnya lebih penuh dengan kemajuan!</span>
                                @elseif ($daysStagnant > 180)
                                    <span><b>Jangan Biarkan Semangat Padam!</b> Setengah tahun berlalu, tetapi semangat Anda adalah kunci perubahan. Cobalah mengubah rutinitas dan teruslah berusaha. Perjalanan Anda belum selesai!</span>
                                @elseif ($daysStagnant > 90)
                                    <span><b>Ayo Kembali Berjuang!</b> Tiga bulan adalah waktu yang lama untuk bertahan tanpa perubahan, tetapi Anda punya kekuatan untuk bergerak maju. Ayo, coba hal baru, tetap konsisten, dan ciptakan perubahan bersama!</span>
                                @elseif ($daysStagnant > 30)
                                    <span><b>Ambil Kesempatan Baru!</b> Sebulan berlalu tanpa perubahan besar, tetapi setiap hari adalah kesempatan baru. Mari bangkit dan ubah stagnasi menjadi kemajuan. Ayo mulai lagi!</span>
                                @elseif ($daysStagnant > 7)
                                    <span><b>Jangan Biarkan Minggu Ini Berlalu!</b> Minggu ini mungkin terasa sulit, tapi setiap usaha yang Anda lakukan membawa Anda lebih dekat ke tujuan. Mari kembali ke jalur dan buat perbedaan nyata!</span>
                                @else
                                    <span><b>Jangan Menyerah!</b> Hanya dalam beberapa langkah kecil, Anda bisa melihat perubahan. Terus gunakan aplikasi ini untuk menciptakan kemajuan, sekecil apa pun itu.</span>
                                @endif
                            @else
                                <span>{{ getTrigerAktivitas($aktivitas->id_aktivitas, $userHealth->level)->{$userHealth->status} }}</span>
                            @endif
                        </p>
                    </div>
                @endif
                <!-- End Decision Card -->

                <h2 class="mt-5 mb-3 text-sm font-bold lg:text-lg">Deskripsi</h2>
                <div class="rich-content">{!! $aktivitas->deskripsi !!}</div>
                @if ($aktivitas->video)
                    <h5 class="mt-5 text-sm lg:text-base">Video Aktivitas Treatment : </h5>
                    <iframe class="mt-5 mb-10 h-[50vw] w-full rounded-2xl shadow-sm" src="https://www.youtube.com/embed/{{ $aktivitas->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                    </iframe>
                @endif

                <h3 class="text-sm font-bold lg:text-lg mt-12">Aktivitas Lainnya</h3>
                @foreach ($list_aktivitas as $key => $list)
                <a href="{{ route('detail-aktivitas', ['id' => $list->id_aktivitas]) }}" class="block w-full mx-auto mt-2 rounded-xl bg-white p-3 shadow-sm transition hover:shadow-md">
                    <div class="deskripsi mx-auto">
                        <div class="flex justify-left gap-10 p-2 items-center">
                            <div class="text-sm lg:text-base">
                                {{ $key + 1 }}
                            </div>
                            <div class="deskripsi text-sm lg:text-base">
                                {{ previewText($list->deskripsi, 90) }}
                            </div>
                        </div>
                        {{-- <h1 class="text-sm lg:text-lg">{{ $key+1 }}. {!! $list->deskripsi !!}</h1> --}}
                    </div>
                </a>
            @endforeach

                {{-- <button></button> --}}
                <div class="text-center mt-7 pb-10">
                    @if ($log_treatment_today < 1)
                        <a href="javascript:void(0)" id="button-dilakukan">
                            <button class="btn-primary w-full max-w-xs">Sudah dilakukan</button>
                        </a>
                    @endif
                    {{-- <a href="{{ route('add-log-aktivitas', ['id' => $aktivitas->id_aktivitas]) }}">
                        <button class="transition delay-100 bg-[#15ADA7] hover:border-2 hover:border-[#15ADA7]  w-[197px] hover:bg-[#FFFF] hover:text-[#15ADA7] h-[40px] rounded-lg text-white">Sudah
                        dilakukan
                        </button>
                   
                        @if (isset($trigerAktivitas) && $log_treatment == $trigerAktivitas->jumlah)
                        <script>
                            // Menggunakan SweetAlert2 untuk menampilkan konten dari triggered activity
                            Swal.fire({
                                title: 'Informasi Aktivitas',
                                text: '{{ strip_tags($trigerAktivitas->first()->konten) }}', // Menampilkan konten dari Aktivitas pertama
                                icon: 'info',
                                confirmButtonText: 'OK'
                            });
                        </script>
                        </a>
                    @endif --}}
                </div>

            </div>

        </div>

        <!-- Modal Untuk Meminta Perkembangan Pasien -->
        @if (count($trigerAktivitas) != 0)
            <div id="request-pengembangan-pasien" class="modal fixed inset-0 z-50 bg-black bg-opacity-50 hidden items-center justify-center px-4">
                <div class="bg-white rounded-2xl max-h-[85vh] p-6 max-w-3xl w-full shadow-lg transition-transform transform overflow-auto">
                    <h2 class="lg:text-2xl text-lg font-bold mb-4 text-gray-800">Penilaian Perkembangan Pasien</h2>
                    <div class="content">
                        <h4 class="font-semibold mt-4 lg:text-lg text-base text-gray-700">Indikator</h4>
                        <div class="overflow-x-auto">
                            <table class="w-full border border-gray-300">
                                <thead>
                                    <tr class="bg-primary/5">
                                        <th class="border border-gray-300 lg:text-base text-sm p-2">Level</th>
                                        <th class="border border-gray-300 lg:text-base text-sm p-2">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trigerAktivitas as $item)
                                        <tr>
                                            <th class="border border-gray-300 p-2" style="vertical-align: top;width:30px">{{ $item->level }}</th>
                                            <td class="border border-gray-300 p-2" style="vertical-align: top;">{!! $item->konten !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h4 class="font-semibold mt-4 lg:text-lg text-base text-gray-700">
                            @if (count($log_treatment) == 0)
                                Identifikasi Level Awal Pasien
                            @else
                                Apakah ada Perubahan ?
                            @endif
                        </h4>
                        <!-- Select Option -->
                        <div class="w-64 mt-2 {{ count($log_treatment) == 0 ? 'hidden' : '' }}">
                            <div class="relative">
                                <select id="dedicion" name="decision" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline focus:border-[#15ADA7]">
                                    <option value="">-- Pilih --</option>
                                    <option value="ya">Ada Perubahan</option>
                                    <option value="tidak">Tidak ada Perubahan</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Input Number -->
                        <form id="input_decision" class="mt-2 {{ count($log_treatment) != 0 ? 'hidden' : '' }}" method="POST" action="{{ route('update-perkembangan-pasien') }}">
                            @csrf
                            <label for="perubahan_decision" class="block text-sm font-medium text-gray-700">
                                @if (count($log_treatment) == 0)
                                    Masukan Level Awal
                                @else
                                    Masukan Level Perubahan
                                @endif
                            </label>
                            <input type="hidden" name="id_pasien" value="{{ base64_encode($pasien->id_pasien) }}">
                            <input type="hidden" name="jenis" value="{{ base64_encode('aktivitas') }}">
                            <input type="hidden" name="id" value="{{ base64_encode($aktivitas->id_aktivitas) }}">
                            <input type="number" id="perubahan_decision" value="{{ $userHealth ? $userHealth->level : 0 }}" maxlength="1" min="0" minlength="1" max="{{ count($trigerAktivitas) }}" name="perubahan_decision" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#15ADA7] focus:border-[#15ADA7]" placeholder="Masukan Level Baru">
                        </form>
                    </div>
                    <div id="action_decision_modal" class="flex justify-end mt-6">
                        <button id="submitPerubahan" class="bg-[#15ADA7] text-white px-4 py-2 rounded hover:bg-[#258d8a] transition duration-200 {{ count($log_treatment) != 0 ? 'hidden' : '' }}">Simpan</button>
                        {{-- <button id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200 hidden">Tutup</button> --}}
                    </div>
                </div>
            </div>
        @endif

        <!--Javascript -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js" integrity="sha512-hUhvpC5f8cgc04OZb55j0KNGh4eh7dLxd/dPSJ5VyzqDWxsayYbojWyl5Tkcgrmb/RVKCRJI1jNlRbVP4WWC4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>
        <script>
            // Modal Request Pengembangan Pasien
            $(document).ready(function() {
                // Menampilkan modal saat tombol dibuka diklik
                let countLogTreatment = {{ $log_treatment ? count($log_treatment) : 0 }};
                let todayUserHealth = {!! json_encode($userHealth ? $userHealth->updated_at->format('Y-m-d') : null) !!};
                let countUserHealth = {{ $userHealth != null ? 1 : 0 }};

                // Convert todayUserHealth to a moment date if not null
                if (todayUserHealth) {
                    todayUserHealth = moment(todayUserHealth, 'YYYY-MM-DD');
                }

                // Calculate the difference in days between todayUserHealth and today
                let canFillForm = true; // Default value
                if (todayUserHealth) {
                    let daysDifference = moment().diff(todayUserHealth, 'days');
                    if (daysDifference < 2) {
                        canFillForm = false; // Disable form filling for 3 days
                    }
                }

                // Log for debugging
                console.log(
                    countLogTreatment,
                    countUserHealth,
                    (countLogTreatment % 3 === 0 && countLogTreatment !== 0 && (!todayUserHealth || !todayUserHealth.isSame(moment(), 'day'))),
                    (countLogTreatment === 0 && countUserHealth === 0),
                    'Days difference:', todayUserHealth ? moment().diff(todayUserHealth, 'days') : 'No date',
                    'Can fill form:', canFillForm
                );

                // Conditional logic to show modal based on 3-day restriction
                if ((canFillForm) &&
                    ((countLogTreatment % 3 === 0 && countLogTreatment !== 0 && (!todayUserHealth || !todayUserHealth.isSame(moment(), 'day'))) ||
                        (countLogTreatment === 0 && countUserHealth === 0))) {
                    $('#request-pengembangan-pasien').removeClass('hidden');
                    $('#request-pengembangan-pasien').addClass('flex');
                    $('#request-pengembangan-pasien').fadeIn();
                }


                // Ketika nilai dari select option id decision ini menjadi ya maka hapus class hidden pada id input_decision
                $('#dedicion').on('change', function() {
                    if ($(this).val() == 'ya') {
                        $('#input_decision').removeClass('hidden');
                        $('#action_decision_modal').find('button').removeClass('hidden');
                        // $('#closeModal').addClass('hidden');
                    } else {
                        $('#input_decision').addClass('hidden');
                        $('#action_decision_modal').find('button').removeClass('hidden');
                        // $('#submitPerubahan').addClass('hidden');
                    }
                });

                // Jika pada submitPerubahan di klik maka proses form input_decision
                $('#submitPerubahan').click(function() {
                    $('#input_decision').submit();
                });

                // Menutup modal saat tombol tutup diklik
                $('#closeModal').click(function() {
                    $('.modal').fadeOut();
                });

                // // Menutup modal saat area di luar modal diklik
                // $('.modal').click(function(event) {
                //     if ($(event.target).is('.modal')) {
                //         $('.modal').fadeOut();
                //     }
                // });
            });
        </script>

        <script>
            // Menggunakan SweetAlert2 untuk menampilkan konten dari triggered #button__dilakukan
            document.getElementById('button-dilakukan')?.addEventListener('click', function() {
                Swal.fire({
                    title: "Apakah latihan hari ini sudah di lakukan ?",
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonColor: '#15ADA7',
                    confirmButtonText: "Sudah",
                    cancelButtonText: "Belum"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // buat redirect ke {{ route('add-log-aktivitas', ['id' => $aktivitas->id_aktivitas]) }}
                        window.location.href = "{{ route('add-log-aktivitas', ['id' => $aktivitas->id_aktivitas]) }}";
                    }
                });
            });
        </script>
    </body>

</html>
