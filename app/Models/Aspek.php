<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspek extends Model
{
    protected $table = 'aspek';

    protected $fillable = [
        'kode',
        'nama',
        'persentase',
    ];

    public function kriteria()
    {
        return $this->hasMany(Kriteria::class, 'id_aspek');
    }
}
