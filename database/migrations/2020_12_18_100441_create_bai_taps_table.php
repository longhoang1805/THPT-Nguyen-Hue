<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiTapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_taps', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_monhoc')->unsigned();
            $table->foreign('id_monhoc')->references('id')->on('mon_hocs');

            $table->string('noi_dung');
            $table->string('han_cuoi');
            $table->string('anh');
            $table->string('file');
            $table->string('thoi_gian_dang');
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
        Schema::dropIfExists('bai_taps');
    }
}
