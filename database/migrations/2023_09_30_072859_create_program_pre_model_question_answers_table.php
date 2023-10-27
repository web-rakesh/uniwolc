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
        Schema::create('program_pre_model_question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id');
            $table->foreignId('apply_program_id');
            $table->foreignId('student_id');
            $table->foreignId('pre_model_question_id');
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_pre_model_question_answers');
    }
};
