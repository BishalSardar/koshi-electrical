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
        Schema::create('customer_bills', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_date')->nullable();
            $table->string('invoice_type');
            $table->string('gross_total_amount');
            $table->string('discount')->nullable();
            $table->string('net_total_amount');
            $table->text('remark')->nullable();
            $table->boolean('status')->comment('0=unpaid 1=paid')->default(0);
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            // $table->unsignedBigInteger('period_id')->nullable();
            // $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
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
        Schema::dropIfExists('customer_bills');
    }
};
