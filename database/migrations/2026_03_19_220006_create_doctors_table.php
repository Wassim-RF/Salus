<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('specialty', [
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
                'Infectiologist',
                'General Practitioner',
            ]);
            $table->string('city');
            $table->integer('years_of_experience');
            $table->float('consultation_price');
            $table->json('available_days');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
