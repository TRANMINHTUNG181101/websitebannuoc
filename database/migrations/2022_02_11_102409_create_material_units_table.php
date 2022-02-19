<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMaterialUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_don_vi', 255);
            $table->tinyInteger('trang_thai')->default(1);
            $table->timestamps();
        });

        DB::table('material_units')->insert(
            array(
                [
                    'ten_don_vi' => "ký",
                ],
                [
                    'ten_don_vi' => "Lon",
                ],
                [
                    'ten_don_vi' => "cái",
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('material_units');
    }
}
