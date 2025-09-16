<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class TeknikPenilaianController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::all();
        $angkatan = range(date('Y') - 4, date('Y'));
        return view('dosen.teknik.index', compact('mataKuliah', 'angkatan'));
    }

    public function store(Request $request)
    {
        $teknik = $request->input('teknik_penilaian', []);
        $bobot = $request->input('bobot', []);

        $totalBobot = array_sum($bobot);
        if ($totalBobot != 100) {
            return back()->with('error', 'Total bobot harus 100%, saat ini: ' . $totalBobot . '%');
        }

        foreach ($teknik as $key => $namaTeknik) {
            // Simpan ke tabel teknik_penilaian
            // TeknikPenilaian::create([
            //     'angkatan' => $request->angkatan,
            //     'id_matkul' => $request->id_matkul,
            //     'nama_teknik' => $namaTeknik,
            //     'bobot' => $bobot[$key]
            // ]);
        }

        return redirect()->route('dosen.teknik.index')->with('success', 'Teknik penilaian berhasil disimpan.');
    }
}
