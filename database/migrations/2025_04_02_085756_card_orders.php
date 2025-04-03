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
        Schema::create('card_orders', function(Blueprint $table){
            $table->id();
            $table->UnsignedBigInteger('card_client_id');
            $table->UnsignedBigInteger('order_id');

            $table->foreign('card_client_id')->references('id')->on('card_client')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_orders');
    }
};
