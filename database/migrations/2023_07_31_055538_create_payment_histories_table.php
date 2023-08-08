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
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id(); // Primary key auto-incrementing column
            $table->unsignedBigInteger('student_id'); // Foreign key to link with the users table
            $table->json('Program_id'); // Foreign key to link with the users table
            $table->string('payment_method'); // The payment method used (e.g., credit card, PayPal, etc.)
            $table->decimal('amount', 10, 2); // The payment amount with two decimal places for precision
            $table->string('currency', 5); // The currency code (e.g., USD, EUR, GBP, etc.)
            $table->string('transaction_id')->unique(); // Unique identifier for the payment transaction
            $table->timestamp('payment_date')->nullable(); // Timestamp when the payment was made
            $table->string('status'); // Payment status (e.g., pending, success, failed, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_histories');
    }
};
