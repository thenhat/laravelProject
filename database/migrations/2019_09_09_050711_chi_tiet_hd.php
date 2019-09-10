<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChiTietHd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietHD', function (Blueprint $table) {
            $table->integer('idHoaDon')->unsigned();
            $table->foreign('idHoaDon')->references('id')->on('HoaDon');
            $table->integer('idSanPham')->unsigned();
            $table->foreign('idSanPham')->references('id')->on('SanPham');
            $table->integer('SoLuong');
            $table->integer('DonGia');
            $table->double('ThanhTien');
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
        Schema::dropIfExists('ChiTietHD');
    }
}
