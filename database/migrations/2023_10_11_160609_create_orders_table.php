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
            
            $table->string('name', 64);
            
            $table->string('last_name', 64);
            
            $table->string('address', 255);
            
            $table->string('phone_number', 12);
            
            $table->string('email', 319);
            
            $table->unsignedDecimal('total_price', 5, 2);
            
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
