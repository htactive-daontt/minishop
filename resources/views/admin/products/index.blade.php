@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Quản Lý Sản Phẩm @endsection
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
                    <h1 class="page-header">Sản phẩm </h1>
                    <a href="{{route('admin.products.add')}}" class="btn btn-primary" style="margin-bottom: 15px">Thêm sản phẩm</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if(Session::has('msg'))
                                <span class="alert-success">{{Session::get('msg')}}</span>
                            @elseif(Session::has('error'))
                                <span class="alert-danger">{{Session::get('error')}}</span>
                            @endif
                        </div>
                        <!-- /.panel-heading -->
                        @if(isset($dataOfProducts))
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Danh mục</th>
                                            <th>Hình ảnh</th>
                                            <th>Thông tin</th>
                                            <th>Chức Năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $stt=0 @endphp
                                        @foreach($dataOfProducts as $value)
                                            @php $stt++; @endphp
                                            <tr class="gradeU">
                                                <td>{!! $stt !!}</td>
                                                <td>
                                                    {!! $value->name !!}
                                                </td>
                                                <td>{{ $value->category->name }}</td>
                                                <td>
                                                    <div>
                                                    <img src="{{ $value->getImg() }}" style="width: 100px" alt="">
                                                    </div>
                                                </td>
                                                <td align="center">
                                                    @if($value->qty>0)
                                                        <p>Số lượng: {{$value->qty}}</p>
                                                        <p>Giá: {{number_format($value->price)}}</p>
                                                    @else
                                                        <button id="qty_danger" class="btn btn-danger" data-id="{{$value->id}}" data-toggle="modal" data-target="#out_qty">Hết hàng</button>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-id="{{ $value->id }}" data-target="#info-product{{$stt}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    @if( $value->comment_count >0 )
                                                        <a href="{{ route('admin.products.comment', [$value->slug, $value->id]) }}" class="btn btn-success">Xem bình luận</a>
                                                    @endif
                                                    <a href="{{route('admin.products.update',$value->id)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a href="{{route('admin.products.destroy',$value->id)}}" onclick="return xacnhaxoa('Bạn có chắc muốn xóa !')" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            {{--form modal--}}
                                            <div class="modal fade" id="info-product{{$stt}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Thông tin sản phẩm</h4>
                                                        </div>
                                                        <div class="modal-body info-product">
                                                            <p><strong>Tên sản phẩm</strong>: {!! $value->name !!}</p>
                                                            <p><strong>Danh mục</strong>: {!! $value->category->name !!}</p>
                                                            <p><strong>Số lượng</strong>: {!! $value->qty !!}</p>
                                                            <p><strong>Giá</strong>: {!! number_format($value->price) !!}</p>
                                                            <p><strong>Sale</strong>: {!! number_format($value->sale) !!}%</p>
                                                            <p><strong>Hình ảnh</strong>:</p>
                                                            <div class="info-img">
                                                                <img src="{{ $value->getImg() }}" style="width: 100px" alt="">
                                                            </div>
                                                            @if(!empty($value->images))
                                                                <p><strong>Hình ảnh mô tả</strong>:</p>
                                                                @foreach($value->images as $keyOfImg => $valueOfImg)
                                                                    <div class="info-img" style="display: inline-block">
                                                                        <img src="{{ \App\Ultis\File::getFile($valueOfImg) }}" style="width: 100px" alt="">
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            <p><strong>Mô tả:</strong></p>
                                                            <p>{!! $value->preview !!}</p>
                                                            <p><strong>Chi tiết:</strong></p>
                                                            <p>{!! $value->detail !!}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                    @endif
                    <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <div class="modal fade" id="out_qty" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="form_add_qty" action="#" class="form-group">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm sản phẩm</h4>
                </div>
                <div class="modal-body info-product">
                    <div>
                        <label for="">Nhập số lượng</label>
                        <input type="number" class="qty-new form-control" placeholder="0" required min="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="submit-form-qty btn btn-primary" value="Thêm">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
                </form>
            </div>

        </div>
    </div>
@endsection
{{--src-footer--}}
@section('src-footer-admin')
    <!-- DataTables JavaScript -->
    <script src="{{$urlAdmin}}/js/dataTables/jquery.dataTables.min.js"></script>
    <script src="{{$urlAdmin}}/js/dataTables/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $('#form_add_qty').submit(function (event) {
                event.preventDefault();
                let id = $('#qty_danger').data('id');
                let qty = $('.qty-new').val();
                $('#out_qty').modal('hide');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'POST',
                    url:'{{route('admin.products.addQty')}}',
                    data:{ id:id, qty:qty },
                    success:function(data){
                        if(data) {
                            alert('Cập nhập thành công')
                            window.location.href = '{{route('admin.products.get')}}';
                        }
                    }
                });
            });
            $('#dataTables-example').DataTable({
                responsive: true,
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
            });
        });
    </script>
@endsection

