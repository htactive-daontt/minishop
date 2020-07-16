@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Quản Lý Đơn Hàng @endsection
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
                    <h1 class="page-header">Đơn hàng </h1>
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
                        @if(isset($transactions))
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Chi tiết</th>
                                            <th>Tổng bill</th>
                                            <th>Thời gian</th>
                                            <th>Trạng thái</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $stt=0 @endphp
                                        @foreach($transactions as $value)
                                            @php $stt++; @endphp
                                            <tr class="gradeU">
                                                <td>{!! $stt !!}</td>
                                                <td>{!! $value->user->name !!}</td>
                                                <td>
                                                    <p>Tổng tiền sản phẩm: <br/><span style="padding-left:10px">{{number_format($value->total)}}</span> đ</p>
                                                    <p>Thuế VAT: {{$value->tax}} %</p>
                                                    <p>Giảm giá: {{$value->discount}} %</p>
                                                </td>
                                                <td>{{number_format($value->total_pay)}} đ</td>
                                                <td>{{ date( "m/d/Y", strtotime($value->created_at)) }}</td>
                                                <td style="text-align: center">
                                                    @if($value->status)
                                                        <button disabled class="btn btn-primary">Đã xử lý</button>
                                                    @else
                                                        <a href="{{route('admin.transactions.approved',$value->id)}}" class="btn btn-default">Chờ xử lý</a>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    <a  data-id="{{$value->id}}" class="view_transaction btn btn-info">Xem</a>
                                                    <a href="{{route('admin.transactions.export',$value->id)}}" class="btn btn-success">In hóa đơn</a>
                                                    <a href="{{route('admin.transactions.destroy',$value->id)}}" class="btn btn-danger">Xóa</a>
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
    {{--modal--}}
    <div class="modal fade" id="modalDetail" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông tin đơn hàng</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
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
        $(document).ready(function() {
            $('.view_transaction').click(function () {
                const id = $(this).data('id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'POST',
                    url:'{{route('admin.transactions.show')}}',
                    data:{ id:id },
                    success:function(data){
                        $('#modalDetail').modal('show');
                        $('.modal-body').html('').append(data);
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

