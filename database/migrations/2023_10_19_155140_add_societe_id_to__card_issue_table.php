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
        Schema::table('CardIssue', function (Blueprint $table) {
            $table->unsignedBigInteger('societe_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('CardIssue', function (Blueprint $table) {
            $table->dropColumn('societe_id');
        });
    }
};
