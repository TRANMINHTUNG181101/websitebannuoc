<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('tieude', 100)->unique();
            $table->string('slug', 100);
            $table->text('noidung');
            $table->string('hinhanh',100);
            $table->Integer('id_danhmuc')->unsigned();
            $table->tinyInteger('hot')->default(0);
            $table->tinyInteger('trangthai')->default(1);
            $table->timestamps();


            $table->foreign('id_danhmuc')->references('id')->on('menu_posts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
