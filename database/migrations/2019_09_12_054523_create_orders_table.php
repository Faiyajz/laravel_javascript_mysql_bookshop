<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('phone_no');
            $table->string('email');
            $table->text('address');
            $table->integer('books');
            $table->integer('bill');
            $table->boolean('is_paid')->default(0);
            $table->boolean('delivery_status')->default(0);
            $table->string('payment_method');
            $table->string('payment_id');
            $table->unsignedInteger('transaction_id')->unique(); /** ->unique()**/
            $table->string('slug');
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
}
