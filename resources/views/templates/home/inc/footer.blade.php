
<footer>
    <div id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Giới thiệu</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();">MINISHOP chuyên bán mỹ phẩm chính hãng cam kết hàng chính hãng</a></li>
                        <li><a href="javascript:void();">Có sỉ và lẻ mọi mặt hàng</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Địa chỉ</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();">33 Bàu Trảng 7 </a></li>
                        <li><a href="javascript:void();">Thanh Khê</a></li>
                        <li><a href="javascript:void();">Đà Nẵng</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Liên hệ</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="javascript:void();">SĐT: 0332114500</a></li>
                        <li><a href="javascript:void();">Email: nguyenthithudao75h12@gmail.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/login?lang=vi"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/accounts/login/?"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="https://myaccount.google.com/u/0/profile"><i class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="https://mail.google.com/mail/u/0/#inbox" target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                </hr>
            </div>
           
        </div>
    </div>
</footer>
</div>

<script src="{{ asset('home/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('home/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('home/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('home/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('home/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('home/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('home/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('home/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('home/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('home/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('home/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('home/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script !src="">
    $ (function () {
        $('#formSearch').submit(function (e) {
            e.preventDefault();
            let searchUrl = $(this).data('search-src');
            let keyword = $('.search_input').val();

            if (keyword.length > 0) {
                window.location.href = searchUrl + '?keyword=' + keyword;
                return;
            }

        });
    });
</script>
@yield('src-footer')
</body>
</html>
