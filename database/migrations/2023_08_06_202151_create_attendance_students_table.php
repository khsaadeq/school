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
        Schema::create('attendance_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student')->constrained('students');
            $table->foreignId('id_atendances')->constrained('atendances');
            $table->date('day_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_students');
    }
};
