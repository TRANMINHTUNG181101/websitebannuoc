<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // $table->increments('id');
            // $table->string('ten_san_pham',255);
            // $table->integer('gia_ban');
            // $table->string('hinh_anh',255);
            // $table->string('mo_ta_san_pham',255)->nullable();
            // $table->string('slug',255);
            // $table->tinyInteger('trang_thai')->default(1);
            $table->Increments('id');
            $table->string('tensp', 100)->unique();
            $table->string('slug', 100);
            $table->text('mota');
            $table->text('hinhanh',100);
            $table->text('noidung')->nullable();
            $table->Integer('id_loaisanpham')->unsigned();
            $table->double('giaban');
            $table->tinyInteger('trangthai')->default(1);

            $table->timestamps();

            $table->foreign('id_loaisanpham')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
