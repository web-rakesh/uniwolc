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
        Schema::create('university_profile_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('university_name');
            $table->string('slug');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->text('permit_visa')->nullable();
            $table->longText('about_university')->nullable();
            $table->longText('feature')->nullable();
            $table->text('location')->nullable();
            $table->string('founded')->nullable();
            $table->string('school_id')->nullable();
            $table->string('provider_id_number')->nullable();
            $table->string('institution_type')->nullable();
            $table->string('blocked_country')->nullable();
            $table->longText('letter_of_acceptance')->nullable();
            $table->longText('disciplines')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_profile_details');
    }
};
