<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $fillable = [
        'weekday_open',
        'weekday_close',
        'weekend_open',
        'weekend_close',
        'kontak_wa',
        'kontak_ig',
    ];
}
