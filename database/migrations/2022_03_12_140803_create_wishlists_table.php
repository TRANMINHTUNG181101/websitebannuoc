<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_sanpham')->unsigned()->nullable();
            $table->Integer('id_khachhang')->unsigned()->nullable();
            $table->unique(['id_sanpham']);
            $table->timestamps();


            $table->foreign('id_khachhang')->references('id')->on('customer');
            $table->foreign('id_sanpham')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}
