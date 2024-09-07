<header class="header header--organic" data-sticky="true">
    <div class="header__top">
        <div class="container">
            <div class="header__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="icon-menu"></i><span>Shop by Department</span></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">
                            <li><a href="#.html">Hot Promotions</a>
                            </li>
                            <li class="menu-item-has-children has-mega-menu"><a href="#">Consumer Electronic</a><span class="sub-toggle"></span>
                                <div class="mega-menu">
                                    <div class="mega-menu__column">
                                        <h4>Electronic<span class="sub-toggle"></span></h4>
                                        <ul class="mega-menu__list">
                                            <li><a href="#.html">Home Audio &amp; Theathers</a>
                                            </li>
                                            <li><a href="#.html">TV &amp; Videos</a>
                                            </li>
                                            <li><a href="#.html">Camera, Photos &amp; Videos</a>
                                            </li>
                                            <li><a href="#.html">Cellphones &amp; Accessories</a>
                                            </li>
                                            <li><a href="#.html">Headphones</a>
                                            </li>
                                            <li><a href="#.html">Videosgames</a>
                                            </li>
                                            <li><a href="#.html">Wireless Speakers</a>
                                            </li>
                                            <li><a href="#.html">Office Electronic</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mega-menu__column">
                                        <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>
                                        <ul class="mega-menu__list">
                                            <li><a href="#.html">Digital Cables</a>
                                            </li>
                                            <li><a href="#.html">Audio &amp; Video Cables</a>
                                            </li>
                                            <li><a href="#.html">Batteries</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#.html">Clothing &amp; Apparel</a>
                            </li>
                            <li><a href="#.html">Home, Garden &amp; Kitchen</a>
                            </li>
                            <li><a href="#.html">Health &amp; Beauty</a>
                            </li>
                            <li><a href="#.html">Yewelry &amp; Watches</a>
                            </li>
                            <li class="menu-item-has-children has-mega-menu"><a href="#">Computer &amp; Technology</a><span class="sub-toggle"></span>
                                <div class="mega-menu">
                                    <div class="mega-menu__column">
                                        <h4>Computer &amp; Technologies<span class="sub-toggle"></span></h4>
                                        <ul class="mega-menu__list">
                                            <li><a href="#.html">Computer &amp; Tablets</a>
                                            </li>
                                            <li><a href="#.html">Laptop</a>
                                            </li>
                                            <li><a href="#.html">Monitors</a>
                                            </li>
                                            <li><a href="#.html">Networking</a>
                                            </li>
                                            <li><a href="#.html">Drive &amp; Storages</a>
                                            </li>
                                            <li><a href="#.html">Computer Components</a>
                                            </li>
                                            <li><a href="#.html">Security &amp; Protection</a>
                                            </li>
                                            <li><a href="#.html">Gaming Laptop</a>
                                            </li>
                                            <li><a href="#.html">Accessories</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#.html">Babies &amp; Moms</a>
                            </li>
                            <li><a href="#.html">Sport &amp; Outdoor</a>
                            </li>
                            <li><a href="#.html">Phones &amp; Accessories</a>
                            </li>
                            <li><a href="#.html">Books &amp; Office</a>
                            </li>
                            <li><a href="#.html">Cars &amp; Motocycles</a>
                            </li>
                            <li><a href="#.html">Home Improments</a>
                            </li>
                            <li><a href="#.html">Vouchers &amp; Services</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @php
                    $logo = get_setting('site_logo');
                @endphp
                <a class="ps-logo" href="{{ route('home') }}">
                    @if($logo != null)
                        <img src="{{ asset(get_setting('site_logo')->value ?? 'null') }}" alt="{{ env('APP_NAME') }}" width="110" height="33">
                    @else
                        <img src="{{ asset('upload/no_image.jpg') }}" alt="{{ env('APP_NAME') }}" style="height: 60px !important; width: 80px !important; min-width: 80px !important;">
                    @endif
                </a>
            </div>
            <div class="header__center">
                <form class="ps-form--quick-search" action="index.html" method="get">
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control">
                            <option value="1">All</option>
                            <option value="1">Bags</option>
                            <option value="1">Shoes</option>
                            <option value="1">Men</option>
                            <option value="1">Women</option>
                            <option value="1">Sunglasses</option>
                        </select>
                    </div>
                    <input class="form-control" type="text" placeholder="I'm shopping for...">
                    <button>Search</button>
                </form>
            </div>
            <div class="header__right">
                <div class="header__actions"><a class="header__extra" href="#"><i class="icon-chart-bars"></i><span><i>0</i></span></a><a class="header__extra" href="#"><i class="icon-heart"></i><span><i>0</i></span></a>
                    <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/7.jpg" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                    </div>
                                </div>
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/5.jpg" alt=""></a></div>
                                    <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                        <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-cart__footer">
                                <h3>Sub Total:<strong>$59.99</strong></h3>
                                <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"><i class="icon-user"></i></div>
                        <div class="ps-block__right"><a href="{{ route('login') }}">Login</a><a href="{{ route('register') }}">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container">
            <div class="navigation__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><i class="icon-menu"></i><span>Shop by Department</span></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">
                            @php
                                $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->Where('status',1)->get();
                            @endphp
                            @foreach($categories as $category)
                                <li class="menu-item-has-children has-mega-menu">
                                    <a href="#">
                                        @if(session()->get('language') == 'bangla') 
                                            {{ $category->category_name_bn }}
                                        @else 
                                            {{ $category->category_name_en }} 
                                        @endif
                                    </a>
                                    <span class="sub-toggle"></span>
                                    <div class="mega-menu">
                                        @php
                                            $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                        @endphp
                                        @foreach( $subcategories as $subcategory)
                                        <div class="mega-menu__column">
                                           <h4>
                                                <a href="#">
                                                    @if(session()->get('language') == 'bangla')
                                                        {{ $subcategory->subcategory_name_bn }}
                                                    @else
                                                        {{ $subcategory->subcategory_name_en }}
                                                    @endif
                                                    <span class="sub-toggle"></span>
                                                </a>
                                            </h4>
                                            @php
                                                $subsubcategories = App\Models\Subsubcategory::where('subcategory_id', $subcategory->id)->orderBy('sub_subcategory_name_en', 'ASC')->get();
                                            @endphp
                                            <ul class="mega-menu__list">
                                                @foreach( $subsubcategories as $subsubcategory)
                                                    <li>
                                                        <a href="#">
                                                            @if(session()->get('language') == 'bangla')
                                                                {{ $subsubcategory->sub_subcategory_name_bn }}
                                                            @else
                                                                {{ $subsubcategory->sub_subcategory_name_en }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navigation__right">
                <ul class="menu menu--organic">
                    @php
                        $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->Where('status',1)->get();
                    @endphp
                    <li class="menu-item-has-children">
                        <a href="{{ route('home') }}">Home</a><span class="sub-toggle"></span>   
                    </li>
                    @foreach($categories as $category)
                    <li class="menu-item-has-children has-mega-menu">
                        <a href="shop-default">
                            @if(session()->get('language') == 'bangla') 
                                {{ $category->category_name_bn }}
                            @else 
                                {{ $category->category_name_en }} 
                            @endif<span class="sub-toggle"></span>
                        </a>
                        <span class="sub-toggle"></span>
                        <div class="mega-menu">
                            @php
                                $subcategories = App\Models\Subcategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                            @endphp
                            @foreach( $subcategories as $subcategory)
                            <div class="mega-menu__column">
                                <h4>
                                <a href="#">
                                    @if(session()->get('language') == 'bangla')
                                        {{ $subcategory->subcategory_name_bn }}
                                    @else
                                        {{ $subcategory->subcategory_name_en }}
                                    @endif
                                    <span class="sub-toggle"></span>
                                </a>
                                </h4>
                                @php
                                    $subsubcategories = App\Models\Subsubcategory::where('subcategory_id', $subcategory->id)->orderBy('sub_subcategory_name_en', 'ASC')->get();
                                @endphp
                                <ul class="mega-menu__list">
                                    @foreach( $subsubcategories as $subsubcategory)
                                    <li>
                                        <a href="#">
                                            @if(session()->get('language') == 'bangla')
                                                {{ $subsubcategory->sub_subcategory_name_bn }}
                                            @else
                                                {{ $subsubcategory->sub_subcategory_name_en }}
                                            @endif
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </li>
                    @endforeach
                </ul>
                <ul class="navigation__extra">
                    <li><a href="#">Tract your order</a></li>
                    <li>
                       <div class="language">
                            @if(session()->get('language') == 'bangla')
                                <a  href="{{ route('english.language') }}">English</a>
                            @else
                                <a  href="{{ route('bangla.language') }}">বাংলা</a>
                            @endif
                        </div>
                    </li>
                </ul>
                <!-- <div class="ps-block--header-hotline inline">
                    <p><i class="icon-telephone"></i>Phone:<strong> {{ get_setting('phone')->value ?? 'null'}}</strong></p>
                </div> -->
            </div>
        </div>
    </nav>
</header>
<header class="header header--mobile organic" data-sticky="true">
    <div class="header__top">
        <div class="header__left">
            <p>Welcome to Martfury Online Shopping Store !</p>
        </div>
        <div class="header__right">
            <ul class="navigation__extra">
                <li><a href="#">Tract your order</a></li>
                <li>
                   <div class="language">
                        @if(session()->get('language') == 'bangla')
                            <a  href="{{ route('english.language') }}">English</a>
                        @else
                            <a  href="{{ route('bangla.language') }}">বাংলা</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="navigation--mobile">
        <div class="navigation__left">
            @php
                $logo = get_setting('site_logo');
            @endphp
            <a class="ps-logo" href="{{ route('home') }}">
                @if($logo != null)
                    <img src="{{ asset(get_setting('site_logo')->value ?? 'null') }}" alt="{{ env('APP_NAME') }}" width="110" height="33">
                @else
                    <img src="{{ asset('upload/no_image.jpg') }}" alt="{{ env('APP_NAME') }}" style="height: 60px !important; width: 80px !important; min-width: 80px !important;">
                @endif
            </a>
        </div>
        <div class="navigation__right">
            <div class="header__actions">
                <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
                    <div class="ps-cart__content">
                        <div class="ps-cart__items">
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/7.jpg" alt="" /></a></div>
                                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                                    <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                </div>
                            </div>
                            <div class="ps-product--cart-mobile">
                                <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/5.jpg" alt="" /></a></div>
                                <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                    <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                                </div>
                            </div>
                        </div>
                        <div class="ps-cart__footer">
                            <h3>Sub Total:<strong>$59.99</strong></h3>
                            <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                        </div>
                    </div>
                </div>
                <div class="ps-block--user-header">
                    <div class="ps-block__left"><a href="my-account.html"><i class="icon-user"></i></a></div>
                    <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-search--mobile">
        <form class="ps-form--search-mobile" action="index.html" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something..." />
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
</header>

<div id="back2top"><i class="icon icon-arrow-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
            <h3>Shopping Cart</h3>
        </div>
        <div class="navigation__content">
            <div class="ps-cart--mobile">
                <div class="ps-cart__content">
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail"><a href="#"><img src="img/products/clothing/7.jpg" alt=""></a></div>
                        <div class="ps-product__content"><a class="ps-product__remove" href="#"><i class="icon-cross"></i></a><a href="product-default.html">MVMTH Classical Leather Watch In Black</a>
                            <p><strong>Sold by:</strong> YOUNG SHOP</p><small>1 x $59.99</small>
                        </div>
                    </div>
                </div>
                <div class="ps-cart__footer">
                    <h3>Sub Total:<strong>$59.99</strong></h3>
                    <figure><a class="ps-btn" href="shopping-cart.html">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
                </div>
            </div>
        </div>
    </div>
    <!--include ../../data/menu/menu-product-categories-->
    <div class="ps-panel--sidebar" id="navigation-mobile">
        <div class="ps-panel__header">
            <h3>Categories</h3>
        </div>
        <div class="ps-panel__content">
            <div class="menu--product-categories">
                <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                <div class="menu__content">
                    <ul class="menu--mobile">
                        <li><a href="#.html">Hot Promotions</a>
                        </li>
                        <li class="menu-item-has-children has-mega-menu"><a href="#">Consumer Electronic</a><span class="sub-toggle"></span>
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <h4>Electronic<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="#.html">Home Audio &amp; Theathers</a>
                                        </li>
                                        <li><a href="#.html">TV &amp; Videos</a>
                                        </li>
                                        <li><a href="#.html">Camera, Photos &amp; Videos</a>
                                        </li>
                                        <li><a href="#.html">Cellphones &amp; Accessories</a>
                                        </li>
                                        <li><a href="#.html">Headphones</a>
                                        </li>
                                        <li><a href="#.html">Videosgames</a>
                                        </li>
                                        <li><a href="#.html">Wireless Speakers</a>
                                        </li>
                                        <li><a href="#.html">Office Electronic</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mega-menu__column">
                                    <h4>Accessories &amp; Parts<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="#.html">Digital Cables</a>
                                        </li>
                                        <li><a href="#.html">Audio &amp; Video Cables</a>
                                        </li>
                                        <li><a href="#.html">Batteries</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="#.html">Clothing &amp; Apparel</a>
                        </li>
                        <li><a href="#.html">Home, Garden &amp; Kitchen</a>
                        </li>
                        <li><a href="#.html">Health &amp; Beauty</a>
                        </li>
                        <li><a href="#.html">Yewelry &amp; Watches</a>
                        </li>
                        <li class="menu-item-has-children has-mega-menu"><a href="#">Computer &amp; Technology</a><span class="sub-toggle"></span>
                            <div class="mega-menu">
                                <div class="mega-menu__column">
                                    <h4>Computer &amp; Technologies<span class="sub-toggle"></span></h4>
                                    <ul class="mega-menu__list">
                                        <li><a href="#.html">Computer &amp; Tablets</a>
                                        </li>
                                        <li><a href="#.html">Laptop</a>
                                        </li>
                                        <li><a href="#.html">Monitors</a>
                                        </li>
                                        <li><a href="#.html">Networking</a>
                                        </li>
                                        <li><a href="#.html">Drive &amp; Storages</a>
                                        </li>
                                        <li><a href="#.html">Computer Components</a>
                                        </li>
                                        <li><a href="#.html">Security &amp; Protection</a>
                                        </li>
                                        <li><a href="#.html">Gaming Laptop</a>
                                        </li>
                                        <li><a href="#.html">Accessories</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a href="#.html">Babies &amp; Moms</a>
                        </li>
                        <li><a href="#.html">Sport &amp; Outdoor</a>
                        </li>
                        <li><a href="#.html">Phones &amp; Accessories</a>
                        </li>
                        <li><a href="#.html">Books &amp; Office</a>
                        </li>
                        <li><a href="#.html">Cars &amp; Motocycles</a>
                        </li>
                        <li><a href="#.html">Home Improments</a>
                        </li>
                        <li><a href="#.html">Vouchers &amp; Services</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--+createMenu(product_categories, 'menu--mobile')-->
        </div>
    </div>
    <div class="navigation--list">
        <div class="navigation__content"><a class="navigation__item ps-toggle--sidebar" href="#menu-mobile"><i class="icon-menu"></i><span> Menu</span></a><a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-list4"></i><span> Categories</span></a><a class="navigation__item ps-toggle--sidebar" href="#search-sidebar"><i class="icon-magnifier"></i><span> Search</span></a><a class="navigation__item ps-toggle--sidebar" href="#cart-mobile"><i class="icon-bag2"></i><span> Cart</span></a></div>
    </div>
    <div class="ps-panel--sidebar" id="search-sidebar">
        <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="index.html" method="get">
                <div class="form-group--nest">
                    <input class="form-control" type="text" placeholder="Search something...">
                    <button><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
        <div class="navigation__content"></div>
    </div>
    <div class="ps-panel--sidebar" id="menu-mobile">
        <div class="ps-panel__header">
            <h3>Menu</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                <li class="menu-item-has-children"><a href="index">Home</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="index.html">Marketplace Full Width</a>
                        </li>
                        <li><a href="home-autopart.html">Home Auto Parts</a>
                        </li>
                        <li><a href="home-technology.html">Home Technology</a>
                        </li>
                        <li><a href="home-organic.html">Home Organic</a>
                        </li>
                        <li><a href="home-marketplace.html">Home Marketplace V1</a>
                        </li>
                        <li><a href="home-marketplace-2.html">Home Marketplace V2</a>
                        </li>
                        <li><a href="home-marketplace-3.html">Home Marketplace V3</a>
                        </li>
                        <li><a href="home-marketplace-4.html">Home Marketplace V4</a>
                        </li>
                        <li><a href="home-electronic.html">Home Electronic</a>
                        </li>
                        <li><a href="home-furniture.html">Home Furniture</a>
                        </li>
                        <li><a href="home-kid.html">Home Kids</a>
                        </li>
                        <li><a href="homepage-photo-and-video.html">Home photo and picture</a>
                        </li>
                        <li><a href="home-medical.html">Home Medical</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="shop-default">Shop</a><span class="sub-toggle"></span>
                    <div class="mega-menu">
                        <div class="mega-menu__column">
                            <h4>Catalog Pages<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="shop-default.html">Shop Default</a>
                                </li>
                                <li><a href="shop-default.html">Shop Fullwidth</a>
                                </li>
                                <li><a href="shop-categories.html">Shop Categories</a>
                                </li>
                                <li><a href="shop-sidebar.html">Shop Sidebar</a>
                                </li>
                                <li><a href="shop-sidebar-without-banner.html">Shop Without Banner</a>
                                </li>
                                <li><a href="shop-carousel.html">Shop Carousel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Product Layout<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="product-default.html">Default</a>
                                </li>
                                <li><a href="product-extend.html">Extended</a>
                                </li>
                                <li><a href="product-full-content.html">Full Content</a>
                                </li>
                                <li><a href="product-box.html">Boxed</a>
                                </li>
                                <li><a href="product-sidebar.html">Sidebar</a>
                                </li>
                                <li><a href="product-default.html">Fullwidth</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Product Types<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="product-default.html">Simple</a>
                                </li>
                                <li><a href="product-default.html">Color Swatches</a>
                                </li>
                                <li><a href="product-image-swatches.html">Images Swatches</a>
                                </li>
                                <li><a href="product-countdown.html">Countdown</a>
                                </li>
                                <li><a href="product-multi-vendor.html">Multi-Vendor</a>
                                </li>
                                <li><a href="product-instagram.html">Instagram</a>
                                </li>
                                <li><a href="product-affiliate.html">Affiliate</a>
                                </li>
                                <li><a href="product-on-sale.html">On sale</a>
                                </li>
                                <li><a href="product-video.html">Video Featured</a>
                                </li>
                                <li><a href="product-groupped.html">Grouped</a>
                                </li>
                                <li><a href="product-out-stock.html">Out Of Stock</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Woo Pages<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="shopping-cart.html">Shopping Cart</a>
                                </li>
                                <li><a href="checkout.html">Checkout</a>
                                </li>
                                <li><a href="whishlist.html">Whishlist</a>
                                </li>
                                <li><a href="compare.html">Compare</a>
                                </li>
                                <li><a href="order-tracking.html">Order Tracking</a>
                                </li>
                                <li><a href="my-account.html">My Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="">Pages</a><span class="sub-toggle"></span>
                    <div class="mega-menu">
                        <div class="mega-menu__column">
                            @foreach(get_pages_nav_header() as $page)
                            <ul class="mega-menu__list">
                                <li>
                                    <a href="#">{{ $page->name_en }}</a>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="menu-item-has-children has-mega-menu"><a href="">Blogs</a><span class="sub-toggle"></span>
                    <div class="mega-menu">
                        <div class="mega-menu__column">
                            <h4>Blog Layout<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="blog-grid.html">Grid</a>
                                </li>
                                <li><a href="blog-list.html">Listing</a>
                                </li>
                                <li><a href="blog-small-thumb.html">Small Thumb</a>
                                </li>
                                <li><a href="blog-left-sidebar.html">Left Sidebar</a>
                                </li>
                                <li><a href="blog-right-sidebar.html">Right Sidebar</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Single Blog<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="blog-detail.html">Single 1</a>
                                </li>
                                <li><a href="blog-detail-2.html">Single 2</a>
                                </li>
                                <li><a href="blog-detail-3.html">Single 3</a>
                                </li>
                                <li><a href="blog-detail-4.html">Single 4</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"><span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
                <article class="ps-product--detail ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="false">
                            <div class="ps-product__images" data-arrow="true">
                                <div class="item"><img src="img/products/detail/fullwidth/1.jpg" alt=""></div>
                                <div class="item"><img src="img/products/detail/fullwidth/2.jpg" alt=""></div>
                                <div class="item"><img src="img/products/detail/fullwidth/3.jpg" alt=""></div>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                            <div class="ps-product__meta">
                                <p>Brand:<a href="shop-default.html">Sony</a></p>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>(1 review)</span>
                                </div>
                            </div>
                            <h4 class="ps-product__price">$36.78 – $56.99</h4>
                            <div class="ps-product__desc">
                                <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                                <ul class="ps-list--dot">
                                    <li> Unrestrained and portable active stereo speaker</li>
                                    <li> Free from the confines of wires and chords</li>
                                    <li> 20 hours of portable capabilities</li>
                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                </ul>
                            </div>
                            <div class="ps-product__shopping"><a class="ps-btn ps-btn--black" href="#">Add to cart</a><a class="ps-btn" href="#">Buy Now</a>
                                <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>