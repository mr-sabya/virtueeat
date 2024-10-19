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
        Schema::create('shop2_product_shop2_product_color', function (Blueprint $table) {
            $table->unsignedBiginteger('shop2_product_id');
            $table->unsignedBiginteger('shop2_product_color_id');


            $table->foreign('shop2_product_id')->references('id')
                 ->on('shop2_products')->onDelete('cascade');
            $table->foreign('shop2_product_color_id')->references('id')
                ->on('shop2_product_colors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop2_product_shop2_product_color');
    }
};
