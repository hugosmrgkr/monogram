<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model
    protected $table = 'tentang_kami';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'jam_buka_hari_biasa',
        'jam_tutup_hari_biasa',
        'jam_buka_akhir_pekan',
        'jam_tutup_akhir_pekan',
        'kontak_wa',
        'kontak_ig',
    ];

    public $timestamps = true;
}
