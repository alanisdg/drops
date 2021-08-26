<?php

namespace App\Http\Controllers;

use App\Models\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    public function matches(){
        $matches = Match::where('user_id',Auth::user()->id)->with('match')->get();
        return $matches;
    }
}
