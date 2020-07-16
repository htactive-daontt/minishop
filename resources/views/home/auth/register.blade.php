@extends('templates.home.master')
@section('title') Đăng ký @endsection
@section('src-home')
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/styles/cart_responsive.css') }}">
    <style>
        .wrapper {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            min-height: 100%;
            padding: 20px;
        }

        #formContent {
            -webkit-border-radius: 10px 10px 10px 10px;
            border-radius: 10px 10px 10px 10px;
            background: #fff;
            padding: 30px;
            width: 90%;
            max-width: 450px;
            position: relative;
            padding: 0px;
            -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
            box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
            text-align: center;
        }

        #formFooter {
            background-color: #f6f6f6;
            border-top: 1px solid #dce8f1;
            padding: 25px;
            text-align: center;
            -webkit-border-radius: 0 0 10px 10px;
            border-radius: 0 0 10px 10px;
        }



        /* TABS */

        h2.inactive {
            color: #cccccc;
        }

        h2.active {
            color: #0d0d0d;
            border-bottom: 2px solid #5fbae9;
        }





        /* ANIMATIONS */

        /* Simple CSS3 Fade-in-down Animation */
        .fadeInDown {
            -webkit-animation-name: fadeInDown;
            animation-name: fadeInDown;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @-webkit-keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                -webkit-transform: translate3d(0, -100%, 0);
                transform: translate3d(0, -100%, 0);
            }
            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

        /* Simple CSS3 Fade-in Animation */
        @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }



        /* Simple CSS3 Fade-in Animation */
        .underlineHover:after {
            display: block;
            left: 0;
            bottom: -10px;
            width: 0;
            height: 2px;
            background-color: #56baed;
            content: "";
            transition: width 0.2s;
        }

        .underlineHover:hover {
            color: #0d0d0d;
        }

        .underlineHover:hover:after{
            width: 100%;
        }



        /* OTHERS */

        *:focus {
            outline: none;
        }

        #icon {
            width:60%;
        }

    </style>
@endsection
@section('content-home')
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <h4 style="padding: 20px">Đăng ký</h4>
                <p class="alert-danger">{{$errors->first()}}</p>
                @if(Session::has('msg'))
                    <span class="alert-success">{{Session::get('msg')}}</span>
                @elseif(Session::has('error'))
                    <span class="alert-danger">{{Session::get('error')}}</span>
                @endif
            </div>
            <div style="padding: 20px">
                <form class="form-horizontal" action="{{route('home.page.postRegister')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email.." >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <input type="password" name="password" class="form-control" id="pwd" placeholder="Mật khẩu">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <input type="text" name="name" class="form-control" id="pwd" placeholder="Họ tên">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <input type="text" name="address" class="form-control" id="pwd" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <input type="text" name="phone" class="form-control" id="pwd" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Đăng ký">
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('src-footer')
    <script src="{{ asset('home/js/cart.js') }}"></script>
@endsection


