<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <title>{{ $title }}</title>
</head>

<body class="bg-[#F8F8FF]">
    <div class="bg-auto bg-cover bg-left-top bg-no-repeat -mt-4 lg:h-[356px] h-[300px]" id="bg-blub">
        <div class="container lg:w-[80%] mx-auto pt-24 pb-7 px-5">
            <a href="{{ route('admin.index') }}" class="flex gap-2">
                <img src="{{ asset('images/icons/arrow-left.png ') }}" width="30px" alt="Back Arrow">
            </a>
        </div>
        <div class="container lg:w-[80%] mx-auto pb-7 px-5">
            <h2 class="text-center font-bold text-black lg:text-2xl text-lg mb-10">Artikel</h2>
            <a href="{{ route('admin.artikel.tambah') }}"><button class="px-5 py-2 bg-[#8DD67A] hover:bg-[#85D470] text-white rounded ml-auto block" id="dropdown">Tambah</button></a>
        </div>
    </div>
    <div class="container lg:w-[80%] mx-auto pb-7 px-5 lg:-mt-5 mt-7">

        <div class="overflow-auto bg-white p-3 rounded shadow-md lg:max-h-[100vh] max-h-[50vh]">
        <table class="w-full">
            <thead>
              <tr class="h-10">
                <th class="border w-auto p-3">No</th>
                <th class="border w-auto p-3">Judul</th>
                <th class="border w-auto p-3">Cover</th>
                <th class="border w-auto p-3">Kategori</th>
                <th class="border w-full p-3">Deskripsi</th>
                <th class="border w-auto p-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @if($artikel->isNotEmpty())
                    @foreach ($artikel as $key => $data)
                        @php
                            $decryptedFileName = Crypt::decryptString($data->cover); 
                        @endphp
                        <tr class="{{ ($key % 2 == 1) ? 'bg-[#8DD67A] bg-opacity-30' : '' }}">
                            <td class="border text-center p-3">{{ $key+1 }}</td>
                            <td class="border w-auto p-3">{{ $data->judul }}</td>
                            <td class="border w-auto p-3">{{ $decryptedFileName }}</td>
                            <td class="border w-auto p-3">{{ $data->kategori_artikel->nama }}</td>
                            <td class="border w-full p-3">{{ $data->deskripsi }}</td>
                            <td class="border w-auto min-w-[130px] p-3 text-center">
                                <a href="{{ route('admin.artikel.edit', $data->id) }}" class="text-blue-500 inline-block">Edit</a> | <a href="javascript:void(0)" onclick="ConfirmDelete('{{ $data->id }}')" class="text-red-500 inline-block">Hapus</a>
                            </td>
                        </tr>
                        <!-- Form untuk metode DELETE -->
                        <form class="hidden" id="deleteForm{{ $data->id }}" action="{{ route('admin.artikel.delete', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center text-base font-medium border w-full min-w-[200px] p-3 text-red-500">Data masih kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>  
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <!-- Popup Navbar -->
    <script>
        $('#dropdown').on('click', function () {
            var data_target = $(this).data('target')
            
            if($(data_target).hasClass('hidden')){
                $(data_target).removeClass('animate__animated animate__flipOutX hidden')
                $(data_target).addClass('animate__animated animate__flipInX')
            }else{
                $(data_target).removeClass('animate__animated animate__flipInX')
                $(data_target).addClass('animate__animated animate__flipOutX')
                // Setelah 2 detik, tambahkan kelas hidden
                setTimeout(function () {
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
    @if(session()->has('error'))
    <script>
        var pesan = "{{ session('error') }}"
        
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: pesan
        });
        </script>
    @endif
    @if(session()->has('success'))
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
