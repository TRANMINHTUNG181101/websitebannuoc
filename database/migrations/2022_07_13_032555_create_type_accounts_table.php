<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateTypeAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_accounts', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('type_account',255);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
        DB::table('type_accounts')->insert(
            array(
                [
                    'type_account' => "admin",
                ],
                [
                    'type_account' => "nhân viên bán hàng",
                ],
                [
                    'type_account' => "nhân viên pha chế",
                ],
                [
                    'type_account' => "nhân viên thu ngân",
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
        Schema::dropIfExists('type_accounts');
    }
    

}
