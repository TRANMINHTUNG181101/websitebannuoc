<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('permission',50);
            $table->string('type_acc',50)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
        
        DB::table('roles')->insert(
            array(
                [
                    'permission' => "access",
                ],
                [
                    'permission' => "edit",
                ],
                [
                    'permission' => "delete",
                ],
                [
                    'permission' => "add",
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
        Schema::dropIfExists('roles');
    }
}
