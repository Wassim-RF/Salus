<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthServices;
use Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $registerRequest , AuthServices $authServices) {
        $user = $authServices->existeUser($registerRequest->email);

        if ($user) {
            return response()->json(
                [
                    "success" => false, 
                    "data" => [], 
                    "message" => "Cet email est déjà associé à un compte existant."
                ],
                401
            );
        }

        $data = [
            'name' => $registerRequest->name,
            'email' => $registerRequest->email,
            'password' => Hash::make($registerRequest->password)
        ];
        $newUser = $authServices->createAccount($data);

        $token = $newUser->createToken('auth-token')->plainTextToken;

        return response()->json(
            [
                    "success" => true, 
                    "data" => [
                        'user' => $newUser,
                        'token' => $token
                    ], 
                    "message" => "Bonjour $newUser->name, votre compte a été créé avec succès."
                ] ,
                201
        );
    }
}
