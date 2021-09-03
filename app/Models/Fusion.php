<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fusion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fusion_id',
        'meet_id'
    ];

    public function fusion(){
        return $this->belongsTo(User::class);
    }

    public function meet(){
        return $this->belongsTo(Meet::class);
    }

}
