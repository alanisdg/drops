<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'swiper_id',
        'target_id',
        'swipe'
    ];
}
