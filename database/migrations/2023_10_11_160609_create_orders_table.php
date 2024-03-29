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

            $table->date('date');

            $table->time('time');
            
            $table->unsignedDecimal('total_price', 8, 2);
            
            $table->timestamps();

            $table->unsignedBigInteger('restaurant_id');

            $table->foreign('restaurant_id')

            ->references('id')

            ->on('restaurants')

            ->onUpdate('cascade')

            ->onDelete('cascade');
            
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
