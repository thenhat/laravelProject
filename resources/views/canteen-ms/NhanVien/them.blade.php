@extends('canteen-ms.layout.index')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small>Thêm</small> Nhân Viên

                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url("canteen-ms/nhanvien/them")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên Nhân Viên</label>
                            <input class="form-control" type="text" name="HoTen" value="{{old("HoTen")}}" placeholder="Tên Nhân Viên" required>
                            @if($errors->has("HoTen"))
                                <p class="error" style="color:red">{{$errors->first("HoTen")}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" type="text" name="Diachi" value="{{old("Diachi")}}" placeholder="Địa chỉ" required>
                            @if($errors->has("Diachi"))
                                <p class="error" style="color:red">{{$errors->first("Diachi")}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Giới Tính</label>
                            <select name="GioiTinh" class="form-control">
                                <option value="male">Male
                                </option>
                                <option value="female">Female
                                </option>
                            </select>
                            @if($errors->has("GioiTinh"))
                                <p class="error" style="color:red">{{$errors->first("GioiTinh")}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Ngày Sinh</label>
                            <input class="form-control" type="date" name="NgaySinh" value="{{old("NgaySinh")}}" placeholder="Ngày Sinh" required>
                            @if($errors->has("NgaySinh"))
                                <p class="error" style="color:red">{{$errors->first("NgaySinh")}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" type="text" name="SDT" value="{{old("SDT")}}" placeholder="Số Điện Thoại" required>
                            @if($errors->has("SDT"))
                                <p class="error" style="color:red">{{$errors->first("SDT")}}</p>
                            @endif
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-danger">Thêm Nhân Viên</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection;