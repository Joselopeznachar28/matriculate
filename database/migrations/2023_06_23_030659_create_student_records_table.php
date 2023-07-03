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
        Schema::create('student_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('lastnames');
            $table->text('names');
            $table->text('type_student'); //Regular o repitiente
            $table->integer('inscription_number')->unique();
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
            $table->text('repeat_with')->nullable();
            $table->text('pending_matter')->nullable();
            $table->text('school_background');
            $table->text('state_actual');
            $table->text('municipality_actual');
            $table->text('parish_actual');
            $table->text('sector');
            $table->text('reference_point');
            $table->text('pattern_names');
            $table->text('pattern_lastnames');
            $table->integer('pattern_identification')->unique();
            $table->text('pattern_state_of_birth');
            $table->date('pattern_birthdate');
            $table->text('pattern_place_of_birth');
            $table->text('pattern_gender');
            $table->text('pattern_civil_status');
            $table->text('pattern_affinity');
            $table->text('pattern_profession');
            $table->text('pattern_phone');
            $table->text('student_live_with');
            $table->date('inscription_date');
            $table->text('registration_made_by');
            $table->text('observation')->nullable();

            $table->foreignId('year_school_id')->constrained('year_schools')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_records');
    }
};
