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
        Schema::create('education_partners', function (Blueprint $table) {
            $table->id();
            $table->integer('country' );
            $table->string('school_name');
            $table->string('name');
            $table->string('email');
            $table->integer('phone_code' );
            $table->integer('phone_number');
            $table->string('contact_title');
            $table->string('is_apply')->default(0);
            $table->string('refer_name')->nullable();
            $table->string('refer_email')->nullable();
            $table->string('comment')->nullable();
            $table->string('agree')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_partners');
    }
};
