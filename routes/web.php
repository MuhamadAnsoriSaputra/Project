<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dosen\MataKuliahController as DosenMataKuliahController;
use App\Http\Controllers\Dosen\TeknikPenilaianController;

// Redirect ke dashboard dosen untuk default
Route::get('/', function () {
    return redirect()->route('dosen.dashboard');
});

// ROUTE UNTUK DOSEN
Route::prefix('dosen')->name('dosen.')->group(function () {
    // DASHBOARD
    Route::get('dashboard', function () {
        $totalMatkul = \App\Models\MataKuliah::count();
        $totalCpmk = \App\Models\Cpmk::count();
        $totalPenilaian = 12; // sementara dummy

        return view('dosen.dashboard', compact('totalMatkul', 'totalCpmk', 'totalPenilaian'));
    })->name('dashboard');

    // MATA KULIAH
    Route::get('matakuliah', [DosenMataKuliahController::class, 'index'])->name('matakuliah.index');
    Route::get('matakuliah/{id}', [DosenMataKuliahController::class, 'show'])->name('matakuliah.show');
    Route::post('matakuliah/{id}/store-skor', [DosenMataKuliahController::class, 'storeSkor'])->name('matakuliah.storeSkor');

    // TEKNIK PENILAIAN
    Route::get('teknik', [TeknikPenilaianController::class, 'index'])->name('teknik.index');
    Route::post('teknik/store', [TeknikPenilaianController::class, 'store'])->name('teknik.store');
});
