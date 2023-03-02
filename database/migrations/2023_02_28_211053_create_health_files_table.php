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
        Schema::create('health_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->string('blood_type')->nullable();
            $table->text('allergies')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->string('conditions')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('medications')->nullable();
            $table->string('operations')->nullable();
            $table->string('exercise')->nullable();
            $table->string('alcohol')->nullable();
            $table->string('caffeine')->nullable();
            $table->string('diet')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_files');
    }
};
