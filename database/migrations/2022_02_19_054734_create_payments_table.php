<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('mancc', 100);
            $table->string('loaithanhtoan', 100);
            $table->string('sohoadon');
            $table->string('magiaodichBank',100)->nullable();
            $table->string('magiaodich',100);
            $table->string('noidung');
            $table->Integer('id_donhang')->unsigned()->nullable();
            $table->string('ngaythanhtoan');
            $table->double('tongtien');
            $table->tinyInteger('trangthai')->default(1);
            $table->timestamps();


            $table->foreign('id_donhang')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
