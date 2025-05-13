<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];

    // Relasi ke semua tabel lain
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'admin_id');
    }

    public function beritas()
    {
        return $this->hasMany(Berita::class, 'admin_id');
    }

    public function layanans()
    {
        return $this->hasMany(Layanan::class, 'admin_id');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'admin_id');
    }

    public function tentangKami()
    {
        return $this->hasMany(TentangKami::class, 'admin_id');
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'admin_id');
    }
}
