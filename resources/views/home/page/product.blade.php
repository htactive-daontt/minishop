@extends('templates.home.master')
@section('title') Sản phẩm @endsection
@section('src-home')
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/product.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/product_responsive.css') }}">
    <style>
        /*information product*/
        .information-product .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            border-top: none;
            border-bottom: none;
            display: inline-block;
            background-color: #ffffff;
        }

        /* Style the buttons inside the tab */
        .information-product .tab button {
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            background: rgba(0,0,0,0.04);
            border-top: 2px solid #ddd;
            margin: 0;
        }


        /* Create an active/current tablink class */
        .information-product .tab button.active {
            background-color: #ffffff;
            border-top: 2px solid #c30005;
        }
        /*information product*/
        .information-product .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            border-top: none;
            border-bottom: none;
            display: inline-block;
            background-color: #ffffff;
        }

        /* Style the buttons inside the tab */
        .information-product .tab button {
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
            background: rgba(0,0,0,0.04);
            border-top: 2px solid #ddd;
            margin: 0;
        }


        /* Create an active/current tablink class */
        .information-product .tab button.active {
            background-color: #ffffff;
            border-top: 2px solid #c30005;
        }

        /* Style the tab content */
        .information-product .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            margin-top: -6px;
            padding-top: 3%;
        }
        .information-product .tabcontent table {
            margin-bottom: 0;
        }
        /*rating*/
        .information-product .tabcontent.vote form {
            border: 2px solid #c30005;
            padding: 10px;
        }
        .information-product .tabcontent.vote form h5{
            padding-bottom: 15px;
        }
        .information-product .tabcontent.vote .rating-group {
            display: flex;
        }
        /*rating*/
        .rating input {
            border: 0;
            width: 1px;
            height: 1px;
            overflow: hidden;
            position: absolute !important;
            clip: rect(1px 1px 1px 1px);
            clip: rect(1px, 1px, 1px, 1px);
            opacity: 0;
        }

        .rating label {
            position: relative;
            float: right;
            color: #C8C8C8;
        }
        .rating label:before {
            margin: 5px;
            content: "\f005";
            font-family: FontAwesome;
            display: inline-block;
            font-size: 1.5em;
            color: #ccc;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        .rating input:checked ~ label:before {
            color: #FFC107;
        }
        .rating label:hover ~ label:before {
            color: #ffdb70;
        }
        .rating label:hover:before {
            color: #FFC107;
        }
        /*san pham tuong tu*/
        .detail-product .container-product {
            margin-bottom: 20px;
        }
        .detail-product h3 {
            border-bottom: 2px solid #ddd;
            padding-bottom: 15px;
            text-transform: uppercase;
            font-weight: 700;
        }
        /*cart*/
        .cart .cart-product {
            height: 50px;
            max-width: 200px;
        }
        .cart-product .cart-product-image {
            width: 30%;
            height: 100%;
            float: left;
        }
        .cart-product .cart-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .cart-product .cart-product-info {
            width: 70%;
            height: 100%;
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cart-content-left {
            border-right: 2px solid #ddd;
        }
        .form-comment {
            border-bottom: 1px solid #ccc;
            padding: 10px;
        }
        .list-commnet .form-control:last-child {
            border-bottom: none;
        }
    </style>
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
            <div class="home_background" style="background-image:url({{ asset('home/images/categories.jpg') }})"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$objectProduct->category->name}}<span>.</span></div>
                                <div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Details -->

    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large"><img src="{{ asset("storage/products_thumbnail/$objectProduct->thumbnail") }}" alt=""><div class="product_extra product_new"><a href="categories.html">New</a></div></div>
                        @if(!empty($objectProduct->images))
                            <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                                @foreach($objectProduct->images as $valueOfImages)
                                    <div class="details_image_thumbnail active" data-image="{{ asset("storage/products_images/$valueOfImages") }}"><img src="{{ asset("storage/products_images/$valueOfImages") }}" alt=""></div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{$objectProduct->name}}</div>
                        @if($objectProduct->sale !=0)
                            <div class="details_discount">{{number_format($objectProduct->price)}} đ</div>
                            <div class="details_price">
                                {{ $objectProduct->checkQty() }}
                            </div>
                        @else
                            <div class="details_price">{{number_format($objectProduct->price)}} đ</div>
                        @endif


                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <div class="availability">Danh mục:</div>
                            <span>{{$objectProduct->category->name}}</span>
                        </div>
                        <div class="details_text">
                            <p>{{$objectProduct->preview}}</p>
                        </div>
                        <p class="alert-danger">{{$errors->first('qty')}}</p>
                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                            <form action="{{route('home.shopping.store', $objectProduct->id)}}" method="post">
                                @csrf
                                <div class="product_quantity clearfix">
                                    <span>Số lượng</span>
                                    <input id="quantity_input" style="padding-left: 24px;" name="qty" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                    </div>
                                </div>

                                <input type="submit" class="button cart_button" {{$objectProduct->checkBtnQty()}} value="Thêm vào giỏ hàng">
                            </form>
                        </div>

                        <!-- Share -->
                        <div class="details_share">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container information-product" style="margin-top: 50px">
                <div class="tab">
                    <button class="tablinks active" onclick="openCity(event, 'infor-product')" id="defaultOpen">Thông tin chi tiết</button>
                    <button class="tablinks" onclick="openCity(event, 'vote')">Bình luận ({{ $objectProduct->comment_count }})</button>
                </div>

                <div id="infor-product" class="tabcontent" style="display: block">
                    {!! $objectProduct->detail !!}
                </div>

                <div id="vote" class="tabcontent vote" >
                    @if( Auth::check() )
                        <div id="content-rating">
                            <h4>Bình luận</h4>
                            <form action="{{ route('home.page.comment', $objectProduct->id) }}" method="post" class="form-group" id="form-rating">
                                @csrf
                                <h5>Hãy gởi phản hồi của bạn về sản phẩm này !</h5>
                                <div style="clear: both"></div>
                                <div class="form-group">
                                    <label for="">Nhận xét của bạn</label>
                                    <textarea name="content" id="rating-content" cols="5" rows="5" class="form-control" required></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary product-button" value="Gửi đi" />
                            </form>
                        </div>
                    @else
                        <p style="color:red">Nếu bạn muốn đánh giá sản phẩm thì hãy đăng nhập !</p>
                    @endif
                    <div style="margin-top: 30px" id="result-rating" class="list-commnet">
                            @if($objectProduct->comment_count > 0)
                                @foreach($objectProduct->comment as $valueCmt)
                                    <div class="form-comment">
                                        <div style="padding: 10px 0">
                                            <h5>{{ $valueCmt->user->name }}</h5>
                                            <div style="padding: 10px">
                                                <p>{{ $valueCmt->content }}</p>
                                                <span class="pro-rating">
                                    </span>
                                                <p><i class="fa fa-clock-o" style="padding-right: 5px"></i>{{ \App\Helpers\Helper::formatDate($valueCmt->created_at) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>KHông có bình luận nào !!!</p>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Sản phẩm cùng loại</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                        @foreach($productsRelate as $keyOfRelate => $valueOfRelate)
                            <div class="product">
                                <div class="product_image"><img src="{{ asset("storage/products_thumbnail/$valueOfRelate->thumbnail") }}" alt=""></div>
                                <div class="product_extra product_new"><a href="categories.html">New</a></div>
                                <div class="product_content">
                                    <div class="product_title"><a href="{{route('home.page.product',[$valueOfRelate->slug, $valueOfRelate->id])}}">{{$valueOfRelate->name}}</a></div>
                                    <div class="product_price">{{ number_format($valueOfRelate->price) }} đ</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('src-footer')
    <script src="{{ asset('home/js/product.js') }}"></script>
    <script>
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
        }
    </script>
@endsection

