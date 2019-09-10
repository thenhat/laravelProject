<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\KhachHang::class, function (Faker $faker) {
    return [
        "HoTen" => $faker->name,
        "Diachi" => $faker->address,
        "SDT" => $faker->phoneNumber
    ];
});

$factory->define(\App\NhanVien::class, function (Faker $faker) {
    return [
        "HoTen" => $faker->name,
        "Diachi" => $faker->address,
        "GioiTinh" => $faker->randomElement($array = array ('male', 'female')),
        "NgaySinh" => $faker->dateTime,
        "SDT" => $faker->phoneNumber
    ];
});

$factory->define(\App\SanPham::class, function (Faker $faker) {
    return [
        "TenSp" => $faker->word,
        "DonVi" => $faker->randomFloat(0,0,1000),
        "DonGia" => $faker->randomNumber(),
    ];
});