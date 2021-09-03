<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|     PUBLIC
|
*/

Route::get('/', function () { return view('welcome'); });
Route::get('/privacy-policy', function () { return view('privacy'); });
Route::get('auth/facebook', [App\Http\Controllers\SocialController::class,'facebookRedirect']  );
Route::get('auth/facebook/callback', [App\Http\Controllers\SocialController::class,'loginWithFacebook']  );


Route::group(['middleware' => ['auth']], function () {
    Route::get('registration', [App\Http\Controllers\DashboardController::class,'registration']  )->name('registration');
    Route::post('/user', [App\Http\Controllers\UserController::class,'user']  );
    Route::post('/user/fields', [App\Http\Controllers\UserController::class,'fields']  );
    Route::post('/user/update', [App\Http\Controllers\UserController::class,'update']  );
    Route::get('/meet/{token}', [App\Http\Controllers\MeetController::class,'meet']  );
    Route::post('participants', [App\Http\Controllers\MeetController::class,'participants']  );
    Route::get("/broadcast", function () {
        event(new \App\Events\MessagePushed);
        dd(9);
        // also tried
        // broadcast(new \App\Events\SampleEvent);
    });
    Route::group(['middleware'=>'isUser'],function(){
        /*
        |--------------------------------------------------------------------------
        | Web Routes
        |--------------------------------------------------------------------------
        |     USER
        |
        */

        Route::get('dashboard', [App\Http\Controllers\DashboardController::class,'index']  );
        Route::post('prospects', [App\Http\Controllers\UserController::class,'prospects']  );
        Route::post('swipe', [App\Http\Controllers\SwipeController::class,'swipe']  );
        Route::post('fusions', [App\Http\Controllers\FusionController::class,'fusions']  );

    });

    Route::group(['middleware'=>'isAdmin'],function(){
        /*
        |--------------------------------------------------------------------------
        | Web Routes
        |--------------------------------------------------------------------------
        |     USER
        |
    */
    });
});



require __DIR__.'/auth.php';
