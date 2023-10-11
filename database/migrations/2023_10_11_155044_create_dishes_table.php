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
        Schema::create('dishes', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('restaurant_id');

            $table->foreign('restaurant_id')

                    ->references('id')

                    ->on('resturants')

                    ->onUpdate('cascade')

                    ->onDelete('cascade');

            $table->string('name', 70);

            $table->text('ingredients');
            
            $table->text('description');

            $table->unsignedDecimal('price', 4, 2);
            
            $table->boolean('available')->default(true);
            
            $table->sring('image', 2048)->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
