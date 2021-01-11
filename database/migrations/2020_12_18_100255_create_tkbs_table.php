<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkbs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_monhoc')->unsigned();
            $table->foreign('id_monhoc')->references('id')->on('mon_hocs');
            $table->unsignedBigInteger('id_giaovien');
            $table->foreign('id_giaovien')->references('id')->on('giao_viens');
            $table->string('tuan');
            $table->string('thu');
            $table->string('tiet');
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
        Schema::dropIfExists('tkbs');
    }
}
