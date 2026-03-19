<?php

namespace App\Http\Controllers;

use App\Services\DoctorServices;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(DoctorServices $doctorServices) {
        $doctors = $doctorServices->afficherAllDoctor();

        return response()->json(
            [
                "success" => true,
                "data" => [
                    'Doctors' => $doctors
                ],
                "message" => "Symptom créée avec succès"
            ],
            201
        );
    }
}
