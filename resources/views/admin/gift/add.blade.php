@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Mã @endsection
{{--src--}}
@section('src-header-admin')
    <!-- DataTables CSS -->
    <link href="{{$urlAdmin}}/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{$urlAdmin}}/css/dataTables/dataTables.responsive.css" rel="stylesheet">
@endsection
{{--content--}}
@section('content-admin')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mã giảm giá</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Tin
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="gift-code" action="{{route('admin.giftcode.postAdd')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Mã quà tặng</label>
                                            <input class="form-control" name="code" placeholder="Nhập tiêu đề danh mục">
                                            <span class="alert-danger">{{$errors->first('code')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá trị (% khuyến mãi)</label>
                                            <input class="form-control" type="number" name="value" placeholder="Nhập tiêu đề danh mục">
                                            <span class="alert-danger">{{$errors->first('value')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input class="form-control" min="1" type="number" name="qty" placeholder="Nhập tiêu đề danh mục">
                                            <span class="alert-danger">{{$errors->first('qty')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày bắt đầu</label>
                                            <input class="form-control" type="date" name="create_day">
                                            <span class="alert-danger">{{$errors->first('create_day')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày hết hạn</label>
                                            <input class="form-control" type="date" name="end_day">
                                            <span class="alert-danger">{{$errors->first('end_day')}}</span>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Thêm">
                                        <a href="{{route('admin.giftcode.get')}}" class="btn btn-success">Quay lại</a>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection


