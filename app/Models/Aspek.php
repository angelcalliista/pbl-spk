<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    protected $table = 'tbl_aspek';
    public $timestamps = false;

    protected $fillable = [
        'kode',
        'nama_aspek',
        'persentase',
    ];

    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'id_aspek');
    }
}
