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
            $table->bigIncrements('id');
            $table->text('lastnames');
            $table->text('names');
            $table->integer('identification')->unique();
            $table->string('gender');
            $table->date('birthdate');
            $table->text('place_of_birth');
            $table->text('municipality');
            $table->text('state');
            $table->string('laterality');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('footwear');
            $table->integer('pants');
            $table->integer('shirt');
            $table->integer('brachial_measure');
            $table->integer('birth_order');
            $table->string('disease')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('school_background');
            $table->text('state_actual');
            $table->text('municipality_actual');
            $table->text('parish_actual');
            $table->text('sector');
            $table->text('reference_point');
            $table->text('student_live_with');
            $table->boolean('status')->default(0);

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
