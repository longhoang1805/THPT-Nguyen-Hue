<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocSinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoc_sinhs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ho_ten');
            $table->unsignedBigInteger('id_lop');
            $table->foreign('id_lop')->references('id')->on('lops');
            $table->integer('id_hocky')->unsigned();
            $table->foreign('id_hocky')->references('id')->on('hoc_kies');
            $table->string('ngay_sinh');
            $table->string('dia_chi');
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
        Schema::dropIfExists('hoc_sinhs');
    }
}
