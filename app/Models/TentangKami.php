<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;

    protected $table = 'tentang_kami';
    protected $fillable = [
        'jam_buka_hari_biasa', 'jam_tutup_hari_biasa',
        'jam_buka_akhir_pekan', 'jam_tutup_akhir_pekan',
        'kontak_wa', 'kontak_ig', 'admin_id'
    ];
    public $timestamps = true;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
