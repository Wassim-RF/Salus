<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthServices;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $loginRequest , AuthServices $authServices) {
        $user = $authServices->existeUser($loginRequest->email);

        if (!$user) {
            return response()->json(
                [
                    "success" => false, 
                    "data" => [], 
                    "message" => "Acune utilisateur existe avec cet email."
                ],
                401
            );
        }

        if (!Hash::check($loginRequest->password , $user->password)) {
            return response()->json(
                [
                    "success" => false, 
                    "data" => [], 
                    "message" => "Mot de passe est incorrect"
                ],
                401
            );
        }
        
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json(
            [
                "success" => true, 
                "data" => [
                    'user' => $user,
                    'token' => $token
                ], 
                "message" => "Bonjour $user->name"
            ],
            200
        );
    }
}
