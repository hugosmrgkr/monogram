<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $fillable = ['judul', 'isi', 'gambar', 'tanggal_mulai', 'tanggal_habis', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
