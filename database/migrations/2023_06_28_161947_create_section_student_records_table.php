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
        Schema::create('section_student_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('student_record_id')->constrained('student_records')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_student_records');
    }
};
