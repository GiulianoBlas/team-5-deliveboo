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
        Schema::create('dish_order', function (Blueprint $table) {

            $table ->unsignedBigInteger('dish_id');

            $table ->foreign('dish_id')

            ->references('id')

            ->on('dishes')

            ->onUpdate('cascade')

            ->onDelete('cascade');

            $table ->unsignedBigInteger('order_id');

            $table ->foreign('order_id')

            ->references('id')

            ->on('orders')

            ->onUpdate('cascade')

            ->onDelete('cascade');

            $table ->unsignedTinyInteger('quantity')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_order');
    }
};
