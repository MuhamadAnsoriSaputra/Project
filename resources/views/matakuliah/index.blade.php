@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Mata Kuliah</h2>
    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary mb-3">Tambah</a>
    <table class="table table-bordered">
        <thead>
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
                    <a href="{{ route('matakuliah.edit', $mk->id_matkul) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('matakuliah.destroy', $mk->id_matkul) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
