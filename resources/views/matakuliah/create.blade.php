@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Mata Kuliah</h2>
    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode</label>
            <input type="text" name="kode_matkul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama_matkul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" min="1" max="6" required>
        </div>
        <div class="mb-3">
            <label>Semester</label>
            <input type="number" name="semester" class="form-control" min="1" max="8" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
