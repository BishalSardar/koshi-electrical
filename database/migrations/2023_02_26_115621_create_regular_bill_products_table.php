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
        Schema::create('regular_bill_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regularBill_id');
            $table->unsignedBigInteger('product_id');
            $table->string('quantity');
            $table->string('rate');
            $table->string('unit');
            $table->string('amount');

            $table->foreign('regularBill_id')->references('id')->on('regular_bills')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('regular_bill_products');
    }
};
