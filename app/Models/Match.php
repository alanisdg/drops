<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'match_id'
    ];

    public function match(){
        return $this->belongsTo(User::class);
    }

}
