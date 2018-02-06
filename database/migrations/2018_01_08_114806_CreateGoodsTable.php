<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('barcode')->nullable();
            $table->string('g_name', 60);
            $table->integer('rec_price');
            $table->text('description')->nullable();
            // create foreign keys               
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')
                  ->on('categories')->onUpdate('cascade');
            $table->integer('manfac_id')->unsigned();
            $table->foreign('manfac_id')->references('id')
                  ->on('manufacturers')->onUpdate('cascade');
            $table->integer('measure_id')->unsigned();
            $table->foreign('measure_id')->references('id')
                  ->on('measures')->onUpdate('cascade');
            $table->integer('subcategories_id')->unsigned();
            $table->foreign('subcategories_id')->references('id')
                ->on('sub_categories');
        });              
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
