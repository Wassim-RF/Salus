<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSymptomRequest;
use App\Services\SymptomServices;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function store(Request $request , StoreSymptomRequest $storeSymptomRequest , SymptomServices $symptomServices) {
        $user = $request->user();

        $data = [
            'name' => $storeSymptomRequest->name,
            'description' => $storeSymptomRequest->description,
            'notes' => $storeSymptomRequest->notes,
            'severity' => $storeSymptomRequest->severity,
            'user_id' => $user->id
        ];

        $symptom = $symptomServices->createSymptom($data);

        return response()->json(
            [
                "success" => true,
                "data" => [
                    'Symptom' => $symptom
                ],
                "message" => "Symptom créée avec succès"
            ],
            201
        );
    }
}
