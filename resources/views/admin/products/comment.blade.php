@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Bình luân sản phẩm @endsection
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
                    <h3 class="page-header">Bình luận</h3>
                    <div>
                        <p>Sản phẩm: <strong>{{ $product->name }}</strong></p>
                        <p>Tổng số bình luận: {{ $product->comment_count }}</p>
                    </div>
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
                        @if(isset($comments))
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Người bình luận</th>
                                            <th>Email</th>
                                            <th>Nội dung bình luận</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $stt=0 @endphp
                                        @foreach($comments as $value)
                                            @php $stt++; @endphp
                                            <tr class="gradeU">
                                                <td>{!! $stt !!}</td>
                                                <td>
                                                    {!! $value->user->name !!}
                                                </td>
                                                <td>{{ $value->user->email }}</td>
                                                <td>{!! $value->content !!}</td>
                                                <td align="center">
                                                    <a href="{{ route('admin.products.delComment', $value->id) }}" class="btn btn-danger">Xóa</a>
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

