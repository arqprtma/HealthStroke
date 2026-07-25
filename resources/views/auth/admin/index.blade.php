@extends('layouts.admin')

@section('title', $title ?? 'Dashboard Admin | StrokeCare')
@section('page-title', 'Dashboard')

@section('content')
    {{-- Statistik --}}
    <div class="grid grid-cols-2 gap-4">
        <div class="flex flex-col items-center justify-center rounded-2xl bg-primary p-6 text-white shadow-sm sm:p-8">
            <span class="text-3xl font-bold sm:text-4xl">{{ count($users) }}</span>
            <span class="mt-1 text-sm font-medium opacity-90">Pengguna</span>
        </div>
        <div class="flex flex-col items-center justify-center rounded-2xl bg-[#2296D1] p-6 text-white shadow-sm sm:p-8">
            <span class="text-3xl font-bold sm:text-4xl">{{ count($pasien) }}</span>
            <span class="mt-1 text-sm font-medium opacity-90">Pasien Stroke</span>
        </div>
    </div>

    {{-- Chart pemicu --}}
    <section class="mt-8">
        <h2 class="mb-3 text-base font-bold text-gray-800">Persentase Pemicu Stroke</h2>
        <div class="rounded-2xl bg-white p-5 shadow-sm">
            <div class="relative h-[300px] w-full sm:h-[380px]">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </section>

    {{-- Akses cepat --}}
    <section class="mt-8">
        <h2 class="mb-3 text-base font-bold text-gray-800">Kelola Layanan</h2>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
            @php
                $menu = [
                    ['route' => 'admin.pemicu', 'label' => 'Pemicu'],
                    ['route' => 'admin.komplikasi', 'label' => 'Komplikasi'],
                    ['route' => 'admin.aktivitas', 'label' => 'Aktivitas'],
                    ['route' => 'admin.penanganan', 'label' => 'Penanganan'],
                    ['route' => 'admin.artikel', 'label' => 'Artikel'],
                    ['route' => 'admin.trigered.aktivitas', 'label' => 'Trigger Aktivitas'],
                    ['route' => 'admin.trigered.penanganan', 'label' => 'Trigger Penanganan'],
                ];
            @endphp
            @foreach ($menu as $m)
                <a href="{{ route($m['route']) }}"
                   class="flex items-center justify-center rounded-xl bg-white p-4 text-center text-sm font-semibold text-gray-700 shadow-sm transition hover:-translate-y-0.5 hover:text-primary hover:shadow-md">
                    {{ $m['label'] }}
                </a>
            @endforeach
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var total_pemicu = '{{ implode(',', $total_pemicu) }}';
    var list_pemicu = '{{ implode(',', $list_pemicu) }}';

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: list_pemicu.split(','),
            datasets: [{
                label: 'Jumlah Pasien',
                data: total_pemicu.split(','),
                backgroundColor: 'rgba(34, 150, 209, 0.7)',
                borderColor: 'rgba(34, 150, 209, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { beginAtZero: true },
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            },
            plugins: { legend: { display: true, position: 'top' } }
        }
    });
</script>
@endpush
