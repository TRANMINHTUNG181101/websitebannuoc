<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_donhang')->unsigned()->nullable();
            $table->Integer('id_sanpham')->unsigned()->nullable();
            $table->Integer('id_size')->unsigned()->nullable();

            $table->Integer('soluong');
            $table->double('giaban');
            $table->timestamps();


            $table->foreign('id_donhang')->references('id')->on('orders');
            $table->foreign('id_sanpham')->references('id')->on('products');
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
        Schema::dropIfExists('order_details');
    }
}
