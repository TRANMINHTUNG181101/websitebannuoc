<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('ten', 100)->nullable();
            $table->string('sodienthoai', 100)->nullable();
            $table->string('diachi')->nullable();
            $table->string('email',100)->unique();
            $table->text('password');
            $table->string('id_social')->nullable();
            $table->string('type_social',100)->nullable();
            $table->string('token')->nullable();
            $table->tinyInteger('trangthai')->default(1);
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
        Schema::dropIfExists('customers');
    }
}
