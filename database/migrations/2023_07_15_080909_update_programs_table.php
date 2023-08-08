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
        Schema::table('programs', function (Blueprint $table) {
            $table->string('student_instruction')->nullable();
            $table->string('copy_passport')->nullable();
            $table->string('custodianship_declaration')->nullable();
            $table->string('proof_immunization')->nullable();
            $table->string('participation_agreement')->nullable();
            $table->string('self_introduction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('student_instruction');
            $table->dropColumn('copy_passport');
            $table->dropColumn('custodianship_declaration');
            $table->dropColumn('proof_immunization');
            $table->dropColumn('participation_agreement');
            $table->dropColumn('self_introduction');
        });
    }
};
