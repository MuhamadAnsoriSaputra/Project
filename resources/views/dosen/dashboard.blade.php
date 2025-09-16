@extends('layouts.app')

@section('content')
<h3 class="mb-4">Dashboard Dosen</h3>

<div class="row g-4">
    <!-- Card Mata Kuliah -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center p-4 border-0" style="background-color:#0d6efd; color:white;">
            <h5 class="fw-bold">Mata Kuliah</h5>
            <p class="display-6">{{ $totalMatkul }}</p>
            <p class="mb-0">Total Mata Kuliah yang Anda Ajar</p>
            <a href="{{ route('dosen.matakuliah.index') }}" class="btn btn-light btn-sm mt-3">Lihat Detail</a>
        </div>
    </div>

    <!-- Card CPMK -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center p-4 border-0" style="background-color:#198754; color:white;">
            <h5 class="fw-bold">CPMK</h5>
            <p class="display-6">{{ $totalCpmk }}</p>
            <p class="mb-0">Jumlah CPMK Terkait</p>
            <a href="{{ route('dosen.matakuliah.index') }}" class="btn btn-light btn-sm mt-3">Kelola CPMK</a>
        </div>
    </div>

    <!-- Card Penilaian -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center p-4 border-0" style="background-color:#ffc107; color:#212529;">
            <h5 class="fw-bold">Penilaian</h5>
            <p class="display-6">{{ $totalPenilaian }}</p>
            <p class="mb-0">Teknik Penilaian yang Sudah Dibuat</p>
            <a href="{{ route('dosen.teknik.index') }}" class="btn btn-dark btn-sm mt-3">Kelola Penilaian</a>
        </div>
    </div>
</div>

<hr class="my-4">

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm p-4">
            <h5 class="fw-bold mb-3">Aktivitas Terakhir</h5>
            <ul class="list-group">
                <li class="list-group-item">✅ Anda menambahkan CPMK baru pada mata kuliah Algoritma Pemrograman</li>
                <li class="list-group-item">📊 Anda mengatur teknik penilaian UTS/UAS untuk Struktur Data</li>
                <li class="list-group-item">✏️ Anda memperbarui skor CPMK pada mata kuliah Pemrograman Web</li>
            </ul>
        </div>
    </div>
</div>
@endsection
