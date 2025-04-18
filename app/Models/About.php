<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';

    protected $fillable = [
        'title',
        'description',
        'image',
        'horizontal_images',
        'closing_paragraph',
        'gallery_images',
        'weekday_open',
        'weekday_close',
        'weekend_open',
        'weekend_close',
    ];

}
