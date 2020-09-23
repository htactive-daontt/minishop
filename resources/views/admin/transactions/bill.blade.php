<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn hàng - {{$object->user->name}}</title>
</head>
<style>
    body {
        background: #eee;
        font-family: DejaVu Sans;
    }
    #bill {
        width: 500px;
        margin: 0 auto;
        text-align: center;
        background: #ffffff;
        box-shadow: 0px 0px 20px 0px #000000;
        margin-top: 20px;
    }
    .bill-title {
        padding: 10px;
        border-bottom: 2px dotted black;
    }
    .bill-title h3 {
        margin: 8px !important;
    }
    .bill-title h5 {
        margin: 10px !important;
    }
    .bill-product {
        margin: 10px;
        border-bottom: 2px dotted black;
    }
    .bill-product table {
        width: 100%;
    }
    .bill-footer {
        text-align: left;
        padding: 10px;
    }
    .bill-footer table td {
        text-align: right;
        padding: 5px;
    }
</style>
<body>
    <div id="bill">
        <div class="bill-title">
            <h3>MINIShop</h3>
            <h5>Đc: Hải Châu - Đà Nẳng</h5>
        </div>
        <div class="bill-footer" >
            <table class="table" style="width: 100%">
                <thead>
                <tr>
                    <th>Khách hàng</th>
                    <td>{{$object->user->name}}</td>
                </tr>
                <tr>
                    <th>Số điện thoại</th>
                    <td>{{ $object->user->phone }}</td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td>{{ $object->user->address }}</td>
                </tr>
                </thead>
            </table>
        </div>
        <div class="bill-product">
            <table class="table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                @php $stt=0; @endphp
                @foreach( $object->bills_detail as $value )
                    @php
                        $stt++;
                        $price = $value->product->price;
                    @endphp
                    @if($value->product->sale > 0)
                        @php
                            $price = $value->product->price - ($value->product->price/100*$value->product->sale)
                        @endphp
                    @endif
                    <tr>
                        <td>{{$stt}}</td>
                        <td>{{$value->product->name}}</td>
                        <td>{{number_format($price)}} đ</td>
                        <td>{{$value->qty}}</td>
                        <td>{{number_format($value->total)}} đ</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="bill-footer" >
            <table class="table" style="width: 100%">
                <thead>
                    <tr>
                        <th>Tổng tiền</th>
                        <td>{{number_format($object->total)}} đ</td>
                    </tr>
                    <tr>
                        <th>VAT (2%)</th>
                        <td>{{number_format($object->tax)}} đ</td>
                    </tr>
                    <tr>
                        <th>Giảm giá</th>
                        <td>{{ number_format($object->discount) }} đ</td>
                    </tr>
                    <tr>
                        <th>Tổng tiền</th>
                        <td>{{ number_format($object->total_pay) }} đ</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>
</html>
