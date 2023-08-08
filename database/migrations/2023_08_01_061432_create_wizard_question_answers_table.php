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
        Schema::create('wizard_question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('screen_id');
            $table->unsignedBigInteger('answer_from_category')->nullable();
            $table->unsignedBigInteger('answer_from_subcategory')->nullable();
            $table->string('answer_from_table')->nullable();
            $table->string('answer_value_from_table')->nullable();
            $table->string('answer_value')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->unsignedBigInteger('staff_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wizard_question_answers');
    }
};
