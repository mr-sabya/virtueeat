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
        Schema::create('shop2_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('zip_code');
            $table->string('card_holder_name');
            $table->string('card_month');
            $table->string('card_year');
            $table->string('cvv');

            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'approved', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop2_orders');
    }
};
