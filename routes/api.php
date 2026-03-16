<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test' , function() {
    return response()->json();
});

Route::post('/register' , [RegisterController::class , 'register']);
