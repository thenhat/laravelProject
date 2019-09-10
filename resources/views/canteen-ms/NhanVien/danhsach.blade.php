@extends('canteen-ms.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><small>Danh Sách</small> Nhân Viên

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
                        <th>Giới Tính</th>
                        <th>Ngày Sinh</th>
                        <th>SDT</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nhanviens as $nhanvien)
                        <tr>
                            <td>{{$nhanvien->id}}</td>
                            <td>{{$nhanvien->HoTen}}</td>
                            <td>{{$nhanvien->Diachi}}</td>
                            <td>{{$nhanvien->GioiTinh}}</td>
                            <td>{{$nhanvien->NgaySinh}}</td>
                            <td>{{$nhanvien->SDT}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="canteen-ms/nhanvien/xoa/{{$nhanvien->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="canteen-ms/nhanvien/sua/{{$nhanvien->id}}">Edit</a></td>
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