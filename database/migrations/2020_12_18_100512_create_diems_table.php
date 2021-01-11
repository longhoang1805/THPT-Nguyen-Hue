<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_hocsinh')->unsigned();
            $table->foreign('id_hocsinh')->references('id')->on('hoc_sinhs');

            $table->integer('id_monhoc')->unsigned();
            $table->foreign('id_monhoc')->references('id')->on('mon_hocs');

            $table->integer('id_hocky')->unsigned();
            $table->foreign('id_hocky')->references('id')->on('hoc_kies');

            $table->integer('diem_mieng')->unsigned();
            $table->integer('diem_15p1')->unsigned();
            $table->integer('diem_15p2')->unsigned();
            $table->integer('diem_15p3')->unsigned();
            $table->integer('diem_1tiet')->unsigned();
            $table->integer('diem_cuoiky')->unsigned();
            $table->integer('diem_tbmon')->unsigned();
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
        Schema::dropIfExists('diems');
    }
}
