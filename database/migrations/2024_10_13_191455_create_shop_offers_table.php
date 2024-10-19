<?php

use App\Models\Shop;
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
        Schema::create('shop_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shop::class);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('off_percentage')->nullable();
            $table->integer('off_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_offers');
    }
};
