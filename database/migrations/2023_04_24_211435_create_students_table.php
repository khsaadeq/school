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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('address');
            $table->String('school');
            $table->foreignId('identity_id')->constrained('identities');
            $table->integer('number_identity')->nullable();
            // $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('nationality_id')->constrained('Nationality');
            $table->foreignId('guardian_id')->constrained('parents');
            $table->string('link_kinship');
            $table->String('previous_save');
            $table->Date('date_Join');
            $table->foreignId('quran_episod_id')->constrained('quran_episodes');
            // $table->string('image')->default('null');
            $table->Date('birth_date');
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
