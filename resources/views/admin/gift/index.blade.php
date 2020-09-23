@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Quản Lý Mã Giảm Giá @endsection
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
                    <h1 class="page-header">Mã giảm giá </h1>
                    <a href="{{route('admin.giftcode.add')}}" class="btn btn-primary" style="margin-bottom: 15px">Thêm mã</a>
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
                        @if(isset($gift_codes))
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã giảm giá</th>
                                            <th>Giá trị (%)</th>
                                            <th>Số lượng</th>
                                            <th>Ngày áp dụng</th>
                                            <th>Ngày kết thúc</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $stt=0 @endphp
                                        @foreach($gift_codes as $value)
                                            @php $stt++; @endphp
                                            <tr class="gradeU">
                                                <td>{!! $stt !!}</td>
                                                <td style="text-transform: uppercase">{!! $value->code !!}</td>
                                                <td>{!! $value->value !!} %</td>
                                                <td>{{$value->qty}}</td>
                                                <td>{{{date('d/m/Y',strtotime($value->create_day))}}}</td>
                                                <td>{{date('d/m/Y',strtotime($value->end_day))}}</td>
                                                <td style="text-align: center;">
                                                    <a href="{{route('admin.giftcode.update',$value->id)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a href="{{route('admin.giftcode.destroy',$value->id)}}" onclick="return xacnhaxoa('Bạn có chắc muốn xóa !')" class="btn btn-danger"><i class="fa fa-window-close" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
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
@endsection
{{--src-footer--}}
@section('src-footer-admin')
    <!-- DataTables JavaScript -->
    <script src="{{$urlAdmin}}/js/dataTables/jquery.dataTables.min.js"></script>
    <script src="{{$urlAdmin}}/js/dataTables/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
            });
        });
    </script>
@endsection

