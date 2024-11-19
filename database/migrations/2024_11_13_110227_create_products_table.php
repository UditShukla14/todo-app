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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit');
            $table->decimal('sales_price', 8, 2);
            $table->string('income_account')->nullable();
            $table->decimal('compare_at_price', 8, 2)->nullable();
            $table->decimal('cost_per_item', 8, 2)->nullable();
            $table->string('expense_account')->nullable();
            $table->decimal('margin', 8, 2)->nullable();
            $table->decimal('markup', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->integer('status');
            $table->integer('obsolete');
            $table->boolean('rm_image');
            $table->boolean('draft');
            $table->boolean('online_store');
            $table->boolean('charge_tax');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
