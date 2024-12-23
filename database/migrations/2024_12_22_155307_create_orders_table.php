<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('order_date');
            $table->boolean('status') ->default(0); //0: Đã thanh toán , 1: Chua thanh toán
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
