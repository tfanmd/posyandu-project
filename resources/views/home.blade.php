@extends('layouts.app')

@section('content')
<section class="py-5 text-center bg-white border-bottom">
    <div class="container py-5">
        <h1 class="display-5 fw-bold text-dark mb-3">
            Posyandu Sangkuriang <br>
            <span class="text-green">Sehat Bersama Keluarga</span>
        </h1>
        <p class="lead text-muted mb-4">Pusat informasi dan layanan kesehatan untuk Balita, Ibu Hamil, dan Lansia.</p>
    </div>
</section>

<section class="py-5 mt-4">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 py-4">
                    <h2 class="fw-bold text-success">{{ $stats['balita'] }}</h2>
                    <p class="text-muted mb-0">Total Balita</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 py-4">
                    <h2 class="fw-bold text-info">{{ $stats['ibu_hamil'] }}</h2>
                    <p class="text-muted mb-0">Ibu Hamil</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 py-4">
                    <h2 class="fw-bold text-warning">{{ $stats['lansia'] }}</h2>
                    <p class="text-muted mb-0">Lansia Aktif</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 py-4">
                    <h2 class="fw-bold text-primary">{{ $stats['kegiatan_bulan_ini'] }}</h2>
                    <p class="text-muted mb-0">Kegiatan Bulan Ini</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white mt-5">
    <div class="container">
        <h3 class="fw-bold text-center mb-4">Jadwal Terdekat</h3>
        <div class="row g-4 justify-content-center">
            @forelse($jadwal_terdekat as $jadwal)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <span class="badge bg-success mb-2">{{ \Carbon\Carbon::parse($jadwal->waktu_mulai)->translatedFormat('d F Y') }}</span>
                        <h5 class="fw-bold">{{ $jadwal->nama_kegiatan }}</h5>
                        <p class="text-muted small mb-1"><i class="fas fa-map-marker-alt text-danger me-1"></i> {{ $jadwal->lokasi }}</p>
                        <p class="text-muted small"><i class="fas fa-bullseye text-info me-1"></i> Sasaran: {{ ucfirst($jadwal->kategori_sasaran) }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">
                <p>Belum ada jadwal kegiatan terdekat.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection