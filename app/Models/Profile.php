<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'tbl_profile';
    public $timestamps = false;

    protected $fillable = [
        'id_alternatif',
        'id_kriteria',
        'nilai_profile',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
