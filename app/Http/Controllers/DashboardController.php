<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function registration(){

        //dd(Auth::user()->SmokeValues);
        return view('registration.index');
    }


}
