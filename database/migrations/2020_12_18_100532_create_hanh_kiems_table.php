<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHanhKiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hanh_kiems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hocsinh')->unsigned();
            $table->foreign('id_hocsinh')->references('id')->on('hoc_sinhs');

            $table->integer('id_hocky')->unsigned();
            $table->foreign('id_hocky')->references('id')->on('hoc_kies');
            $table->string('ca_nam');
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
        Schema::dropIfExists('hanh_kiems');
    }
}
