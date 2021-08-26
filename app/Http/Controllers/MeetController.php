<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetController extends Controller
{
    public function meet($token){
        $meet = Meet::where('token',$token)->with('boy')->with('girl')->get();

        return view('meets.meet',compact('meet','token'));
    }

    public function participants(Request $request){
        $participants = Meet::where('token',$request->token)->with('boy')->with('girl')->first();

        return $participants;
    }
}
