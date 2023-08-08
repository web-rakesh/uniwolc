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
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email');
            $table->string('country_code');
            $table->string('mobile_number');
            $table->string('alt_country_code');
            $table->string('alt_mobile_number');
            $table->string('country');
            $table->text('address');
            $table->string('city');
            $table->integer('pincode');
            $table->string('passport_number');
            $table->timestamp('passport_expiry_date');
            $table->string('marital_status');
            $table->string('gender');
            $table->timestamp('dob');
            $table->string('fast_language');
            $table->string('website');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('facebook');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
