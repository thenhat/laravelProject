<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
class NhanVienController extends Controller
{
    public function getDanhsach()
    {
        $nhanviens = NhanVien::all();
        return view("canteen-ms.nhanvien.danhsach",compact("nhanviens"));
    }

    public function getThem()
    {
        return view('canteen-ms.nhanvien.them');

    }

    public function postThem(Request $request){
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối thiểu 0 hoặc 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "HoTen" => "required|string|max:255|unique:khachhang",
            "Diachi"   => "required",
            "GioiTinh",
            "NgaySinh"   => "required",
            "SDT"=> "required",
        ];
        $this->validate($request,$rules,$messages);
        try{
            NhanVien::create([
                "HoTen"=> $request->get("HoTen"),
                "Diachi"=> $request->get("Diachi"),
                "GioiTinh"=> $request->get("GioiTinh"),
                "NgaySinh"=> $request->get("NgaySinh"),
                "SDT"=> $request->get("SDT"),
            ])->save();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("canteen-ms/nhanvien/them")->with('success','Thêm thành công');
    }

    public function getSua($id)
    {
        $nhanvien = NhanVien::find($id);
        return view("canteen-ms.nhanvien.sua",compact('nhanvien'));

    }

    public function postSua(Request $request,$id){
        $nhanvien = NhanVien::find($id);
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối thiểu 0 hoặc 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "HoTen" => "required|string|max:255|unique:khachhang,HoTen,".$nhanvien->id.",id",
            "Diachi"   => "required",
            "GioiTinh"   => "required",
            "NgaySinh"   => "required",
            "SDT"=> "required",
        ];
        $this->validate($request,$rules,$messages);
        try{
            $nhanvien->update([
                "HoTen"=> $request->get("HoTen"),
                "Diachi"=> $request->get("Diachi"),
                "GioiTinh"=> $request->get("GioiTinh"),
                "NgaySinh"=> $request->get("NgaySinh"),
                "SDT"=> $request->get("SDT"),
            ]);
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("canteen-ms/nhanvien/sua/".$id)->with('success','Cập nhật thành công');
    }

    public function getXoa($id)
    {
        $nhanvien = NhanVien::find($id);
        try {
            $nhanvien->delete();

        }catch (\Exception $e){
            return redirect("canteen-ms/nhanvien/danhsach")->withErrors(["fail"=>$e->getMessage()]);
        }
        return redirect("canteen-ms/nhanvien/danhsach")->with("success","Xóa thành công");

    }
}
