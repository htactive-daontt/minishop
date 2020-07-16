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
                                    <form role="form" id="product" action="{{route('admin.users.postUpdate',$data['user']->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                <label>Họ tên</label>
                                                <input class="form-control" name="name" value="{{$data['user']->name}}">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{$data['user']->email}}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" name="phone" value="{{$data['user']->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input class="form-control" name="password" type="password" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" name="address" value="{{$data['user']->address}}">
                                        </div>
                                        @if(isset($data['roles']))
                                            <div class="form-group">
                                                <label>Chọn cấp độ</label>
                                                <select name="role_id" id="" class="form-control">
                                                    <option value="">--Chọn--</option>
                                                    @foreach($data['roles'] as $value)
                                                        @php $active = ''; @endphp
                                                        @if( $value->id == $data['user']->role_id )
                                                            @php $active = 'selected=""'; @endphp
                                                        @endif
                                                        <option {{$active}} value="{{$value->id}}">{{$value->role}}</option>
                                                    @endforeach
                                                </select>
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

