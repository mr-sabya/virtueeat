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
        Schema::create('favorite_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->unsignedBiginteger('menu_item_id');
            $table->integer('total_order_count');
            $table->date('last_order_date');
            $table->unsignedBiginteger('shop_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_items');
    }
};
