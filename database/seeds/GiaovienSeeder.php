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
        DB::table('giao_viens')->insert([
            // ['ho_ten'=>'Nguyễn Văn Anh','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Hóa học'],
            ['ho_ten'=>'Nguyễn Văn B','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Toán học'],
            ['ho_ten'=>'Nguyễn Văn Long','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Hóa học'],
            ['ho_ten'=>'Nguyễn Văn D','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Vật lý'],
            ['ho_ten'=>'Nguyễn Văn E','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Ngữ văn'],
            ['ho_ten'=>'Nguyễn Văn F','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Ngữ văn'],
            ['ho_ten'=>'Nguyễn Văn G','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Ngữ văn'],
            ['ho_ten'=>'Nguyễn Văn H','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Ngữ văn'],
            ['ho_ten'=>'Nguyễn Văn H','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Ngữ văn'],
            ['ho_ten'=>'Nguyễn Văn K','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Anh văn'],
            ['ho_ten'=>'Nguyễn Văn L','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Anh văn'],
            ['ho_ten'=>'Nguyễn Văn M','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Anh văn'],
            ['ho_ten'=>'Nguyễn Văn N','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Anh văn'],
            ['ho_ten'=>'Nguyễn Văn O','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Sử'],
            ['ho_ten'=>'Nguyễn Văn P','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Sử'],
            ['ho_ten'=>'Nguyễn Văn V','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nữ','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Công dân'],
            ['ho_ten'=>'Nguyễn Văn Z','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Công dân'],
            ['ho_ten'=>'Nguyễn Văn X','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Công dân'],
            ['ho_ten'=>'Nguyễn Văn W','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Địa lý'],
            ['ho_ten'=>'Nguyễn Văn Q','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Địa lý'],
            ['ho_ten'=>'Nguyễn Văn TT','ngay_sinh'=>'18/04/1989','gioi_tinh'=>'nam','dien_thoai'=>'0328561952','email'=>'hlong@gmail.com','bo_mon'=>'Địa lý'],


        ]);
    }
}
