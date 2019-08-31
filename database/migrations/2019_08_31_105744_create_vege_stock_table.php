<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVegeStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vege_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vegetable_id');
            $table->enum('limited_qty', [0,1])->default(0)->comment('0 -> disable, 1 -> enable');
            $table->integer('stock');
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
        Schema::dropIfExists('vege_stock');
    }
}
