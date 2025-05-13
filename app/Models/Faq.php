<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
    protected $fillable = ['pertanyaan', 'jawaban', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
