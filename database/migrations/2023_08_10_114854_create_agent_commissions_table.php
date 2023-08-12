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
        Schema::create('agent_commissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('apply_program_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('program_fees');
            $table->unsignedBigInteger('commission');
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('status')->default(0);
            $table->unsignedBigInteger('payment_status')->default(0);
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_commissions');
    }
};
