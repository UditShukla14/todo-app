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
        Schema::create('hvac_data', function (Blueprint $table) {
            $table->id();
               $table->foreignId('product_id')->constrained()->onDelete('cascade');
               $table->string('system_type');
               $table->string('heat_source');
               $table->string('home_type');
               $table->string('air_handler_furnace_location');
               $table->string('condenser_type');
               $table->string('zip_code');
               $table->string('system_size');
               $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hvac_data');
    }
};
