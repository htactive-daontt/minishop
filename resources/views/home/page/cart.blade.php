@extends('templates.home.master')
@section('title') Giỏ hàng @endsection
@section('src-home')
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/cart_responsive.css') }}">
@endsection
@section('content-home')
        <!-- Social -->
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
                                        <li><a href="categories.html">Danh mục</a></li>
                                        <li>Giỏ hàng</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Info -->
    @if(  count(Cart::content()) >0 )
        <div class="cart_info">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Sản phẩm</div>
                        <div class="cart_info_col cart_info_col_price">Giá</div>
                        <div class="cart_info_col cart_info_col_quantity">Số lượng</div>
                        <div class="cart_info_col cart_info_col_total">Tổng tiền</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">
                <div class="col">

                    <!-- Cart Item -->
                    @foreach(Cart::content() as $keyOfCart => $valueOfCart)
                        <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                        <!-- Name -->
                        <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                            <div class="cart_item_image">
                                @php $thumbnail = $valueOfCart->options->thumbnail; @endphp
                                <div><img src="{{ asset("storage/products_thumbnail/$thumbnail") }}" alt=""></div>
                            </div>
                            <div class="cart_item_name_container">
                                <div class="cart_item_name"><a href="#">{{ $valueOfCart->name }}</a></div>
                                <div class="cart_item_edit"><a href="#">{{ $valueOfCart->options->category }}</a></div>
                            </div>
                        </div>
                        <!-- Price -->
                        <div class="cart_item_price">{{ number_format($valueOfCart->price) }} đ</div>
                        <!-- Quantity breadcrumbs-->
                        <div class="cart_item_quantity">
                            <div class="product_quantity_container">
                                <div class="product_quantity clearfix">
                                  
                                    <input id="quantity_input" name="qty" class="update-qty-{{$valueOfCart->rowId}}" type="text" pattern="[0-9]*" value="{{$valueOfCart->qty}}">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total -->
                            <div class="cart_item_total cart_item_total_{{$valueOfCart->rowId}}">{{ $valueOfCart->subtotal(0) }} đ</div>
                            <div style="padding-left: 10px"><a class="fa fa-trash" style="color: #6c6a74;" href="{{route('home.shopping.remove', $valueOfCart->rowId)}}"></a></div>
                            <div style="padding-left: 10px" class="update" >
                                <a class="fa fa-refresh update-cart" data-id="{{$valueOfCart->rowId}}" href="javascript:void(0)" style="color: #6c6a74;"></a>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button"><a href="{{route('home.index')}}">Tiếp tục mua hàng</a></div>
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button"><a href="{{route('home.shopping.destroy')}}">Xóa tất cả</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra">
                <div class="col-lg-4">
                    <!-- Coupon Code -->
                    <div class="coupon" style="margin-top: 0 !important;">
                        <div class="section_title">Mã giảm giá</div>
                        <div class="section_subtitle">Nhập mã giảm giá của bạn</div>
                        <div class="coupon_form_container">
                            <form action="{{route('home.shopping.giftCode')}}" method="post" id="coupon_form" class="coupon_form">
                                @csrf
                                <input type="text" class="coupon_input" name="code" required="required">
                                <button type="submit" class="button coupon_button"><span>Nhập</span></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Tổng tiền</div>
                        @if(Session::has('msg'))
                            <div class="section_subtitle text-danger
                            ">{{Session::get('msg')}}</div>
                        @endif
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Tổng tiền</div>
                                    <div class="cart_total_value ml-auto cart_sub_total">{{Cart::subTotal(0)}} đ</div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Thuế</div>
                                    <div class="cart_total_value ml-auto">{{ Cart::tax(0) }} đ</div>
                                </li>
                                @if(Cart::discount(0) )
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_total_title">Giảm giá</div>
                                        <div class="cart_total_value ml-auto">{{ Cart::discount(0) }} đ</div>
                                    </li>
                                @endif
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Tổng tiền</div>
                                    <div class="cart_total_value ml-auto cart_total_ok">{{ Cart::total(0) }} đ</div>
                                </li>
                            </ul>
                        </div>
                        <div class="button checkout_button"><a href="{{route('home.page.checkout')}}">Thanh tóan</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div >
            <div style="margin: 20px auto;text-align: center">
                @if(Session::has('msg'))
                    <div class="alert-success">{{Session::get('msg')}}</div>
                @endif
            </div>
            <div style="margin: 20px auto" class="button continue_shopping_button">
                <a href="{{route('home.index')}}">Giỏ hàng trống</a>

            </div>
        </div>
    @endif
@endsection
@section('src-footer')
    <script src="{{ asset('home/js/cart.js') }}"></script>
    <script !src="">
        $(document).ready(function () {
            $('.update-cart').click(function () {
                let id = $(this).data('id');
                let qty = $('.update-qty-'+id).val();
                $.ajax({
                    url: '{{route('home.shopping.update')}}',
                    type: 'POST',
                    cache:false,
                    data:{
                        "_token": '{{csrf_token()}}',
                        'id':id,
                        'qty'  : qty,
                    },
                    success: function (data) {
                        if(data ==1) {
                            location.reload()
                        }else {
                            $('.cart_item_total_'+id).html(data.product);
                            $('.cart_sub_total').html(data.subTotal);
                            $('.cart_tax').html(data.tax);
                            $('.cart_total_ok').html(data.total);
                        }
                    }
                });
            })
        })
    </script>
@endsection


