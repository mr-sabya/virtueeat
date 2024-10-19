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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('shop_id');
            $table->integer('category_id');
            $table->integer('dietary_id');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->string('thumbnail')->nullable();
            $table->text('description');
            $table->string('delivery_time')->nullable();

            $table->boolean('is_approved');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
