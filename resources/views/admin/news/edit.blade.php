@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Sửa Tin @endsection
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
                    <h1 class="page-header">Tin Tức</h1>
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
                                    <form role="form" action="{{route('admin.news.postUpdate',$object->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tiêu đề tin</label>
                                            <input class="form-control" name="title" value="{{$object->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control" name="thumbnail" >
                                            <img src="/storage/app/news/{{$object->thumbnail}}" style="width: 100px" alt="">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="preview" id="" cols="5" rows="5" class="form-control">{!! $object->preview !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea name="detail" id="" cols="5" rows="10" class="ckeditor form-control">{!! $object->detail !!}</textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Sửa">
                                        <a href="{{route('admin.news.get')}}" class="btn btn-success">Quay lại</a>
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

