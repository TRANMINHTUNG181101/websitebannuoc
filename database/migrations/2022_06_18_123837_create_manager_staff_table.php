<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_staff', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('email',255)->nullable();
            $table->string('name_staff',255)->nullable();
            $table->string('password')->nullable();
            $table->string('roles',55)->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('manager_staff');
    }
}
