@if(count($data) == 0)
    <p>Không có đơn hàng nào !!!</p>
@else
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Chi tiết</th>
        <th>Tổng bill</th>
        <th>Thời gian</th>
    </tr>
    </thead>
    <tbody>
    @php $stt=0 @endphp
    @foreach($data as $value)
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
            <td>{{ date( "d/m/Y", strtotime($value->created_at)) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif
