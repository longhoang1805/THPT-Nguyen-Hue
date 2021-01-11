<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddXepLoaiToHanhKiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hanh_kiems', function (Blueprint $table) {
            //
            $table->string('xep_loai')->after('ca_nam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hanh_kiems', function (Blueprint $table) {
            //
        });
    }
}
