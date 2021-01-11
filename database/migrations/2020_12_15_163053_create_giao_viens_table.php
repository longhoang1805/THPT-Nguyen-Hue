<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiaoViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_viens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ho_ten');
            $table->string('ngay_sinh');
            $table->string('gioi_tinh');
            $table->string('dien_thoai');
            $table->string('email');
            $table->string('bo_mon');
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
        Schema::dropIfExists('giao_viens');
    }
}
