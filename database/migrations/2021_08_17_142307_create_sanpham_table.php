<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('tensanpham');
            $table->string('image');
            $table->string('image_list');
            $table->integer('gia');
            $table->longText('mota');
            $table->string('trangthai');
            $table->unsignedBigInteger('loaisanpham_id');
            $table->foreign('loaisanpham_id')->references('id')->on('loaisanpham');
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
        Schema::dropIfExists('sanpham');
    }
}
