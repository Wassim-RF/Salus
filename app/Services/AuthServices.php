<?php

namespace App\Services;

use App\Models\User;

class AuthServices {
    public function existeUser(string $email) {
        return User::where('email' , $email)->first();
    }

    public function createAccount(array $data) {
        return User::create($data);
    }
}