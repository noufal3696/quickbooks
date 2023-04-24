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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id');
            $table->string('token', 15);
            $table->string('transaction_type', 1);
            $table->boolean('transaction_status');
            $table->string('merchant_code', 30);
            $table->string('merchant_name', 100);
            $table->string('merchant_country', 3);
            $table->string('currency', 3);
            $table->float('amount');
            $table->string('transaction_currency', 5);
            $table->float('transaction_amount', 5);
            $table->string('auth_code', 20);
            $table->dateTime('transaction_date');

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
        Schema::dropIfExists('transactions');
    }
};
