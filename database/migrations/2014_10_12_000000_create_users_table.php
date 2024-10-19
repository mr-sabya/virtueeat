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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_email_verified')->default(0);
            $table->string('password');
            $table->string('otp')->nullable();
            $table->boolean('is_phone_verified')->default(0);
            $table->string('image')->nullable();
            $table->string('address')->nullable();

            // 
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('vehicle_type')->nullable();
            $table->integer('location_id')->nullable();

            $table->tinyInteger('user_type')->comment("0 => user, 1 => merchant, 2 => rider")->default(0);

            // shop profile
            $table->integer('shop_id')->nullable();

            $table->boolean('is_active')->default(0);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
