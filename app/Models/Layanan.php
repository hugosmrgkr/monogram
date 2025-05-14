<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanans';
    protected $fillable = ['judul', 'keterangan', 'gambar', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
