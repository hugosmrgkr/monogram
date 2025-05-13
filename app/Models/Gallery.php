<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $primaryKey = 'galeri_id';
    protected $fillable = ['kategori', 'gambar', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
