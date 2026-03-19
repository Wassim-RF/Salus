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

    public function searchDoctor(string $search) {
        return Doctor::where('specialty' , $search)->orWhere('city' , 'LIKE' , "%{$search}%")->get();
    }

    public static function getSpecialties() {
    return [
        'Cardiologist',
        'Dermatologist',
        'Neurologist',
        'Orthopedist',
        'Pediatrician',
        'Gynecologist',
        'Ophthalmologist',
        'Dentist',
        'Psychiatrist',
        'Radiologist',
        'Urologist',
        'Endocrinologist',
        'Gastroenterologist',
        'Pulmonologist',
        'Nephrologist',
        'Rheumatologist',
        'Oncologist',
        'Hematologist',
        'General Practitioner',
    ];
}
}