<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocBongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_bongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hocsinh')->unsigned();
            $table->foreign('id_hocsinh')->references('id')->on('hoc_sinhs');

            $table->integer('id_diem')->unsigned();
            $table->foreign('id_diem')->references('id')->on('diems');

            $table->integer('id_hocky')->unsigned();
            $table->foreign('id_hocky')->references('id')->on('hoc_kies');

            $table->string('tien_thuong');
            $table->string('ghi_chu');
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
        Schema::dropIfExists('hoc_bongs');
    }
}
