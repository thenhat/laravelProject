@extends('canteen-ms.layout.index')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small>Cập Nhật</small> Khách Hàng

                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url("canteen-ms/khachhang/sua/{$khachhang->id}")}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$khachhang->id}}">
                        <div class="form-group">
                            <label>Tên Khách Hàng</label>
                            <input class="form-control" type="text" name="HoTen" value="{{$khachhang->HoTen}}" placeholder="Tên Khách Hàng" required>
                            @if($errors->has("HoTen"))
                                <p class="error" style="color:red">{{$errors->first("HoTen")}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" type="text" name="Diachi" value="{{$khachhang->Diachi}}" placeholder="Địa Chỉ" required>
                            @if($errors->has("Diachi"))
                                <p class="error" style="color:red">{{$errors->first("Diachi")}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại</label>
                            <input class="form-control" type="text" name="SDT" value="{{$khachhang->SDT}}" placeholder="Số Điện Thoại" required>
                            @if($errors->has("SDT"))
                                <p class="error" style="color:red">{{$errors->first("SDT")}}</p>
                            @endif
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-danger">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection;