@php
     $hideMenu = "";
     if($routeName == "shop.home.index") {
        $hideMenu = "d-lg-block";
     }
@endphp
<!-- Vertical Menu Start Here -->
<div class="col-xl-3 col-lg-4 d-none {{$hideMenu}}">
    <div class="vertical-menu mb-all-30">
        <nav>

            <ul class="vertical-menu-list">
                @php
                    function showCategories($categories, $parent_id = 1, $char = '')
                    {
                        foreach ($categories as $key => $item)
                        {
                            // Nếu là chuyên mục con thì hiển thị
                            if ($item->parent_id == $parent_id)
                            {
                                echo $char. '<li>';
                                echo $char. '<a>';
                                if($item->image) {
                                    echo $char. '<span>';
                                    echo $char. '<img src="storage/'.$item->image.'" alt="'.$item->name.'">';
                                    echo $char. '</span>';
                                }
                                echo $char.$item->name;
                                echo $char.'<i class="fa fa-angle-right" aria-hidden="true"></i>';
                                echo $char.'</a>';
                                // Xóa chuyên mục đã lặp
                                unset($categories[$key]);
                                 echo $char. '<ul class="ht-dropdown mega-child">';
                                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                showCategories($categories, $item->id, $char.'');
                                echo $char. '</ul>';
                                echo $char. '</li>';
                            }
                        }
                    }

                    if(!empty($categories)) {
                        echo showCategories($categories);
                    }
                @endphp
            </ul>
        </nav>
    </div>
</div>
<!-- Vertical Menu End Here -->