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
        Schema::create('program_pre_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id');
            $table->foreignId('program_pre_id')->nullable();
            $table->foreignId('student_id')->nullable();
            $table->enum('type', ['submission', 'payment']);
            $table->enum ('status', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_pre_uploads');
    }
};
