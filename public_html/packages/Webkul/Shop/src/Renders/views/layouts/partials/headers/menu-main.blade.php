<div class="row align-items-center">
    <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
        <span class="categorie-title">{{ __('shop::app.menu.shop-by-categories') }}</span>
    </div>
    <div class="col-xl-9 col-lg-8 col-md-12 ">
        <nav class="d-none d-lg-block">
            <ul class="header-bottom-list d-flex">
                @php
                    function showMenus($pages, $parent_id = 0, $char = '')
                    {
                        foreach ($pages as $key => $item)
                        {
                            // Nếu là chuyên mục con thì hiển thị
                            if ($item->parent_id == $parent_id)
                            {
                                if($item->slug == 'home-page' || $item->slug == 'trang-chu') {
                                    echo $char. '<li class="active">';
                                } else {
                                    echo $char. '<li>';
                                }
                                echo $char. '<a>';
                                echo $char.$item->name;
                                echo $char.'<i class="fa fa-angle-down"></i>';
                                echo $char.'</a>';
                                // Xóa chuyên mục đã lặp
                                unset($pages[$key]);
                                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                showSubMenus($pages, $item->id, $char.'');
                            }
                        }
                    }

                    function showSubMenus($pages, $parent_id = 0, $char = '')
                    {
                        echo $char. '<ul class="ht-dropdown">';
                        foreach ($pages as $key => $item)
                        {
                            // Nếu là chuyên mục con thì hiển thị
                            if ($item->parent_id == $parent_id)
                            {
                                echo $char. '<li>';
                                echo $char. '<a>';
                                echo $char.$item->name;
                                echo $char.'</a>';
                                // Xóa chuyên mục đã lặp
                                unset($pages[$key]);

                                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                showSubMenus($pages, $item->id, $char.'');
                                echo $char. '</li>';
                            }
                        }
                        echo $char. '</ul>';
                    }

                    if(!empty($pages))
                    {
                        echo showMenus($pages);
                    }
                @endphp
            </ul>
        </nav>
        <div class="mobile-menu d-block d-lg-none">
            <nav>
                <ul>
                    <li><a href="index.html">home</a>
                        <!-- Home Version Dropdown Start -->
                        <ul>
                            <li><a href="index.html">Home Version 1</a></li>
                            <li><a href="index-2.html">Home Version 2</a></li>
                            <li><a href="index-3.html">Home Version 3</a></li>
                            <li><a href="index-4.html">Home Version 4</a></li>
                        </ul>
                        <!-- Home Version Dropdown End -->
                    </li>
                    <li><a href="shop.html">shop</a>
                        <!-- Mobile Menu Dropdown Start -->
                        <ul>
                            <li><a href="product.html">product details</a></li>
                            <li><a href="compare.html">compare</a></li>
                            <li><a href="cart.html">cart</a></li>
                            <li><a href="checkout.html">{{ __('shop::header.checkout') }}</a></li>
                            <li><a href="wishlist.html">wishlist</a></li>
                        </ul>
                        <!-- Mobile Menu Dropdown End -->
                    </li>
                    <li><a href="blog.html">Blog</a>
                        <!-- Mobile Menu Dropdown Start -->
                        <ul>
                            <li><a href="single-blog.html">blog details</a></li>
                        </ul>
                        <!-- Mobile Menu Dropdown End -->
                    </li>
                    <li><a href="#">pages</a>
                        <!-- Mobile Menu Dropdown Start -->
                        <ul>
                            <li><a href="register.html">register</a></li>
                            <li><a href="login.html">sign in</a></li>
                            <li><a href="forgot-password.html">forgot password</a></li>
                            <li><a href="404.html">404</a></li>
                        </ul>
                        <!-- Mobile Menu Dropdown End -->
                    </li>
                    <li><a href="about.html">about us</a></li>
                    <li><a href="contact.html">contact us</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- Row End -->