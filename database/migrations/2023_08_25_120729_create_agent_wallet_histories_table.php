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
        Schema::create('agent_wallet_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->string('transaction_id')->nullable();
            $table->string('transaction_amount');
            $table->string('transaction_currency');
            $table->string('transaction_status')->default(0);
            $table->timestamp('transaction_date')->nullable();
            $table->string('transaction_remark');
            $table->string('transaction_reject_reason')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->string('transaction_note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_wallet_histories');
    }
};
