<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;

class SanPhamController extends Controller
{
    public function getDanhsach()
    {
        $sanphams = SanPham::all();
        return view("canteen-ms.sanpham.danhsach", compact("sanphams"));
    }

    public function getThem()
    {
        return view('canteen-ms.sanpham.them');

    }

    public function postThem(Request $request)
    {
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string" => "Phải nhập vào 1 chuỗi",
            "numeric" => "Phải nhập vào 1 số",
            "min" => "Giá trị tối thiểu 0 hoặc 6 ký tự",
            "max" => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "TenSp" => "required|string|max:255|unique:sanpham",
            "DonVi" => "required",
            "DonGia" => "required",
        ];
        $this->validate($request, $rules, $messages);
        try {
            SanPham::create([
                "TenSp" => $request->get("TenSp"),
                "DonVi" => $request->get("DonVi"),
                "DonGia" => $request->get("DonGia"),
            ])->save();
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("canteen-ms/sanpham/them")->with('success', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $sanpham = SanPham::find($id);
        return view("canteen-ms.sanpham.sua", compact('sanpham'));

    }

    public function postSua(Request $request, $id)
    {
        $sanpham = SanPham::find($id);
        $messages = [
            "required" => "Bắt buộc phải nhập thông tin",
            "string" => "Phải nhập vào 1 chuỗi",
            "numeric" => "Phải nhập vào 1 số",
            "min" => "Giá trị tối thiểu 0 hoặc 6 ký tự",
            "max" => "Tối đa 255 ký tự",
            "unique" => "Đã tồn tại giá trị này"
        ];
        $rules = [
            "TenSp" => "required|string|max:255|unique:sanpham,TenSp," . $sanpham->id . ",id",
            "DonVi" => "required",
            "DonGia" => "required",
        ];
        $this->validate($request, $rules, $messages);
        try {
            $sanpham->update([
                "TenSp" => $request->get("TenSp"),
                "DonVi" => $request->get("DonVi"),
                "DonGia" => $request->get("DonGia"),
            ]);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
        return redirect("canteen-ms/sanpham/sua/" . $id)->with('success', 'Cập nhật thành công');
    }

    public function getXoa($id)
    {
        $sanpham = SanPham::find($id);
        try {
            $sanpham->delete();

        } catch (\Exception $e) {
            return redirect("canteen-ms/sanpham/danhsach")->withErrors(["fail" => $e->getMessage()]);
        }
        return redirect("canteen-ms/sanpham/danhsach")->with("success", "Xóa thành công");

    }
}
