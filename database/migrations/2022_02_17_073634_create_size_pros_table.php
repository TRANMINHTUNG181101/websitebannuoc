<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeProsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_pros', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pro');
            $table->integer('id_size')->unsigned();
            $table->timestamps();
            $table->foreign('id_pro')->references('id')->onDelete('cascade');
            $table->foreign('id_size')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size_pros');
    }
}
