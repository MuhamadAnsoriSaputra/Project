<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\Cpmk;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::with('cpmk')->get();
        return view('dosen.matakuliah.index', compact('mataKuliah'));
    }

    public function show($id)
    {
        $mataKuliah = MataKuliah::with(['cpmk.cpl'])->findOrFail($id);
        $angkatan = range(date('Y') - 4, date('Y')); // contoh: 5 tahun terakhir
        return view('dosen.matakuliah.show', compact('mataKuliah', 'angkatan'));
    }

    public function storeSkor(Request $request, $id)
    {
        $mataKuliah = MataKuliah::findOrFail($id);
        $skorInput = $request->input('skor', []);

        $total = array_sum($skorInput);
        if ($total != 100) {
            return back()->with('error', 'Total skor harus 100%, saat ini: ' . $total . '%');
        }

        // Simpan skor ke tabel hasil OBE atau tabel penilaian_dosen
        foreach ($skorInput as $id_cpmk => $skor) {
            // contoh pseudo:
            // PenilaianDosen::updateOrCreate(
            //    ['id_cpmk' => $id_cpmk, 'angkatan' => $request->angkatan],
            //    ['skor' => $skor]
            // );
        }

        return redirect()->route('dosen.matakuliah.index')->with('success', 'Skor berhasil disimpan.');
    }
}
