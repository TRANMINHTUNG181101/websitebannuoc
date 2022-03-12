<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_nglieu',255);
            $table->integer('gia_nhap');
            $table->string('hinh_anh',255)->nullable();
            $table->integer('so_luong');
            $table->string('don_vi_nglieu',255);
            $table->string('slug',255);
            $table->integer('ngay_nhap');
            $table->integer('ngay_het_han');
            $table->tinyInteger('trang_thai')->default(1);
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
        Schema::dropIfExists('materials');
    }
}
