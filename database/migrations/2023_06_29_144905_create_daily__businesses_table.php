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
        Schema::create('daily__businesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student')->constrained('students');
            // $table->foreignId('id_atendances')->constrained('atendances');
            $table->String('from_surah');
            $table->integer('from_ayah');
            $table->String('to_surah')->nullable();
            $table->integer('to_ayah')->nullable();
            $table->String('seve_or_ver');
            $table->integer('degree');
            $table->date('day_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily__businesses');
    }
};
