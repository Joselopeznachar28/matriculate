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
        Schema::create('section_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_teachers');
    }
};
