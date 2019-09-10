<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class NhanVien extends Model
{
    protected $table = 'NhanVien';
    protected $primaryKey = 'id';
    protected $fillable = [
        "HoTen",
        "Diachi",
        "GioiTinh",
        "NgaySinh",
        "SDT",
        "created_at",
        "updated_at"
    ];
}