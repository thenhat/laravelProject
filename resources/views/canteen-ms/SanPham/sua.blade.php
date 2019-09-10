@extends('canteen-ms.layout.index')
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small>Cập Nhật</small> Sản Phẩm

                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{url("canteen-ms/sanpham/sua/{$sanpham->id}")}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$sanpham->id}}">
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input class="form-control" type="text" name="TenSp" value="{{$sanpham->TenSp}}" placeholder="Tên Sản Phẩm" required>
                            @if($errors->has("TenSp"))
                                <p class="error" style="color:red">{{$errors->first("TenSp")}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Đơn Vị</label>
                            <input class="form-control" type="number" name="DonVi" value="{{$sanpham->DonVi}}" placeholder="Đơn Vị" required>
                            @if($errors->has("DonVi"))
                                <p class="error" style="color:red">{{$errors->first("DonVi")}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Đơn Giá</label>
                            <input class="form-control" type="number" name="DonGia" value="{{$sanpham->DonGia}}" placeholder="Đơn Giá" required>
                            @if($errors->has("DonGia"))
                                <p class="error" style="color:red">{{$errors->first("DonGia")}}</p>
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