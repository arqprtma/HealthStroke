@extends('layouts.admin')

@section('title', $title ?? 'Artikel | StrokeCare')
@section('page-title', 'Artikel')

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
@endpush

@section('content')
    <div class="mb-5 flex justify-end">
        <a href="{{ route('admin.artikel.tambah') }}" class="btn-primary !w-auto px-5">+ Tambah Artikel</a>
    </div>

    <div class="overflow-x-auto rounded-2xl bg-white p-4 shadow-sm">
        <table id="tables" class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500">
                    <th class="p-2">No</th>
                    <th class="p-2">Judul</th>
                    <th class="p-2">Cover</th>
                    <th class="p-2">Kategori</th>
                    <th class="p-2">Deskripsi</th>
                    <th class="p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikel as $key => $data)
                    <tr>
                        <td class="p-2 text-center">{{ $key + 1 }}</td>
                        <td class="p-2 font-semibold text-gray-700">{{ $data->judul }}</td>
                        <td class="p-2 text-gray-500">{{ $data->cover }}</td>
                        <td class="p-2">{{ $data->kategori_artikel->nama ?? '-' }}</td>
                        <td class="p-2">{{ Str::limit(strip_tags($data->deskripsi), 80) }}</td>
                        <td class="p-2 text-center whitespace-nowrap">
                            <a href="{{ route('admin.artikel.edit', $data->id) }}"
                               class="font-semibold text-accent hover:underline">Edit</a>
                            <span class="text-gray-300">|</span>
                            <button type="button" onclick="ConfirmDelete('{{ $data->id }}')"
                                    class="font-semibold text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                    <form class="hidden" id="deleteForm{{ $data->id }}"
                          action="{{ route('admin.artikel.delete', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                @empty
                    <tr>
                        <td colspan="6" class="p-6 text-center text-red-500">Data masih kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
<script>
    new DataTable('#tables');
</script>
@endpush
