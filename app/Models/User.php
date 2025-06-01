<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // Hapus jika tidak pakai verifikasi email
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens; // Komen atau hapus jika tidak pakai Sanctum

class User extends Authenticatable // implements MustVerifyEmail (jika perlu)
{
    use HasFactory, Notifiable; // Hapus HasApiTokens jika tidak pakai

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'id_role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the role associated with the user.
     */
    public function role()
    {
        // Pastikan nama model Role dan foreign key 'id_role' sudah benar
        return $this->belongsTo(Role::class, 'id_role');
    }
}
