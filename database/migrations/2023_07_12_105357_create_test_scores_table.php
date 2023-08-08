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
        Schema::create('test_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string("english_test_type");
            $table->string("total_score")->nullable();
            $table->string("reading_score")->nullable();
            $table->string("writing_score")->nullable();
            $table->string("listening_score")->nullable();
            $table->string("speaking_score")->nullable();
            $table->string("exam_date")->nullable();
            $table->string("is_gmat")->nullable();
            $table->string("is_gre")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_scores');
    }
};
