@extends('layouts.app')

@section('content')
<h3 class="mb-3">{{ $mataKuliah->nama_matkul }} ({{ $mataKuliah->kode_matkul }})</h3>

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('dosen.matakuliah.storeSkor', $mataKuliah->id_matkul) }}">
    @csrf
    <div class="mb-3">
        <label>Tahun Angkatan</label>
        <select name="angkatan" class="form-select" required>
            <option value="">-- Pilih --</option>
            @foreach($angkatan as $th)
            <option value="{{ $th }}">{{ $th }}</option>
            @endforeach
        </select>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>CPL</th>
                <th>CPMK</th>
                <th>Skor (%)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mataKuliah->cpmk as $cpmk)
            <tr>
                <td>{{ $cpmk->cpl->kode_cpl ?? '-' }}</td>
                <td>{{ $cpmk->kode_cpmk }}</td>
                <td>
                    <input type="number" name="skor[{{ $cpmk->id_cpmk }}]" class="form-control skor-input" min="0" max="100" required>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="alert alert-info">
        Total skor harus <strong>100%</strong>. <span id="total-display">Total: 0%</span>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>

<script>
document.querySelectorAll('.skor-input').forEach(input => {
    input.addEventListener('input', updateTotal);
});
function updateTotal() {
    let total = 0;
    document.querySelectorAll('.skor-input').forEach(i => total += parseFloat(i.value || 0));
    document.getElementById('total-display').innerText = 'Total: ' + total + '%';
}
</script>
@endsection
