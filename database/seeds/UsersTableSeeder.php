<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,100)->create();
        factory(App\KhachHang::class,100)->create();
        factory(App\NhanVien::class,100)->create();
        factory(App\SanPham::class,100)->create();
    }
}
