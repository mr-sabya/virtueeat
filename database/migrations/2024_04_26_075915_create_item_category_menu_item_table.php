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
        Schema::create('item_category_menu_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('menu_item_id');
            $table->unsignedBiginteger('item_category_id');


            $table->foreign('menu_item_id')->references('id')
                 ->on('menu_items')->onDelete('cascade');
            $table->foreign('item_category_id')->references('id')
                ->on('item_categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_category_menu_item');
    }
};
