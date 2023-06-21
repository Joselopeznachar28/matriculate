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
        Schema::create('period_years', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('academic_period_id')->constrained('academic_periods')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('year_id')->constrained('year_schools')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('period_years');
    }
};
