<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'nama_menu',
    ];

    public function hakAkses()
    {
        return $this->hasMany(HakAkses::class, 'id_menu');
    }
}
