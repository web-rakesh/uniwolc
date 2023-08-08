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
        Schema::create('screen_categories', function (Blueprint $table) {
            $table->id();
            // $table->integer('screen_id')->unsigned();
            // $table->index('screen_id');
            $table->foreignId('screen_id')->constrained('screens')->onDelete('cascade');
            // $table->foreign('screen_id')->references('id')->on('screens');
            $table->string('name', 255);
            $table->integer('has_sub_category')->unsigned()->nullable();
            $table->string('table_name', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->integer('status')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screen_categories');
    }
};
