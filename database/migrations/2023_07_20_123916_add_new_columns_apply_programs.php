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
        Schema::table('apply_programs', function (Blueprint $table) {
            $table->foreignId('agent_id')->nullable();
            $table->foreignId('staff_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apply_programs', function (Blueprint $table) {
            $table->dropColumn('agent_id');
            $table->dropColumn('staff_id');
        });
    }
};
