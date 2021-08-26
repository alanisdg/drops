<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function prospects(){

        $user = User::find(Auth::user()->id);
        $gender = $user->getAttributes()['gender'];
        if($gender == 1){
            $prospects = User::where('gender',2)->get();
        }
        if($gender == 2){
            $prospects = User::where('gender',1)->get();
        }
        return $prospects;
    }
    public function user(){
        return Auth::user();
    }

    public function fields(){
        $fields = array(
            array
            (
            'id'=>1,
            'name'=>'gender',
            'question'=>'¿Tu genero?',
            'values'=> Auth::user()->GenderValues
            ),
            array(
                'id'=>2,
                'name'=>'birthday',
                'question'=>'¿Fecha de nacimiento?'
                ),
            array(
                'id'=>3,
                'name'=>'smoke',
                'question'=>'¿Fumas?',
                'values'=> Auth::user()->SmokeValues
                )
        );
        return $fields;
    }

    public function update(Request $request){
        $user = Auth::user();
        $fields = array();
        foreach($request->fields as $index => $field){
            $fields[$field['name']] =  $field['value'] ;
        }
        $fields['new_user'] =  1 ;
        $user->fill($fields)->save();

        return $user;
    }
}
