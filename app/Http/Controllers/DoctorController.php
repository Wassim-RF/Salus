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

    public function show($id , DoctorServices $doctorServices) {
        $doctor = $doctorServices->afficherUneDoctor($id);

        if (!$doctor) {
            return response()->json(
            [
                "success" => false,
                "data" => [],
                "message" => "Ce doctor n'existe pas."
            ],
            201
        );
        }

        return response()->json(
            [
                "success" => true,
                "data" => [
                    'Doctor' => $doctor
                ],
                "message" => "Symptom créée avec succès"
            ],
            201
        );
    }
}
