<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size_color', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_size');
            $table->foreign('id_size')->references('id')->on('size_product');

            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');

            $table->unsignedBigInteger('id_color');
            $table->foreign('id_color')->references('id')->on('color_product');

            $table->string('quantity')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_size_color');
    }
};
