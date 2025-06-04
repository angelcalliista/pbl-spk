<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatifs';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class, 'id_alternatif');
    }
}
