@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h2 class="mb-4">Dashboard</h2>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card border-primary text-dark shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small text-uppercase text-primary mb-1">Total Pagu</div>
                        <div class="h5 fw-bold">Rp {{ number_format($totalPagu, 0, ',', '.') }}</div>
                    </div>
                    {{-- <i class="fas fa-calendar fa-2x text-muted"></i> --}}
                    <i class="fas fa-check-double fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card border-success text-dark shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small text-uppercase text-success mb-1">Total Kontrak</div>
                        <div class="h5 fw-bold">Rp {{ number_format($totalKontrak, 0, ',', '.') }}</div>
                    </div>
                    <i class="fas fa-dollar-sign fa-2x text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card border-info text-dark shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small text-uppercase text-info mb-1">Sisa Pagu</div>
                        <div class="h5 fw-bold">Rp {{ number_format($sisaPagu, 0, ',', '.') }}</div>
                    </div>
                    <i class="fas fa-clipboard-list fa-2x text-muted"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card border-warning text-dark shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="small text-uppercase text-warning mb-1">Persentase Penggunaan</div>
                        <div class="h5 fw-bold">{{ number_format($persentasePenggunaan, 2) }}%</div>
                    </div>
                    <i class="fas fa-percentage fa-2x text-muted"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="m-0 fw-bold text-primary">Kontrak per Bulan</h6>
            </div>
            <div class="card-body">
                <canvas id="kontrakPerBulanChart" height="250"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="m-0 fw-bold text-primary">Status Kontrak</h6>
            </div>
            <div class="card-body">
                <canvas id="statusKontrakChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const kontrakPerBulanData = {
    labels: {!! json_encode($kontrakPerBulan->pluck('nama_bulan')) !!},
    datasets: [{
        label: 'Jumlah Kontrak',
        data: {!! json_encode($kontrakPerBulan->pluck('jumlah')) !!},
        backgroundColor: 'rgba(78, 115, 223, 0.05)',
        borderColor: 'rgba(78, 115, 223, 1)',
        fill: true,
        tension: 0.4
    }]
};

new Chart(document.getElementById('kontrakPerBulanChart'), {
    type: 'line',
    data: kontrakPerBulanData
});

const statusKontrakData = {
    labels: {!! json_encode(array_keys($statusKontrak)) !!},
    datasets: [{
        data: {!! json_encode(array_values($statusKontrak)) !!},
        backgroundColor: ['#4e73df', '#1cc88a']
    }]
};

new Chart(document.getElementById('statusKontrakChart'), {
    type: 'doughnut',
    data: statusKontrakData
});
</script>
@endpush
