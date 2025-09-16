@extends('layouts.app')

@section('content')
<h3 class="mb-3">Mata Kuliah Saya</h3>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-hover table-striped">
    <thead class="table-primary">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mataKuliah as $mk)
        <tr>
            <td>{{ $mk->kode_matkul }}</td>
            <td>{{ $mk->nama_matkul }}</td>
            <td>{{ $mk->sks }}</td>
            <td>{{ $mk->semester }}</td>
            <td>
                <a href="{{ route('dosen.matakuliah.show', $mk->id_matkul) }}" class="btn btn-primary btn-sm">
                    Detail & Input Skor
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
