<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpmk extends Model
{
    use HasFactory;

    protected $table = 'cpmk';
    protected $primaryKey = 'id_cpmk';
    protected $fillable = ['kode_cpmk', 'nama_cpmk', 'bobot_cpmk', 'id_matkul'];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matkul', 'id_matkul');
    }
}
