@extends('layouts.admin')

@section('title', $title ?? 'Aktivitas | StrokeCare')
@section('page-title', 'Aktivitas Treatment')

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
@endpush

@section('content')
    <div class="mb-5 flex justify-end">
        <a href="{{ route('admin.aktivitas.tambah') }}" class="btn-primary !w-auto px-5">+ Tambah Aktivitas</a>
    </div>

    <div class="overflow-x-auto rounded-2xl bg-white p-4 shadow-sm">
        <table id="tables" class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500">
                    <th class="p-2">No</th>
                    <th class="p-2">Aktivitas</th>
                    <th class="p-2">Pemicu</th>
                    <th class="p-2">Komplikasi</th>
                    <th class="p-2">Deskripsi</th>
                    <th class="p-2">Link Video</th>
                    <th class="p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aktivitas as $key => $data)
                    <tr>
                        <td class="p-2 text-center">{{ $key + 1 }}</td>
                        <td class="p-2">{{ $data->kategori_aktivitas->nama ?? '-' }}</td>
                        <td class="p-2">{{ $data->pemicu->nama ?? '-' }}</td>
                        <td class="p-2">{{ $data->komplikasi->nama ?? '-' }}</td>
                        <td class="p-2">{{ Str::limit(strip_tags($data->deskripsi), 80) }}</td>
                        <td class="p-2">{{ $data->video ?: '-' }}</td>
                        <td class="p-2 text-center whitespace-nowrap">
                            <a href="{{ route('admin.aktivitas.edit', $data->id_aktivitas) }}"
                               class="font-semibold text-accent hover:underline">Edit</a>
                            <span class="text-gray-300">|</span>
                            <button type="button" onclick="ConfirmDelete('{{ $data->id_aktivitas }}')"
                                    class="font-semibold text-red-500 hover:underline">Hapus</button>
                        </td>
                    </tr>
                    <form class="hidden" id="deleteForm{{ $data->id_aktivitas }}"
                          action="{{ route('admin.aktivitas.delete', ['id' => $data->id_aktivitas]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                @empty
                    <tr>
                        <td colspan="7" class="p-6 text-center text-red-500">Data masih kosong</td>
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
