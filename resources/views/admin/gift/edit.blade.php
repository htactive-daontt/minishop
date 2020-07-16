@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Sửa Mã @endsection
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
                            Sửa mã
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('admin.giftcode.postUpdate',$object->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Mã quà tặng</label>
                                            <input class="form-control" name="code" value="{{$object->code}}" />
                                            <span class="alert-danger">{{$errors->first('code')}}</span>
                                        </div><br/>
                                        <div class="form-group">
                                            <label>Giá trị (% khuyến mãi)</label>
                                            <input class="form-control" type="number" name="value" value="{{$object->value}}">
                                            <span class="alert-danger">{{$errors->first('value')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input class="form-control" type="number" name="qty" value="{{$object->qty}}">
                                            <span class="alert-danger">{{$errors->first('qty')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày bắt đầu</label>
                                            @php $created = date('Y-m-d',strtotime($object->create_day)) @endphp
                                            <input class="form-control" type="date" name="create_day" value="{{$created}}">
                                            <span class="alert-danger">{{$errors->first('create_day')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày hết hạn</label>
                                            @php $end_day = date('Y-m-d',strtotime($object->end_day)) @endphp
                                            <input class="form-control" type="date" name="end_day" value="{{$end_day}}">
                                            <span class="alert-danger">{{$errors->first('end_day')}}</span>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Cập nhập">
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
@section('src-footer-admin')
    <script src="{{$urlAdmin}}/js/validate/gift.code.js"></script>
@endsection

