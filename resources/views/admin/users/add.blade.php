@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Người Dùng @endsection
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
                    <h1 class="page-header">Người dùng</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Người Dùng
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="product" action="{{route('admin.users.postAdd')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label>Họ tên</label>
                                                <input class="form-control" name="name" placeholder="Nhập họ tên">
                                                <span class="alert-danger">{{$errors->first('name')}}</span>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Nhập Email">
                                                <span class="alert-danger">{{$errors->first('email')}}</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" name="phone" placeholder="Nhập số điện thoại">
                                                <span class="alert-danger">{{$errors->first('phone')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input class="form-control" name="password" placeholder="Nhập mật khẩu">
                                            <span class="alert-danger">{{$errors->first('password')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" name="address" placeholder="Nhập địa chỉ">
                                            <span class="alert-danger">{{$errors->first('address')}}</span>
                                        </div>
                                        @if(isset($roles))
                                            <div class="form-group">
                                                <label>Chọn cấp độ</label>
                                                <select name="role_id" id="" class="form-control">
                                                    <option value="">--Chọn--</option>
                                                    @foreach($roles as $value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="alert-danger">{{$errors->first('role_id')}}</span>
                                            </div>
                                        @endif
                                        <input type="submit" class="btn btn-primary" value="Thêm">
                                        <a href="{{route('admin.users.get')}}" class="btn btn-success">Quay lại</a>
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

