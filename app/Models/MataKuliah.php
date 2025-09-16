<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id_matkul';
    protected $fillable = ['kode_matkul', 'nama_matkul', 'sks', 'semester'];

    public function cpmk()
    {
        return $this->hasMany(Cpmk::class, 'id_matkul', 'id_matkul');
    }
}
