<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('role', 30);
    // создание поля для связывания с таблицей shops
            $table->integer('shop_id')->unsigned();
    //создание внешнего ключа для поля 'shop_id', который связан с полем id таблицы 'shops'
            $table->foreign('shop_id')->references('id')
                  ->on('shops')->onUpdate('no action');
            
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
        Schema::dropIfExists('users');
    }
}
