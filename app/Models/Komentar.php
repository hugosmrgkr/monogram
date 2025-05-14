<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'komentars';

    // Kolom yang dapat diisi
    protected $fillable = ['nama', 'komentar', 'status', 'is_approve', 'admin_id'];

    // Casting tipe data
    protected $casts = [
        'is_approve' => 'boolean',
    ];

    /**
     * Scope untuk hanya komentar yang sudah disetujui
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approve', true);
    }

    /**
     * Relasi: Komentar dimiliki oleh Admin
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
