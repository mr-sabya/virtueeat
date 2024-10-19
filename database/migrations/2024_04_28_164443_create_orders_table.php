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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('rider_id')->nullable();
            $table->string('address_type');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('delivery_time_type');
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->unsignedBigInteger('payment_card_id')->nullable();
            $table->decimal('sub_total', 10, 2);
            $table->decimal('delivery_charge', 10, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('total', 10, 2);
            $table->unsignedInteger('status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
