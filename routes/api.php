<?php

use App\Events\sendEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::post('event', function (Request $request) {
    
    $data = $request;
    // return response($request);
    event(new sendEvent($data->all()));
});




Route::get('/x',function(){

    return User::where('id',Auth::id())->get();
 
});

