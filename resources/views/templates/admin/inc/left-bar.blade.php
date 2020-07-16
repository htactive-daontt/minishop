<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('admin.index')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
            </li>
            @canany(['category-list','category-edit'])
            <li>
                    <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Quản lý Sản phẩm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('admin.categories.get')}}">Danh mục</a>
                        </li>

                        @canany('product-list')
                        <li>
                            <a href="{{route('admin.products.get')}}">Sản phẩm</a>
                        </li>
                        @endcanany
                    </ul>
                <!-- /.nav-second-level -->
            </li>
            @endcanany

            @canany('bill-list')
            <li>
                <a href="{{route('admin.transactions.get')}}"><i class="fa fa-cart-arrow-down fa-fw"></i> Quản lý đơn hàng</a>
            </li>
            @endcanany

            @canany('giftcode-list')
            <li>
                <a href="{{route('admin.giftcode.get')}}"><i class="fa fa-gift fa-fw"></i> Quản lý mã giảm giá </a>
            </li>
            @endcanany

            @canany('news-list')
            <li>
                <a href="{{route('admin.news.get')}}"><i class="fa fa-table fa-fw"></i> Quản lý bài đăng</a>
            </li>
            @endcanany

            @canany('slide-list')
            <li>
                <a href="{{route('admin.slides.get')}}"><i class="fa fa-film fa-fw"></i> Quản lý slide </a>
            </li>
            @endcanany

            @canany('contact-list')
                <li>
                    <a href="{{route('admin.contacts.get')}}"><i class="fa fa-envelope-o fa-fw"></i> Quản lý liên hệ </a>
                </li>
            @endcanany

            @canany('user-list')
            <li>
                <a href="{{route('admin.users.get')}}"><i class="fa fa-user-md fa-fw"></i> Quản lý người dùng </a>
            </li>
            @endcanany

            @canany('report-list')
            <li>
                <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Thống kê<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.report.bill', date('Y'))}}">Đơn hàng</a>
                    </li>
                    <li>
                        <a href="{{route('admin.report.employee')}}">Nhân viên</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endcanany

        </ul>
    </div>
</div>
