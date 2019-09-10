@extends('canteen-ms.layout.index')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><small>Danh Sách</small> Sản Phẩm

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
                        <th>Tên Sản Phẩm</th>
                        <th>Đơn Vị</th>
                        <th>Đơn Giá</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sanphams as $sanpham)
                        <tr>
                            <td>{{$sanpham->id}}</td>
                            <td>{{$sanpham->TenSp}}</td>
                            <td>{{$sanpham->DonVi}}</td>
                            <td>{{$sanpham->DonGia}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="canteen-ms/sanpham/xoa/{{$sanpham->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="canteen-ms/sanpham/sua/{{$sanpham->id}}">Edit</a></td>
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