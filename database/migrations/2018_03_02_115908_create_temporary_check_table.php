<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporaryCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_check', function (Blueprint $table) {
            $table->unique('id');
            $table->string('name');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('price');
            $table->unsignedInteger('amount');
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
        Schema::dropIfExists('temporary_check');
    }
}
