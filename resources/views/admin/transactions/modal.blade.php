<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Thông tin</th>
        <th>Tổng tiền</th>
        <th>Ngày đặt</th>
    </tr>
    </thead>
    <tbody>
    @php $stt=0 @endphp
    @foreach($transactionDetail as $key => $value)
        @php $stt++; @endphp
        <tr class="gradeU">
            <td>{!! $stt !!}</td>
            <td>{!! $value->product->name !!}</td>
            <td>
                <img src="{{ $value->product->getImg() }}" style="max-width: 100px">
            </td>
            <td>
                <p>SL: {{ $value->qty }}</p>
                <p>Giá: {{ $value->product->getPrice() }} đ</p>
            </td>
            <td style="text-align: center;">{{ number_format($value->total) }} đ</td>
            <td>{{ date( "m/d/Y", strtotime($value->created_at)) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
