<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Tentukan kolom primary key
    protected $primaryKey = 'galeri_id';

    // Tentukan kolom yang bisa diisi
    protected $fillable = ['kategori', 'gambar'];
}
