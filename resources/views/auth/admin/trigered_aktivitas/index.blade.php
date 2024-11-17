<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{-- <title>{{ $title }}</title> --}}
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
     {{-- font --}}
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">

     <style>
         *{
             font-family: 'mulish','sans-serif';
         }
     </style>
    <title>{{$title}}</title>
</head>

<body class="bg-[#F8F8FF]">
    <div class="bg-auto bg-cover bg-left-top bg-no-repeat -mt-4 lg:h-[356px] h-[300px]" id="bg-blub">
        <div class="container lg:w-[80%] mx-auto pt-24 pb-7 px-5">
            <a href="{{ route('admin.index') }}" class="flex gap-2">
                <img src="{{ asset('images/icons/arrow-left.png ') }}" width="30px" alt="Back Arrow">
            </a>
        </div>
        <div class="container lg:w-[80%] mx-auto pb-7 px-5">
            <h2 class="text-center font-bold text-black lg:text-2xl text-lg mb-10">Trigger aktivitas</h2>
            <a href="{{ route('admin.trigered.aktivitas.tambah') }}"><button
                    class="px-5 py-2 bg-[#8DD67A] hover:bg-[#85D470] text-white rounded ml-auto block"
                    id="dropdown">Tambah</button></a>
        </div>
    </div>
    <div class="container lg:w-[80%] mx-auto pb-7 px-5 lg:-mt-5 mt-7">
        <div class="overflow-auto lg:max-h-[100vh] max-h-[50vh]">
        <table id="tables" class="w-full">
            <thead>
              <tr class="h-10">
                <th class="border w-auto p-3">No</th>
                <th class="border w-auto p-3">Aktivitas</th>
                <th class="border w-auto p-3">Judul</th>
                <th class="border w-auto p-3">Level</th>
                <th class="border w-auto p-3">Konten</th>
                <th class="border w-auto p-3">Kemajuan</th>
                <th class="border w-auto p-3">kemunduran</th>
                <th class="border w-auto p-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1?>
                @foreach ($trigeredaktivitas as $item)
                <tr>
                    <td>{{$i}}</td>
                    <td class="border w-auto p-3">{{strip_tags($item->deskripsi)}}</td>
                    <td class="border w-auto p-3">{{$item->judul}}</td>
                    <td class="border w-auto p-3">{{$item->level}}</td>
                    <td class="border w-auto p-3">{{strip_tags($item->konten) }}</td>
                    <td class="border w-auto p-3">{{$item->kemajuan}}</td>
                    <td class="border w-auto p-3">{{$item->kemunduran}}</td>
                    {{-- <td class="border w-auto p-3">edit | delete</td> --}}
                    <td class="border w-auto min-w-[130px] p-3 text-center">
                        <a href="{{ route('admin.trigered.aktivitas.edit', ['id' => $item->id_trigered_aktivitas]) }}" class="text-blue-500 inline-block">Edit</a> | <a href="javascript:void(0)" onclick="ConfirmDelete('{{ $item->id_trigered_aktivitas }}')" class="text-red-500 inline-block">Hapus</a>
                    </td>
                    <!-- Form untuk metode DELETE -->
                    <form id="deleteForm{{ $item->id_trigered_aktivitas }}" action="{{ route('admin.trigered.aktivitas.delete',  ['id' => $item->id_trigered_aktivitas]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
                    <?php $i++?>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>

    <script>
        // Datatables Proses
        let table = new DataTable('#tables');
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

    <!-- Popup Navbar -->
    <script>
        $('#dropdown').on('click', function() {
            var data_target = $(this).data('target')

            if ($(data_target).hasClass('hidden')) {
                $(data_target).removeClass('animate__animated animate__flipOutX hidden')
                $(data_target).addClass('animate__animated animate__flipInX')
            } else {
                $(data_target).removeClass('animate__animated animate__flipInX')
                $(data_target).addClass('animate__animated animate__flipOutX')
                // Setelah 2 detik, tambahkan kelas hidden
                setTimeout(function() {
                    $(data_target).addClass('hidden');
                }, 1000);
            }
        })
    </script>
    <script>
        function ConfirmUpdate(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FFD700',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, edit!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan "Ya", submit form dengan metode DELETE
                    document.getElementById('updateForm' + id).submit();
                }
            });
        }

        function ConfirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan "Ya", submit form dengan metode DELETE
                    document.getElementById('deleteForm' + id).submit();
                }
            });
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
