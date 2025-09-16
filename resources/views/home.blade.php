@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="mb-3">Selamat Datang di Project PBL</h1>
    <p class="lead mb-4">
        Sistem ini digunakan untuk mengelola Mata Kuliah, CPMK, dan Perhitungan OBE.
    </p>

    <a href="{{ route('matakuliah.index') }}" class="btn btn-primary btn-lg me-2">
        Lihat Daftar Mata Kuliah
    </a>
    <a href="{{ route('cpmk.index') }}" class="btn btn-outline-secondary btn-lg">
        Lihat CPMK
    </a>

    <div class="mt-5">
        <img src="https://cdn-vicons-png.flaticon.com/512/3209/3209265.png" alt="Dashboard Icon" width="180" class="opacity-75">
    </div>
</div>
@endsection
