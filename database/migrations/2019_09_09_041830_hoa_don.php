<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoaDon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idNhanVien')->unsigned();
            $table->foreign('idNhanVien')->references('id')->on('NhanVien');
            $table->integer('idKhachHang')->unsigned();
            $table->foreign('idKhachHang')->references('id')->on('KhachHang');
            $table->date('NgayTao');
            $table->double('TongTien');
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
        Schema::dropIfExists('HoaDon');
    }
}
