<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVegetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vegetables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longtext('description');
            $table->integer('price');
            $table->integer('discount')->nullable();
            // $table->enum('featured_product', [0,1])->default(0)->comment('0 -> disable, 1 -> enable');
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
        Schema::dropIfExists('vegetables');
    }
}
