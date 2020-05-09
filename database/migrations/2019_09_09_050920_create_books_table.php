<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('writer_id');
            $table->integer('category_id');
            $table->string('cover_page');
            $table->string('preview_page');
            $table->integer('sales')->default(0);
            $table->integer('count_rating')->default(0);
            $table->integer('avg_rating')->default(0);
            $table->integer('reviews')->default(0)->comment('number of custoemr reivews');
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
        Schema::dropIfExists('books');
    }
}
