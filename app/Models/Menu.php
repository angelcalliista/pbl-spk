<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    public $timestamps = false;

    protected $fillable = [
        'nama_menu',
    ];

    public function hakAkses()
    {
        return $this->hasMany(HakAkses::class, 'id_menu');
    }
}
