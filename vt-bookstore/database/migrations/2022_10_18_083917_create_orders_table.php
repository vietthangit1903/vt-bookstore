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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('totalPrice', $precision = 9, $scale = 2);
            $table->string('orderStatus')->default('Processing');
            $table->string('paymentStatus')->default('Unpaid');
            $table->string('paymentMethod');
            $table->string('transactionId')->nullable();
            $table->date('transDate')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('address_id')->constrained('addresses');
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
        Schema::dropIfExists('orders');
    }
};
