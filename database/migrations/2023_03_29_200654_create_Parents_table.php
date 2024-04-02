<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\QueryException ;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('gender_id')->constrained('genders');
            $table->string('job');
            $table->string('social_status');
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
        Schema::dropIfExists('guardian');
    }
};
