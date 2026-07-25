@extends('layouts.admin')

@section('title', $title ?? 'Trigger Penanganan | StrokeCare')
@section('page-title', 'Trigger Penanganan')

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
@endpush

@section('content')
    <div class="mb-5 flex justify-end">
        <a href="{{ route('admin.trigered.penanganan.tambah') }}" class="btn-primary !w-auto px-5">+ Tambah Trigger</a>
    </div>

    <div class="overflow-x-auto rounded-2xl bg-white p-4 shadow-sm">
        <table id="tables" class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500">
                    <th class="p-2">No</th>
                    <th class="p-2">Penanganan</th>
                    <th class="p-2">Judul</th>
                    <th class="p-2">Level</th>
                    <th class="p-2">Konten</th>
                    <th class="p-2">Kemajuan</th>
                    <th class="p-2">Kemunduran</th>
                    <th class="p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trigeredpenanganan as $key => $item)
                    <tr>
                        <td class="p-2 text-center">{{ $key + 1 }}</td>
                        <td class="p-2">{{ Str::limit(strip_tags($item->deskripsi), 40) }}</td>
                        <td class="p-2">{{ $item->judul }}</td>
                        <td class="p-2 text-center">{{ $item->level }}</td>
                        <td class="p-2">{{ Str::limit(strip_tags($item->konten), 60) }}</td>
                        <td class="p-2">{{ Str::limit($item->kemajuan, 40) }}</td>
                        <td class="p-2">{{ Str::limit($item->kemunduran, 40) }}</td>
                        <td class="p-2 text-center whitespace-nowrap">
                            <a href="{{ route('admin.trigered.penanganan.edit', ['id' => $item->id_trigered_penanganan]) }}"
                               class="font-semibold text-accent hover:underline">Edit</a>
                            <span class="text-gray-300">|</span>
                            <button type="button" onclick="ConfirmDelete('{{ $item->id_trigered_penanganan }}')"
                                    class="font-semibold text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                    <form class="hidden" id="deleteForm{{ $item->id_trigered_penanganan }}"
                          action="{{ route('admin.trigered.penanganan.delete', ['id' => $item->id_trigered_penanganan]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
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
