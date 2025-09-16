@extends('layouts.app')

@section('content')
<h3 class="mb-3">Teknik Penilaian</h3>

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('dosen.teknik.store') }}">
    @csrf
    <div class="row mb-3">
        <div class="col-md-3">
            <label>Tahun Angkatan</label>
            <select name="angkatan" class="form-select" required>
                <option value="">-- Pilih --</option>
                @foreach($angkatan as $th)
                <option value="{{ $th }}">{{ $th }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>Mata Kuliah</label>
            <select name="id_matkul" class="form-select" required>
                <option value="">-- Pilih --</option>
                @foreach($mataKuliah as $mk)
                <option value="{{ $mk->id_matkul }}">{{ $mk->nama_matkul }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div id="penilaian-container">
        <div class="row mb-2 penilaian-item">
            <div class="col-md-4">
                <select name="teknik_penilaian[]" class="form-select" required>
                    <option value="">Pilih Teknik</option>
                    <option>UTS</option>
                    <option>UAS</option>
                    <option>Tugas</option>
                    <option>Quiz</option>
                    <option>Praktikum</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" name="bobot[]" class="form-control bobot-input" placeholder="Bobot (%)" min="0" max="100" required>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm remove-item">Hapus</button>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-secondary btn-sm mb-3" id="add-item">+ Tambah Teknik Penilaian</button>

    <div class="alert alert-info">
        Total bobot semua teknik penilaian harus <strong>100%</strong>. <span id="total-bobot">Total: 0%</span>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>

<script>
document.getElementById('add-item').addEventListener('click', function() {
    const container = document.getElementById('penilaian-container');
    const item = document.querySelector('.penilaian-item').cloneNode(true);
    item.querySelectorAll('input, select').forEach(el => el.value = '');
    container.appendChild(item);
});

// hapus item
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-item')) {
        e.target.closest('.penilaian-item').remove();
        updateBobot();
    }
});

// update total bobot
document.addEventListener('input', function() {
    updateBobot();
});

function updateBobot() {
    let total = 0;
    document.querySelectorAll('.bobot-input').forEach(i => total += parseFloat(i.value || 0));
    document.getElementById('total-bobot').innerText = 'Total: ' + total + '%';
}
</script>
@endsection
