<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('madh', 100);
            $table->string('hoten', 100);
            $table->string('diachi');
            $table->string('email',100);
            $table->string('ghichu')->nullable();
            $table->string('dienthoai',12);
            $table->Integer('id_nhanvien')->unsigned()->nullable();
            $table->Integer('id_khachhang')->unsigned()->nullable();
            $table->Integer('httt');
            $table->dateTime('ngaytao');
            $table->double('tongtien');
            $table->tinyInteger('trangthaithanhtoan')->default(1);
            $table->tinyInteger('trangthai')->default(1);
            $table->timestamps();


            $table->foreign('id_nhanvien')->references('id')->on('users');
            $table->foreign('id_khachhang')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
