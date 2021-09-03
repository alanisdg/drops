<?php

namespace App\Http\Controllers;

use App\Models\Fusion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FusionController extends Controller
{
    public function fusions(){
        $fusions = Fusion::where('user_id',Auth::user()->id)->with('fusion')->with('meet')->get();
        return $fusions;
    }
}
