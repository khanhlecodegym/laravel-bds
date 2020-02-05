<?php

use App\Tinh;
use Illuminate\Database\Seeder;

class TinhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tinh = new Tinh();

        $tinh->ten_tinh = 'Hồ Chí Minh';
        $tinh->ma_tinh = 'SG';
        $tinh->save();

        $tinh = new Tinh();
        $tinh->ten_tinh = 'Hà Nội';
        $tinh->ma_tinh = 'HN';
        $tinh->save();

        $tinh = new Tinh();
        $tinh->ten_tinh = 'Đà Nẵng';
        $tinh->ma_tinh = 'DDN';
        $tinh->save();

        $tinh = new Tinh();
        $tinh->ten_tinh = 'Thừa Thiên Huế';
        $tinh->ma_tinh = 'TTH';
        $tinh->save();
    }
}
