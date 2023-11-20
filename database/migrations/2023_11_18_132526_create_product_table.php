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
        Schema::dropIfExists('products');
        
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('productName');
            $table->string('description');
            $table->unsignedFloat('price');
            $table->unsignedBigInteger('category_id');
            //$table->text('categoryName');
            $table->unsignedBigInteger('seller_id')->default(1);
            $table->text('image');

            $table->foreign('category_id')
        ->references('id')
        ->on('categories') 
        ->onDelete('cascade'); 
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
