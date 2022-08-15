<?php

use App\Events\sendEvent;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/user', function () {
 
    return response (['id'=>Auth::user()->id,'name' => Auth::user()->name]);
});













Route::get('/login/1', function () {

    Auth::attempt([

        'email' => 'one@one.com',
        'password' => 12341234
    ]);
    response('goccha !');
    return back();
})->name("loginOne");

Route::get('/login/2', function () {
    Auth::attempt([

        'email' => 'two@two.com',
        'password' => 12341234
    ]);

    return back();
})->name("loginTwo");


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
