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
        Schema::create('orders', function(Blueprint $table){
            $table->id();
            $table->enum('status_order', ['Готов', 'Готовиться']);
            $table->enum('payment_method', ['Ипотека','Наличные']);
            $table->datetime('date');
            $table->tinytext('address');
            $table->enum('Status_payment', ['Оплачен','Принят']);
            $table->string('lastname');
            $table->string('firstname');
            $table->string('patronymic');
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
