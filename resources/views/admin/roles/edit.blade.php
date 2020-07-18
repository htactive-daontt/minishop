@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Phân Quyền @endsection
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
                    <h1 class="page-header">{{ $role->name }}</h1>
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
                        @if(isset($permissions))
                        <div style="padding: 10px">
                            <form action="{{route('admin.rolep.postEdit', $role->id)}}" method="post">
                                @csrf
                                @foreach($permissions as $key => $value)
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="role[]" {{ in_array($value->id, $checked) ? 'checked' : '' }} value="{{$value->id}}">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                                <div>
                                    <input type="submit" class="btn btn-primary" value="Cập nhập">
                                </div>
                            </form>
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

        });
    </script>
@endsection

