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
        Schema::create('screen_subcategories', function (Blueprint $table) {
            $table->id();
            // $table->integer('category_id')->unsigned();
            // $table->index('category_id');
            // $table->foreign('category_id')->references('id')->on('screen_categories');
            $table->foreignId('category_id')->constrained('screen_categories')->onDelete('cascade');
            $table->string('name',255)->nullable();
            $table->integer('has_category')->unsigned()->nullable();
            // $table->integer('parent_screen_id')->unsigned();
            // $table->index('parent_screen_id');
            // $table->foreign('parent_screen_id')->references('id')->on('screens');
            $table->foreignId('parent_screen_id')->constrained('screens')->onDelete('cascade');
            $table->integer('screen_id')->unsigned();
            $table->integer('status')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screen_subcategories');
    }
};
