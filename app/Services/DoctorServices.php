<?php

namespace App\Services;

use App\Models\Doctor;

class DoctorServices {
    public function afficherAllDoctor() {
        return Doctor::all();
    }

    public function afficherUneDoctor(int $id) {
        return Doctor::find($id);
    }
}