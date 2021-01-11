<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lich_days', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_tkb')->unsigned();
            $table->foreign('id_tkb')->references('id')->on('tkbs');

            $table->string('ngay_bd');
            $table->string('ngay_kt');

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
        Schema::dropIfExists('lich_days');
    }
}
