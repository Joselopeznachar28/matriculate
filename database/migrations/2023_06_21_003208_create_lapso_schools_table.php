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
        Schema::create('lapso_schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->date('init')->unique();
            $table->date('end')->unique();
            $table->boolean('upload_note')->default(0);
            $table->boolean('active')->default(0);
            
            $table->foreignId('academic_period_id')->constrained('academic_periods')->onDelete('cascade')->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapso_schools');
    }
};
