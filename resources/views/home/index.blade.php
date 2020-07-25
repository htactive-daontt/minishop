@extends('templates.home.master')
@section('title') Trang chủ @endsection
@section('src-home')
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/responsive.css') }}">
@endsection
@section('content-home')
        <!-- Search Panel -->
        <div class="search_panel trans_300">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
                            <form action="#">
                                <input type="text" class="search_input" placeholder="Search" required="required">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <div class="home_slider_background" style="background-image:url({{ asset("storage/slides_thumbnail/$valueOfSlide->thumbnail") }})"></div>
                        <div class="home_slider_content_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                            <div class="home_slider_title">{{ $valueOfSlide->title }}</div>
                                            <div class="home_slider_subtitle">{{ $valueOfSlide->preview }}</div>
                                            <div class="button button_light home_button"><a href="">Chi tiết</a></div>
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
    @if(empty($data['news']))
    <div class="avds">
        <div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
            <div class="avds_small">
                <div class="avds_background" style="background-image:url({{ $data['news'][0]->getImg() }})"></div>
                <div class="avds_small_inner">
                    <div class="avds_discount_container">
                        <img src="{{ asset('home/images/discount.png') }}" alt="">
                        <div>
                            <div class="avds_discount">
                                <div>20<span>%</span></div>
                                <div>Discount</div>
                            </div>
                        </div>
                    </div>
                    <div class="avds_small_content">
                        <div class="avds_title">{{ $data['news'][0]->title }}</div>
                        <div class="avds_link"><a href="{{ route('home.page.newDetail', $data['news'][0]->id) }}">Xem thêm</a></div>
                    </div>
                </div>
            </div>
            <div class="avds_large">
                <div class="avds_background" style="background-image:url({{$data['news'][1]->getImg()}})"></div>
                <div class="avds_large_container">
                    <div class="avds_large_content">
                        <div class="avds_title">{{ $data['news'][1]->title }}</div>
                        <div class="avds_text">{{ $data['news'][1]->preview }}</div>
                        <div class="avds_link avds_link_large"><a href="{{ route('home.page.newDetail', $data['news'][1]->id) }}">Xem thêm</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                        <!-- Product -->
                        @if(isset($data['products']))
                        @foreach($data['products'] as $keyOfProducts => $valueOfProducts)
                            <div class="product">
                                <div class="product_image"><img src="{{ asset("storage/products_thumbnail/$valueOfProducts->thumbnail") }}" alt=""></div>
                                @if($valueOfProducts->sale !=0)
                                    <div class="product_extra product_sale"><a href="">Sale</a></div>
                                @else
                                    <div class="product_extra product_new"><a href="">New</a></div>
                                @endif
                                <div class="product_content">
                                    <div class="product_title"><a href="{{route('home.page.product',[$valueOfProducts->slug, $valueOfProducts->id])}}">{{$valueOfProducts->name}}</a></div>
                                    <div class="product_price">{{$valueOfProducts->category->name}}</div>
                                    <div class="product_price">{{ $valueOfProducts->checkQty() }}</div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                    {{ $data['products']->links() }}

                </div>
            </div>
        </div>
    </div>

    <!-- Icon Boxes -->

    <div class="icon_boxes">
        <div class="container">
            <div class="row icon_box_row">

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{ asset('home/images/icon_1.svg') }}" alt=""></div>
                        <div class="icon_box_title">Free Shipping Worldwide</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{ asset('home/images/icon_2.svg') }}" alt=""></div>
                        <div class="icon_box_title">Free Returns</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="{{ asset('home/images/icon_3.svg') }}" alt=""></div>
                        <div class="icon_box_title">24h Fast Support</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
@endsection
@section('src-footer')
    <script src="{{ asset('home/js/custom.js') }}"></script>
@endsection

