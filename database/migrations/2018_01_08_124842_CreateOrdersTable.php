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
            $table->increments('id');
            $table->integer('quantity')->unsigned();
            $table->integer('rem_goods')->unsigned();
            $table->integer('price')->unsigned();
            // foreign keys
            $table->integer('goods_id')->unsigned();
            $table->foreign('goods_id')->references('id')
                  ->on('goods')->onUpdate('cascade');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')
                  ->on('shops')->onUpdate('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
                  ->on('users')->onUpdate('cascade');
            
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
