<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade'); // FK ke carts
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK ke users
            $table->string('invoice_id', 50)->unique(); // ID invoice unik
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending'); // Status pembelian
            $table->string('payment_method', 50); // Metode pembayaran
            $table->enum('payment_status', ['pending', 'success', 'failed'])->default('pending'); // Status pembayaran
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
