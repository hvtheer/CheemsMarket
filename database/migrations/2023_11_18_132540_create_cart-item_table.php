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
        Schema::create('cart-item', function (Blueprint $table) {
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('userId');
            $table->primary(['productId', 'userId']); 
            $table->string('sku');
            $table->unsignedFloat('discount');
            $table->unsignedInteger('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart-item');
    }
};
