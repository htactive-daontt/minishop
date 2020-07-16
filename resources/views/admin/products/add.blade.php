@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Sản Phẩm @endsection
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
                    <h1 class="page-header">Sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Sản Phẩm
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="product" action="{{route('admin.products.add')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input class="form-control" name="nameproduct" placeholder="Nhập tên sản phẩm">
                                            <span class="alert-danger">{{$errors->first('nameproduct')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input class="form-control" type="number" name="qty" placeholder="Nhập số lượng">
                                            <span class="alert-danger">{{$errors->first('qty')}}</span>
                                        </div>
                                        @if(isset($categories))
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select class="form-control" name="idcat">
                                                    <option value="">--Không--</option>
                                                    @foreach($categories as $value)
                                                        <option value="{!! $value->id !!}">{!! $value->name !!}</option>
                                                    @endforeach
                                                </select>
                                                <span class="alert-danger">{{$errors->first('idcat')}}</span>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control" name="thumbnail">
                                            <span class="alert-danger">{{$errors->first('thumbnail')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh chi tiết</label>
                                            <input type="file" class="form-control" name="images[]" multiple>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá</label>
                                            <input type="number" class="form-control" name="price" placeholder="Nhập giá">
                                            <span class="alert-danger">{{$errors->first('price')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Sale</label>
                                            <input type="number" class="form-control" name="sale" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="preview" id="" cols="5" rows="3" class="form-control"></textarea>
                                            <span class="alert-danger">{{$errors->first('preview')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea id="editor2"  name="detail" class="ckeditor form-control"></textarea>
                                            {{--<span class="alert-danger">{{$errors->first('detail')}}</span>--}}
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Thêm">
                                        <a href="{{route('admin.products.get')}}" class="btn btn-success">Quay lại</a>
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

