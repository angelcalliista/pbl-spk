<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Kolom yang digunakan untuk login (default: email)
    public function getAuthIdentifierName()
    {
        return 'user'; // sesuaikan dengan kolom username di DB Anda
    }

    // Jika password Anda menggunakan MD5, Laravel tidak mendukungnya secara default.
    // Disarankan untuk migrasi ke bcrypt. Namun jika ingin tetap MD5, Anda perlu override method berikut:

    public function getAuthPassword()
    {
        return $this->password;
    }

    // Override method untuk memeriksa password MD5 (tidak direkomendasikan untuk keamanan)
    public function validateForPassportPasswordGrant($password)
    {
        return md5($password) === $this->password;
    }
}
