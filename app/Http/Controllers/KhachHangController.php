<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
class KhachHangController extends Controller
{
    public function getDanhsach()
    {
        $khachhangs = KhachHang::all();
        return view("canteen-ms.khachhang.danhsach",compact("khachhangs"));
    }

    public function getThem()
    {
        return view('canteen-ms.khachhang.them');

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
            "SDT"=> "required",
        ];
        $this->validate($request,$rules,$messages);
        try{
            KhachHang::create([
                "HoTen"=> $request->get("HoTen"),
                "Diachi"=> $request->get("Diachi"),
                "SDT"=> $request->get("SDT"),
            ])->save();
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("canteen-ms/khachhang/them")->with('success','Thêm thành công');
    }

    public function getSua($id)
    {
        $khachhang = KhachHang::find($id);
        return view("canteen-ms.khachhang.sua",compact('khachhang'));

    }

    public function postSua(Request $request,$id){
        $khachhang = KhachHang::find($id);
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string"    => "Phải nhập vào 1 chuỗi",
            "numeric"   => "Phải nhập vào 1 số",
            "min"   => "Giá trị tối thiểu 0 hoặc 6 ký tự",
            "max"   => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "HoTen" => "required|string|max:255|unique:khachhang,HoTen,".$khachhang->id.",id",
            "Diachi"   => "required",
            "SDT"=> "required",
        ];
        $this->validate($request,$rules,$messages);
        try{
            $khachhang->update([
                "HoTen"=> $request->get("HoTen"),
                "Diachi"=> $request->get("Diachi"),
                "SDT"=> $request->get("SDT"),
            ]);
        }catch (\Exception $e){
            die($e->getMessage());
        }
        return redirect("canteen-ms/khachhang/sua/".$id)->with('success','Cập nhật thành công');
    }

    public function getXoa($id)
    {
        $khachhang = KhachHang::find($id);
        try {
            $khachhang->delete();

        }catch (\Exception $e){
            return redirect("canteen-ms/khachhang/danhsach")->withErrors(["fail"=>$e->getMessage()]);
        }
        return redirect("canteen-ms/khachhang/danhsach")->with("success","Xóa thành công");

    }
}
