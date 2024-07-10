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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('hearing');
            $table->string('height');
            $table->string('birth_weight');
            $table->string('eye_sight');
            $table->string('blood_group');
            $table->string('bmi')->nullable();
            $table->string('child_birth_registration_number');
            $table->string('weight');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('mid_wife_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
