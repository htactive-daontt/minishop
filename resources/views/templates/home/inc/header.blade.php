<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sakura - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('home/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    @yield('src-home')
</head>
<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo"><a href="{{route('home.index')}}">Sakura.</a></div>
                            <nav class="main_nav">
                                <ul>
                                    <li>
                                        <a href="{{route('home.index')}}">Trang chủ</a>
                                    </li>
                                    <li class="hassubs">
                                        <a href="{{route('home.page.categories',['sdsa',1])}}">Danh mục</a>
                                        <ul>
                                            @foreach($categories as $key => $value)
                                                <li><a href="{{route('home.page.categories',[$value['slug'],$value['id']])}}">{{$value['name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{route('home.page.news')}}">Tin tức</a></li>
                                    <li><a href="{{route('home.page.contact')}}">Liên hệ</a></li>
                                </ul>
                            </nav>

                            <div class="header_extra ml-auto">
                                <div class="shopping_cart">
                                    <a href="{{route('home.shopping.index')}}">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
											<g>
                                                <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
                                            </g>
										</svg>
                                        <div>Giỏ hàng <span>({{ Cart::count() }})</span></div>
                                    </a>
                                </div>

                                <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            </div>
                            <div class="account">
                                @if( Auth::check() )
                                    <div class="dropdown dropdown-account">
                                        <a href="javascript:void(0)" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('home.page.user', Auth::id())}}">Thông tin của tôi</a></li>
                                            <li><a href="{{route('home.page.logout')}}">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <div class="account_user">
                                        <a href="{{route('home.page.login')}}" >Đăng nhập</a>
                                        <a href="{{route('home.page.register')}}" >Đăng ký</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
