<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSymptomRequest;
use App\Http\Requests\UpdateSymptomRequest;
use App\Services\SymptomServices;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index(Request $request , SymptomServices $symptomServices) {
        $user = $request->user();

        $symptoms = $symptomServices->showAllUserSymptom($user);

        return response()->json(
            [
                "success" => true,
                "data" => [
                    'Symptoms' => $symptoms
                ],
                "message" => "Symptom créée avec succès"
            ],
            200
        );
    }

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

    public function update($id , Request $request , UpdateSymptomRequest $updateSymptomRequest , SymptomServices $symptomServices) {
        $user = $request->user();
        $symptom = $user->symptoms()->find($id);

        if (!$symptom) {
            return response()->json(
                [
                    "success" => false,
                    "data" => [],
                    "message" => "Cette symtom n'existe pas."
                ],
                404
            );
        }

        $data = [
            'name' => $updateSymptomRequest->name,
            'severity' => $updateSymptomRequest->severity,
            'description' => $updateSymptomRequest->description,
            'date_recorded' => $updateSymptomRequest->date_recorded,
            'notes' => $updateSymptomRequest->notes
        ];

        $symptom = $symptomServices->updateSymptom($$symptom->id , $data);

        return response()->json(
            [
                "success" => true,
                "data" => [
                    'Symptom' => $symptom
                ],
                "message" => "Symptom créée avec succès"
            ],
            200
        );
    }

    public function destroy($id , Request $request , SymptomServices $symptomServices) {
        $user = $request->user();
        $symptom = $user->symptoms()->find($id);

        if (!$symptom) {
            return response()->json(
                [
                    "success" => false,
                    "data" => [],
                    "message" => "Cette symtom n'existe pas."
                ],
                404
            );
        }

        $symptomServices->deleteSymptom($id);

        return response()->json(
            [
                "success" => true,
                "data" => [],
                "message" => "Symptom suprimer avec succès"
            ],
            201
        );
    }
}
