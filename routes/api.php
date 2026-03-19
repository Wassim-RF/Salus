<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SymptomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test' , function() {
    return response()->json();
});

// Auth
Route::post('register' , [RegisterController::class , 'register']);
Route::post('login' , [LoginController::class , 'login']);


Route::middleware('auth:sanctum')->group(function() {
    // Auth
    Route::post('logout' , [LogoutController::class , 'logout']);
    Route::get('profile' , [ProfileController::class , 'profile']);

    /* Symptom */
    //get
    Route::get('symptoms' , [SymptomController::class , 'index']);
    Route::get('symptoms/{id}' , [SymptomController::class , 'show']);

    //post
    Route::post('symptom' , [SymptomController::class , 'store']);

    //put
    Route::put('symptom/{id}' , [SymptomController::class , 'update']);

    //delete
    Route::delete('symptom/{id}' , [SymptomController::class , 'destroy']);

    /* Doctors */
    //get
    Route::get('doctors' , [DoctorController::class , 'index']);
    Route::get('doctors/{id}' , [DoctorController::class , 'show']);
});