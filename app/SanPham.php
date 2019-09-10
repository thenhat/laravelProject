<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class SanPham extends Model
{
    protected $table = 'SanPham';
    protected $primaryKey = 'id';
    protected $fillable = [
        "TenSp",
        "DonVi",
        "DonGia",
        "created_at",
        "updated_at"
    ];
}