@extends('templates.home.master')
@section('title') Thanh toán @endsection
@section('src-home')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/checkout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/checkout_responsive.css') }}">
@endsection
@section('content-home')
        <div class="header_social">
            <ul>
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </header>

    <!-- Menu -->

    <div class="menu menu_mm trans_300">
        <div class="menu_container menu_mm">
            <div class="page_menu_content">

                <div class="page_menu_search menu_mm">
                    <form action="#">
                        <input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
                    </form>
                </div>
                <ul class="page_menu_nav menu_mm">
                    <li class="page_menu_item has-children menu_mm">
                        <a href="index.html">Home<i class="fa fa-angle-down"></i></a>
                        <ul class="page_menu_selection menu_mm">
                            <li class="page_menu_item menu_mm"><a href="categories.html">Categories<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="product.html">Product<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="cart.html">Cart<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="checkout.html">Checkout<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
                        </ul>
                    </li>
                    <li class="page_menu_item has-children menu_mm">
                        <a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
                        <ul class="page_menu_selection menu_mm">
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                        </ul>
                    </li>
                    <li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

        <div class="menu_social">
            <ul>
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- Home -->

    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url({{ asset('home/images/h4.jpg') }})"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="index.html">Trang chủ</a></li>
                                        <li><a href="cart.html">Giỏ hàng</a></li>
                                        <li>Thanh toán</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout -->

    <div class="checkout">
        <div class="container">
            <div class="row">

                <!-- Billing Info -->
                <div class="col-lg-6">
                    <div class="billing checkout_section">
                        <div class="section_title">Thông tin khách hàng</div>
                        @if(Session::has('msg_user'))
                            <div class="section_subtitle alert-success">{{Session::get('msg_user')}}</div>
                        @endif
                        <div class="checkout_form_container">
                            <form action="{{route('home.checkout.updateUser')}}" method="post" id="checkout_form" class="checkout_form">
                                @csrf
                                <div>
                                    <!-- Company -->
                                    <label for="checkout_company">Họ tên</label>
                                    <input type="text" id="checkout_company" name="name" class="checkout_input" value="{{ Auth::user()->name }}">
                                    <span class="alert-danger">{{ $errors->first('name') }}</span>
                                </div>
                                <div>
                                    <!-- Phone no -->
                                    <label for="checkout_phone">Số điện thoại*</label>
                                    <input type="phone" id="checkout_phone" name="phone" class="checkout_input" required="required" value="{{ Auth::user()->phone }}">
                                    <span class="alert-danger">{{ $errors->first('phone') }}</span>
                                </div>
                                <div>
                                    <!-- Email -->
                                    <label for="checkout_email">Email *</label>
                                    <input type="phone" id="checkout_email" name="email" class="checkout_input" required="required" value="{{ Auth::user()->email }}">
                                    <span class="alert-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div>
                                    <!-- Email -->
                                    <label for="checkout_email">Địa chỉ *</label>
                                    <input type="phone" id="checkout_email" name="address" class="checkout_input" required="required" value="{{ Auth::user()->address }}">
                                    <span class="alert-danger">{{ $errors->first('address') }}</span>
                                </div>
                                <div class="checkout_extra">
                                    <input type="submit" class="button order_button" value="Cập nhập">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Info -->

                <div class="col-lg-6">
                    <div class="order checkout_section">
                        <div class="section_title">Đơn hàng</div>
                        <div class="section_subtitle text-danger">Chi tiết đơn hàng</div>

                        <!-- Order details -->
                        <div class="order_list_container">
                            <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Sản phẩm</div>
                                <div class="order_list_value ml-auto">Tổng tiền</div>
                            </div>
                            <ul class="order_list">
                                @foreach(Cart::content() as $keyOfCart => $valueOfCart)
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="order_list_title">{{ $valueOfCart->name }}</div>
                                        <div class="order_list_value ml-auto">{{ $valueOfCart->subtotal(0) }}</div>
                                    </li>
                                @endforeach
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Tổng tiền</div>
                                    <div class="order_list_value ml-auto">{{ Cart::subtotal(0) }} đ</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Thuế</div>
                                    <div class="order_list_value ml-auto">{{ Cart::tax(0) }} đ</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Giảm giá</div>
                                    <div class="order_list_value ml-auto">{{ Cart::discount(0) }} đ</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Tổng trả</div>
                                    <div class="order_list_value ml-auto">{{ Cart::total(0) }} đ</div>
                                </li>
                            </ul>
                        </div>

                        <!-- Payment Options -->

                        <form action="{{route('home.checkout.store')}}" id="formCheckOut" method="POST">
                            @csrf
                            @if( isset($payMents) )
                                <div class="payment">
                                    <div class="payment_options">
                                        @foreach($payMents as $keyOfPayMent => $valueOfPayMent)
                                            <label class="payment_option clearfix">{{ $valueOfPayMent->pay_ment }}
                                                <input type="radio" name="payment" value="{{$valueOfPayMent->id}}">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <span class="alert-danger">{{ $errors->first('payment') }}</span>
                                </div>
                            @endif
                            <!-- Order Text -->
                            <div>
                                <input type="submit" class="button order_button" value="Xác nhận">
                            </div>
                        </form>
                        <div id="paypal-button-container" style="display: none; padding-top: 30px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('src-footer')
        <script src="{{ asset('home/js/checkout.js') }}"></script>
        <script src="https://www.paypal.com/sdk/js?client-id=AbzlmwAqYk2mGjqo7CfOLUYo1Q2C92zktRMqiop1N2I9oNzp-f7Ico9aZHD4FpLDmDhe45Wf6hLfrDjX&currency=USD"></script>
        <script !src="">
            $(document).ready(function () {
                $('#formCheckOut').submit(function (e) {
                    e.preventDefault();
                    let id_pay = $('input[name="payment"]:checked').val();
                    if ( id_pay == 1 ){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type:'POST',
                            url:'{{route('home.checkout.store')}}',
                            data:{ id_pay:id_pay,    status:0 },
                            success:function(data){
                                alert(data.message);
                                if (data.status) {
                                    window.location.href='/';
                                }
                            }
                        });
                    }else {
                        $('#formCheckOut').css('display','none');
                        $('#paypal-button-container').css('display','block','');
                    }
                })
            });

        </script>
        <script>
            // Render the PayPal button into #paypal-button-container
            let money = "{{ \App\Helpers\Helper::getUSD(Cart::total(0)) }}";
            paypal.Buttons({

                // Set up the transaction
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: money
                            }
                        }]
                    });
                },

                // Finalize the transaction
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        // Show a success message to the buyer
                        let id_pay = $('input[name="payment"]:checked').val();
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type:'POST',
                            url:"{{route('home.checkout.store')}}",
                            data:{ id_pay:id_pay,    status:1 },
                            success:function(data){
                                alert(data.message);
                                if (data.status) {
                                    window.location.href='/';
                                }
                            }
                        });
                    });
                }


            }).render('#paypal-button-container');
        </script>
    @endsection
>
