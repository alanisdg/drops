<?php

namespace App\Http\Controllers;

use App\Models\Swipe;
use App\Models\Match;
use App\Models\Meet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Match_;

class SwipeController extends Controller
{
    public function swipe(Request $request){
        if($request->move == 1){
            Swipe::create([
                'swiper_id'=>Auth::user()->id,
                'target_id'=>$request->target_id,
                'swipe'=>1
            ]);
        }
        if($request->move == 0){
            //NO
            Swipe::create([
                'swiper_id'=>Auth::user()->id,
                'target_id'=>$request->target_id,
                'swipe'=>0
            ]);
        }
        $match = Swipe::where('swiper_id',$request->target_id)->where('target_id',Auth::user()->id)->where('swipe',1)->count();
        if($match == 1){
            // @ts-ignore
            Match::create([
                'user_id'=>Auth::user()->id,
                'match_id'=>$request->target_id
            ]);

            Match::create([
                'user_id'=>$request->target_id,
                'match_id'=>Auth::user()->id
            ]);

            if(Auth::user()->gender == 0){
                $boy = Auth::user()->id;
                $girl = $request->target_id;
            }else{
                $girl = Auth::user()->id;
                $boy = $request->target_id;
            }
            Meet::create([
                'boy_id'=>$boy,
                'girl_id'=>$girl,
                'token'=>md5(rand(1, 10) . microtime())
            ]);

        }
        return $match;
    }
}
