<?php

namespace App\Http\Controllers;

use App\Models\Fusion;
use App\Models\Swipe;
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
        $result = Swipe::where('swiper_id',$request->target_id)->where('target_id',Auth::user()->id)->where('swipe',1)->count();
        $fusion = 0;
        if($result == 1){
            if(Auth::user()->getAttributes()['gender'] == 1){
                $boy = Auth::user()->id;
                $girl = $request->target_id;
            }else{
                $girl = Auth::user()->id;
                $boy = $request->target_id;
            }

            $meet = Meet::create([
                'boy_id'=>$boy,
                'girl_id'=>$girl,
                'token'=>md5(rand(1, 10) . microtime())
            ]);

            $fusion = Fusion::create([
                'user_id'=>Auth::user()->id,
                'fusion_id'=>$request->target_id,
                'meet_id' => $meet->id
            ]);
            $fusion->load('fusion');
            $fusion->load('meet');

            Fusion::create([
                'user_id'=>$request->target_id,
                'fusion_id'=>Auth::user()->id,
                'meet_id' => $meet->id
            ]);




        }

        return response()->json([
            'result' => $result,
            'fusion' => $fusion,
        ]);
    }
}
