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
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('documents')->nullable();
            $table->string('schedule')->nullable();
            $table->string('specialty')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('about')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->date('bod')->nullable();
            $table->string('gender')->nullable();
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
