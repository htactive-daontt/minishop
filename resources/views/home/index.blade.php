@extends('templates.home.master')
@section('title') Trang chủ @endsection
@section('src-home')
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/template.css') }}">
@endsection
@section('content-home')
        <!-- Social -->
        <div class="header_social">
            <ul>
                <li><a href="/#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="/#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="/#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="/#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
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
                        <a href="/index.html">Home<i class="fa fa-angle-down"></i></a>
                        <ul class="page_menu_selection menu_mm">
                            <li class="page_menu_item menu_mm"><a href="/categories.html">Categories<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="/product.html">Product<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="/cart.html">Cart<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="/checkout.html">Checkout<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="/contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
                        </ul>
                    </li>
                    <li class="page_menu_item has-children menu_mm">
                        <a href="/categories.html">Categories<i class="fa fa-angle-down"></i></a>
                        <ul class="page_menu_selection menu_mm">
                            <li class="page_menu_item menu_mm"><a href="/categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="/categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="/categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item menu_mm"><a href="/categories.html">Category<i class="fa fa-angle-down"></i></a></li>
                        </ul>
                    </li>
                    <li class="page_menu_item menu_mm"><a href="/index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item menu_mm"><a href="/#">Offers<i class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item menu_mm"><a href="/contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

        <div class="menu_social">
            <ul>
                <li><a href="/#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="/#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="/#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="/#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- Home -->

    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                @foreach($data['slides'] as $keyOfSlide => $valueOfSlide)
                    <div class="owl-item home_slider_item abc">
                        <div class="home_slider_background" style="background-image:url({{ \App\Ultis\File::getFile($valueOfSlide->thumbnail) }})"></div>
                        <div class="home_slider_content_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                            <div class="home_slider_title">{{ $valueOfSlide->title }}</div>
                                            <div class="home_slider_subtitle">{{ $valueOfSlide->preview }}</div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Home Slider Dots -->

             <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                    <li class="home_slider_custom_dot active">01.</li>
                                    <li class="home_slider_custom_dot">02.</li>
                                    <li class="home_slider_custom_dot">03.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

        </div>
    </div>

    <!-- Ads -->
    <!-- Products -->

    <div class="products">
        <div class="container">
            <div>
                <div class="row title-product">
                    <div class="tab">
                        <button class="tablinks active" onclick="openCity(event, 'London')" id="defaultOpen">Sản phẩm mới</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Sản phẩm giảm giá</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Sản phẩm bán chạy</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tabcontent" id="London" style="display: block">
                            <div class="row product-content owl-two owl-carousel owl-theme">
                                @foreach($data['productsNew'] as $keyOfProducts => $valueOfProducts)
                                    <div class="item">
                                        <div class="col-product">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <img src="{{ $valueOfProducts->getImg() }}">
                                                </div>
                                                <div class="product-info">
                                                    <h4><a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}">{{ $valueOfProducts->name }}</a></h4>
                                                    <a href="{{ route('home.page.categories', [$valueOfProducts->category->slug, $valueOfProducts->category->id]) }}" class="category-product">Loại: {{ $valueOfProducts->category->name }}</a>
                                                    <p>{{ $valueOfProducts->getPrice() }}</p>
                                                </div>
                                            </div>
                                            <div class="btn-product">
                                                <a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}" class="btn btn-danger btn-detail">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tabcontent" id="Paris">
                            <div class="row product-content owl-two owl-carousel owl-theme">
                                @foreach($data['productSale'] as $keyOfProducts => $valueOfProducts)
                                    <div class="item">
                                        <div class="col-product">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <img src="{{ $valueOfProducts->getImg() }}">
                                                </div>
                                                <div class="product-info">
                                                    <h4><a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}">{{ $valueOfProducts->name }}</a></h4>
                                                    <a href="{{ route('home.page.categories', [$valueOfProducts->category->slug, $valueOfProducts->category->id]) }}" class="category-product">Loại: {{ $valueOfProducts->category->name }}</a>
                                                    <p>{{ $valueOfProducts->getPrice() }}</p>
                                                </div>
                                            </div>
                                            <div class="btn-product">
                                                <a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}" class="btn btn-danger btn-detail">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tabcontent" id="Tokyo">
                            <div class="row product-content owl-two owl-carousel owl-theme">
                                @foreach($data['productSeling'] as $keyOfProducts => $valueOfProducts)
                                    <div class="item">
                                        <div class="col-product">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <img src="{{ $valueOfProducts->getImg() }}">
                                                </div>
                                                <div class="product-info">
                                                    <h4><a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}">{{ $valueOfProducts->name }}</a></h4>
                                                    <a href="{{ route('home.page.categories', [$valueOfProducts->category->slug, $valueOfProducts->category->id]) }}" class="category-product">Loại: {{ $valueOfProducts->category->name }}</a>
                                                    <p>{{ $valueOfProducts->getPrice() }}</p>
                                                </div>
                                            </div>
                                            <div class="btn-product">
                                                <a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}" class="btn btn-danger btn-detail">Xem chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Icon Boxes -->

    <div class="products" style="padding-bottom: 20px">
        <div class="container">
            <div>
                <div class="row title-product">
                    <div class="tab">
                        <h3>Danh sách sản phẩm</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($data['product'] as $keyOfProducts => $valueOfProducts)
                        <div class="col-sm-3">
                            <div class="col-product">
                                <div class="product-item">
                                    <div class="product-img">
                                        <img src="{{ $valueOfProducts->getImg() }}">
                                    </div>
                                    <div class="product-info">
                                        <h4><a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}">{{ $valueOfProducts->name }}</a></h4>
                                        <a href="{{ route('home.page.categories', [$valueOfProducts->category->slug, $valueOfProducts->category->id]) }}" class="category-product">Loại: {{ $valueOfProducts->category->name }}</a>
                                        <p>{{ $valueOfProducts->getPrice() }}</p>
                                    </div>
                                </div>
                                <div class="btn-product">
                                    <a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}" class="btn btn-danger btn-detail">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>{{ $data['product']->links() }}</div>
            </div>
        </div>
    </div>


    <!-- Footer -->
@endsection
@section('src-footer')
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script !src="">
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        };
        $('.owl-two').owlCarousel({
            loop:true,
            margin:15,
            nav:true,
            dots: false,
            autoplay:true,
            autoplayHoverPause: true,
            autoplayTimeout:1000,
            autoplaySpeed:300,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });
    </script>
@endsection

