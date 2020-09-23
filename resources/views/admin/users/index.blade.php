@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Quản Lý Người Dùng @endsection
{{--src--}}
@section('src-header-admin')
    <!-- DataTables CSS -->
    <link href="{{$urlAdmin}}/css/dataTable s/dataTables.bootstrap.css" rel="stylesheet">
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
                    <a href="{{route('admin.users.add')}}" class="btn btn-primary" style="margin-bottom: 15px">Thêm Người Dùng</a>
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
                        @if(isset($users))
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>Cấp độ</th>
                                            <th>Chức Năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $stt=0 @endphp
                                        @foreach($users as $value)
                                            @php $stt++; @endphp
                                            <tr class="gradeU delete-{{$value->id}}">
                                                <td>{!! $stt !!}</td>
                                                <td>{!! $value->name !!}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->address}}</td>
                                                <td>{{$value->phone}}</td>
                                                <td>
                                                    {{$value->roles->first()->name}}
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.users.update',$value->id)}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    <a href="{{route('admin.users.destroy',$value->id)}}" onclick="return xacnhaxoa('Bạn có chắc muốn xóa !')" class="btn btn-danger" ><i class="fa fa-window-close" aria-hidden="true"></i></a>

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
            $('.delete').click(function (e) {
                e.preventDefault();
                const id = $(this).data('id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'get',
                    url:'/admincp/nguoi-dung/xoa-nguoi-dung/',
                    data:{ id:id },
                    success:function(data){
                        if(data == 1) {
                            alert('Xóa thành công');
                            $('.delete-'+id).css('display','none');
                        }else {
                            alert('Bạn không thể xóa người dùng này, sẽ ảnh hưởng đến đơn hàng');
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

