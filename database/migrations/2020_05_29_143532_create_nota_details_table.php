<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_details', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('nota_id');          
          $table->integer('produk_id');
          $table->integer('qty');
          $table->integer('total');
          $table->integer('keuntungan');
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
        Schema::dropIfExists('nota_details');
    }
}
