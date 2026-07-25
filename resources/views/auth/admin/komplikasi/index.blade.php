@extends('layouts.admin')

@section('title', $title ?? 'Komplikasi | StrokeCare')
@section('page-title', 'Komplikasi')

@section('content')
    {{-- Form tambah --}}
    <form method="POST" action="{{ route('admin.komplikasi.post') }}"
          class="mb-5 flex flex-col gap-2 rounded-2xl bg-white p-4 shadow-sm sm:flex-row">
        @csrf
        <input type="text" name="komplikasi" placeholder="Tambah komplikasi baru" required
               class="flex-1 rounded-xl border border-gray-200 px-4 py-2.5 text-sm shadow-sm transition focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/30">
        <button type="submit" class="btn-primary shrink-0 sm:!w-auto sm:px-6">Tambah</button>
    </form>

    {{-- Tabel --}}
    <div class="overflow-x-auto rounded-2xl bg-white p-2 shadow-sm">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500">
                    <th class="w-12 p-3">No</th>
                    <th class="p-3">Nama</th>
                    <th class="w-32 p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($komplikasi as $key => $data)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 text-gray-500">{{ $key + 1 }}</td>
                        <td class="p-3">
                            <form action="{{ route('admin.komplikasi.update', ['id' => $data->id_komplikasi]) }}"
                                  method="post" id="updateForm{{ $data->id_komplikasi }}">
                                @csrf
                                @method('PUT')
                                <input type="text" name="nama" value="{{ $data->nama }}"
                                       class="w-full rounded-lg border border-transparent bg-gray-50 px-3 py-2 transition focus:border-primary focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20">
                            </form>
                        </td>
                        <td class="p-3 text-center whitespace-nowrap">
                            <button type="button" onclick="ConfirmUpdate('{{ $data->id_komplikasi }}')"
                                    class="font-semibold text-accent hover:underline">Simpan</button>
                            <span class="text-gray-300">|</span>
                            <button type="button" onclick="ConfirmDelete('{{ $data->id_komplikasi }}')"
                                    class="font-semibold text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                    <form class="hidden" id="deleteForm{{ $data->id_komplikasi }}"
                          action="{{ route('admin.komplikasi.delete', ['id' => $data->id_komplikasi]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                @empty
                    <tr>
                        <td colspan="3" class="p-6 text-center text-red-500">Data masih kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
