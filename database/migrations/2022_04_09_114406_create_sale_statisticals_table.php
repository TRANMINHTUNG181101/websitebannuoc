<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleStatisticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('sale_statisticals', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->date('ngay_ban');
            $table->integer('id_don_hang');
            $table->integer('tien_don_hang');
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
        Schema::dropIfExists('sale_statisticals');
    }
}
