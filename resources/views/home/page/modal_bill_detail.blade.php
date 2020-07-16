<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Thông tin</th>
        <th>Tổng tiền</th>
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
                @php
                    $thumbnail = $value->product->thumbnail;
                    $price = $value->product->price;
                @endphp
                <img src="{{ asset("storage/products_thumbnail/$thumbnail") }}" style="max-width: 100px">
            </td>
            <td>
                @if($value->product->sale > 0)
                    @php
                        $price = $value->product->price - ($value->product->price/100*$value->product->sale)
                    @endphp
                @endif
                <p>SL: {{ $value->qty }}</p>
                <p>Giá: {{ number_format($price) }} đ</p>
            </td>
            <td style="text-align: center;">{{ number_format($value->total) }} đ</td>
        </tr>
    @endforeach
    </tbody>
</table>
