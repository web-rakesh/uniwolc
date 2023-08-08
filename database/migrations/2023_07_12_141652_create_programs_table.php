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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string("program_title");
            $table->string("slug");
            $table->longText("program_summary");
            $table->string("minimum_level_education");
            $table->string("minimum_gpa");
            $table->string("ielt");
            $table->string("program_level");
            $table->string("program_length");
            $table->string("cost_of_living");
            $table->string("gross_tuition");
            $table->string("application_fee");
            $table->string("agent_commission");
            $table->timestamp("deadline");
            $table->string("program_intake");
            $table->timestamp("program_till_date");
            $table->longText("commission_breakdown");
            $table->longText("disclaimer");
            $table->longText("program_language_test");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
