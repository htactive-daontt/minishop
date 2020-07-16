@extends('templates.home.master')
@section('title') Tài khoản của tôi @endsection
@section('src-home')
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/contact_responsive.css') }}">
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
            <div class="home_background" style="background-image:url({{ asset('home/images/contact.jpg') }})"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="index.html">Home</a></li>
                                        <li>My Account</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">
        <div class="container">
            <div class="row">

                <!-- Get in touch -->
                <div class="col-lg-8 contact_col">
                    <div class="get_in_touch">
                        <div class="section_title">Thông tin của tôi</div>
                        @if(Session::has('msg'))
                            <span class="alert-success">{{Session::get('msg')}}</span>
                        @elseif(Session::has('error'))
                            <span class="alert-danger">{{Session::get('error')}}</span>
                        @endif
                        <div class="contact_form_container">
                            <form action="{{route('home.page.updateInfor', Auth::id())}}" id="contact_form" class="contact_form" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <label for="contact_name">Họ tên*</label>
                                        <input type="text" id="contact_name" name="name" class="contact_input" required="required" value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <label for="contact_last_name">Email*</label>
                                        <input type="text" id="contact_last_name" name="email" class="contact_input" required="required" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                                <div>
                                    <!-- Subject -->
                                    <label for="contact_company">Địa chỉ</label>
                                    <input type="text" id="contact_company" name="address" class="contact_input" value="{{Auth::user()->address}}">
                                </div>
                                <div>
                                    <!-- Subject -->
                                    <label for="contact_company">Số điện thoại</label>
                                    <input type="text" id="contact_company" name="phone" class="contact_input" value="{{Auth::user()->phone}}">
                                </div>
                                <div>
                                    <!-- Subject -->
                                    <label for="contact_company">Mật khẩu</label>
                                    <input type="password" id="contact_company" name="password" class="contact_input" >
                                </div>
                                <input type="submit" class="button contact_button" value="Cập nhập">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 offset-xl-1 contact_col">
                    <div class="contact_info">
                        <div class="contact_info_section">
                            <div class="contact_info_title">Lựa chọn</div>
                            <ul>
                                <li><a href="{{route('home.page.billBought', [Auth::id(),1])}}">Đơn hàng đã mua</a></li>
                                <li><a href="{{route('home.page.billBought', [Auth::id(),0])}}">Đơn hàng đợi xử lý</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('src-footer')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
    <script src="{{ asset('home/js/contact.js') }}"></script>
@endsection
