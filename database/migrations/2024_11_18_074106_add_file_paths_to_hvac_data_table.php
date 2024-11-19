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
        Schema::table('hvac_data', function (Blueprint $table) {
            $table->json('file_paths')->nullable()->after('system_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hvac_data', function (Blueprint $table) {
            $table->dropColumn('file_paths');
        });
    }
};
