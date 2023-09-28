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
        Schema::create('school_commissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->string('applicable')->nullable();
            $table->string('payment_type')->nullable();
            $table->decimal('min')->nullable();
            $table->decimal('max')->nullable();
            $table->string('tax_type_percentage')->nullable();
            $table->string('variable_factor')->nullable();
            $table->string('installment_pay_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_commissions');
    }
};
