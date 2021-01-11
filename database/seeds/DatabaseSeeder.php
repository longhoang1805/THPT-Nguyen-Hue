<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diems')->update([
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8'],
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8'],
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8'],
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8'],
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8'],
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8'],
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8'],
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8'],
            ['diem_mieng'=>'8','diem_15p1'=>'7.5','diem_15p2'=>'6.5','diem_15p3'=>'9','diem_1tiet'=>'7','diem_cuoiky'=>'8']


        ]);
    }
}
