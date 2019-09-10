<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class KhachHang extends Model
{
    protected $table = 'KhachHang';
    protected $primaryKey = 'id';
    protected $fillable = [
        "HoTen",
        "Diachi",
        "SDT",
        "created_at",
        "updated_at"
    ];
}