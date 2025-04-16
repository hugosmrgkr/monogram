<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'ulasan', 'is_approved'];

    // Scope untuk hanya ulasan yang disetujui
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }
}
