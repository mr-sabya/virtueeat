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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();

            // compnay info
            $table->string('company_name');
            $table->string('address');
            
            $table->string('tax_file_number')->nullable();
            $table->integer('employee_size_id')->nullable();
            $table->string('street_number')->nullable();
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('post_code');

            // shop
            $table->integer('shop_category_id');
            $table->decimal('delivery_charge', 10, 2)->nullable();
            $table->string('delivery_time')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            

            $table->string('color')->nullable();
            $table->string('font')->nullable();
            $table->string('location_id')->nullable();

            $table->boolean('is_approved');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
