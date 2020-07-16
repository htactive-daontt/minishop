@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Slide @endsection
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
                    <h1 class="page-header">Slide</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Slide
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="product" action="{{route('admin.slides.postUpdate',$object->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input class="form-control" name="title" value="{{$object->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea class="form-control" name="preview" id="" cols="5" rows="5" >{!! $object->preview !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input class="form-control" name="thumbnail" type="file">
                                            <img src="/storage/app/slides_thumbnail/{{$object->thumbnail}}" alt="" style="max-width: 150px;margin-top: 5px">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Cập nhập">
                                        <a href="{{route('admin.slides.get')}}" class="btn btn-success">Quay lại</a>
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

