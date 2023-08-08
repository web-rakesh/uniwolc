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
        Schema::create('level_of_educations', function (Blueprint $table) {
            $table->id();
            $table->string('level_name', 255);
            // $table->integer('category')->unsigned();
            $table->foreignId('category_id');
            // $table->foreign('category')->references('id')->on('categories_of_educations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_of_educations');
    }
};
