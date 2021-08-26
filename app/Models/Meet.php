<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;

    protected $fillable = [
        'boy_id',
        'girl_id',
        'token'
    ];

    public function boy(){
        return $this->belongsTo(User::class);
    }

    public function girl(){
        return $this->belongsTo(User::class);
    }


}
