<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commments', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_khachhang')->unsigned()->nullable();
            $table->Integer('id_sanpham')->unsigned()->nullable();
            $table->Integer('id_baiviet')->unsigned()->nullable();
            $table->string('noidung');
            $table->dateTime('ngaybl');
            $table->integer('parent_id');
            $table->string('type',10);
            $table->tinyInteger('trangthai')->default(1);
            $table->timestamps();


            $table->foreign('id_khachhang')->references('id')->on('customer');
            $table->foreign('id_sanpham')->references('id')->on('products');
            $table->foreign('id_baiviet')->references('id')->on('posts');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commments');
    }
}
