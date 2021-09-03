<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetController extends Controller
{
    public function meet($token){
        $meet = Meet::where('token',$token)->with('boy')->with('girl')->first();
        if(empty($meet)){
            return redirect('dashboard');
        }
        if(Auth::user()->getAttributes()['gender']  == 1){
            if($meet->boy->id != Auth::user()->id){
                return redirect('dashboard');
            }
        }
        if(Auth::user()->getAttributes()['gender']  == 2){
            if($meet->girl->id != Auth::user()->id){
                return redirect('dashboard');
            }
        }
        return view('meets.meet',compact('meet','token'));
    }

    public function participants(Request $request){
        $participants = Meet::where('token',$request->token)->with('boy')->with('girl')->first();

        return $participants;
    }
}
