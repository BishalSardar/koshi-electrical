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
        Schema::create('regular_bills', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_date')->nullable();
            $table->string('gross_total_amount');
            $table->string('discount')->nullable();
            $table->string('net_total_amount');
            $table->text('remark')->nullable();
            $table->string('customer_name');
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
        Schema::dropIfExists('regular_bills');
    }
};
