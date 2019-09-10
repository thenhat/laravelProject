@extends('canteen-ms.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><small>Danh Sách</small> Khách Hàng

                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Địa Chỉ</th>
                    <th>SDT</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($khachhangs as $khachhang)
                    <tr>
                        <td>{{$khachhang->id}}</td>
                        <td>{{$khachhang->HoTen}}</td>
                        <td>{{$khachhang->Diachi}}</td>
                        <td>{{$khachhang->SDT}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="canteen-ms/khachhang/xoa/{{$khachhang->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="canteen-ms/khachhang/sua/{{$khachhang->id}}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection;