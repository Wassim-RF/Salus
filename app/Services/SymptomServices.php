<?php

namespace App\Services;

use App\Models\Symptom;

class SymptomServices {
    public function createSymptom(array $data) {
        return Symptom::create($data);
    }

    public function updateSymptom(int $id , array $data) {
        return Symptom::find($id)->update($data);
    }
}