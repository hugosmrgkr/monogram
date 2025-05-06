<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'komentars';

    // Kolom yang boleh diisi secara massal
    protected $fillable = ['nama', 'komentar', 'status', 'is_approve'];

    // Casting untuk memastikan nilai boolean diproses dengan benar
    protected $casts = [
        'is_approve' => 'boolean',
    ];

    // Scope untuk hanya mengambil komentar yang disetujui
    public function scopeApproved($query)
    {
        return $query->where('is_approve', true);
    }
}
