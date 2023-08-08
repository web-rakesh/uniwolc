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
        Schema::create('education_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('education_country');
            $table->string('education_level');
            $table->string('education_scheme_grade');
            $table->string('education_average_grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_summaries');
    }
};
