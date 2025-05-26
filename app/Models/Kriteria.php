<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'tbl_kriteria';

    protected $fillable = [
        'id_aspek',
        'kode',
        'nama_kriteria',
        'nilai',
        'factor',
    ];

    public function aspek()
    {
        return $this->belongsTo(Aspek::class, 'id_aspek');
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class, 'id_kriteria');
    }
}
