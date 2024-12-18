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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->foreignId('room_id')->nullable()->constrained();
            $table->string('name');
            $table->string('email');;
            $table->string('phone_number');
            $table->enum('payment_method', ['down_payment', 'full_payment'])->nullable();
            $table->string('payment_status')->nullable();
            $table->dateTime('start_date');
            $table->integer('duration');
            $table->double('total_amount')->nullable();
            $table->datetime('transaction_date')->nullable();
            $table->foreignId('boarding_house_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
