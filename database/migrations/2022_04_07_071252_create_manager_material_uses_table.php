<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerMaterialUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_material_uses', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('id_nguyen_lieu');
            $table->tinyInteger('trang_thai')->default(1);
            $table->integer('so_luong');
            $table->integer('don_gia');
            $table->date('ngay_tong_ket');
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
        Schema::dropIfExists('manager_material_uses');
    }
}
