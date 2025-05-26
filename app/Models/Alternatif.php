<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'tbl_alternatif';

    protected $fillable = [
        'kode',
        'nama_alternatif',
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class, 'id_alternatif');
    }
}
