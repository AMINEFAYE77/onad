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
        Schema::table('OutRecord', function (Blueprint $table) {
             $table->string('zone')->nullable();
             $table->string('provenance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('OutRecord', function (Blueprint $table) {
              $table->dropColumn('zone');
             $table->dropColumn('provenance');
        });
    }
};
