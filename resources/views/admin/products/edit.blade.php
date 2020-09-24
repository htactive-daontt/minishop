@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Sửa Sản Phẩm @endsection
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
                            Sửa Sản Phẩm
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('admin.products.postUpdate',$data['product']->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input class="form-control" name="nameproduct" value="{{$data['product']->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input class="form-control" type="number" name="qty" value="{{$data['product']->qty}}">
                                        </div>
                                        @if(isset($data['categories']))
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select class="form-control" name="idcat">
                                                    <option value="0">--Không--</option>
                                                    @foreach($data['categories'] as $value)
                                                        @php $active = ''; @endphp
                                                        @if( $value->id == $data['product']->category_id )
                                                            @php
                                                                $active ='selected=""';
                                                            @endphp
                                                        @endif
                                                        <option {{$active}} value="{!! $value->id !!}">{!! $value->name !!}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control" name="thumbnail" >
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh chi tieest</label>
                                            <input type="file" class="form-control" name="images[]" multiple>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá</label>
                                            <input type="number" class="form-control" name="price" step="0.01" value="{{$data['product']->price}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Sale</label>
                                            <input type="number" class="form-control" name="sale" value="{{$data['product']->sale}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="preview" id="" cols="5" rows="3" class="form-control">{!! $data['product']->preview !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea id="editor2"  name="detail" class="ckeditor form-control">{!! $data['product']->detail !!}</textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Cập nhập">
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

