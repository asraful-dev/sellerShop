@php
    $route = Route::current()->getName();
    $prefix = Request::route()->getPrefix();
@endphp
<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png ') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin Login</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @if (Auth::user()->can('dashboard.menu'))
            <li>
                <a href="{{ route('admin.dashobard') }}" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
        @endif
        @if (Auth::user()->can('slider.menu'))
            <li
                class="
	{{ $route == 'slider.edit' ? 'mm-active' : '' }}
	{{ $route == 'slider.view' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-bookmark-heart"></i>
                    </div>
                    <div class="menu-title">Slider</div>
                </a>
                <ul>
                    <li> <a href="{{ route('slider.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage Slider</a>
                    </li>
                    <li> <a href="{{ route('slider.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('slider.menu'))
            <li
                class="
	{{ $route == 'hot_deals_slider.edit' ? 'mm-active' : '' }}
	{{ $route == 'hot_deals_slider.view' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-bookmark-heart"></i>
                    </div>
                    <div class="menu-title">Hot Deals Slider</div>
                </a>
                <ul>
                    <li> <a href="{{ route('hot_deals_slider.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage Slider</a>
                    </li>
                    <li> <a href="{{ route('hot_deals_slider.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Slider</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('product.menu'))
            <li
                class="

		{{ $route == 'product.edit' ? 'mm-active' : '' }}
		{{ $route == 'product.view' ? 'mm-active' : '' }}
		{{ $route == 'product.import' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-cart"></i>
                    </div>
                    <div class="menu-title">Products</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('product.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage Product</a>
                    </li>
                    <li>
                        <a href="{{ route('product.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('sale.order.menu'))
            <li
                class="

		{{ $route == 'order.index' ? 'mm-active' : '' }}
		{{ $route == 'order.show' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-delivery"></i>
                    </div>
                    <div class="menu-title">Sales</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('order.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            All Orders
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('sale.order.menu'))
            <li
                class="

		{{ $route == 'order.index' ? 'mm-active' : '' }}
		{{ $route == 'order.show' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-delivery"></i>
                    </div>
                    <div class="menu-title">ROI</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.quiz.create') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            Create ROI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.quiz.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            Report ROI
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('sale.order.menu'))
            <li
                class="

		{{ $route == 'order.index' ? 'mm-active' : '' }}
		{{ $route == 'order.show' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-delivery"></i>
                    </div>
                    <div class="menu-title">Product ROI</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.product_roi.create') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            Create ROI
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.product_roi.index') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            Report ROI
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('report.menu'))
            <li
                class="

		{{ $route == 'report.view' ? 'mm-active' : '' }}
		{{ $route == 'search-by-date' ? 'mm-active' : '' }}
		{{ $route == 'search-by-month' ? 'mm-active' : '' }}
		{{ $route == 'search-by-year' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-delivery"></i>
                    </div>
                    <div class="menu-title">Manage Reports</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('report.view') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            Report View
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('stock.menu'))
            <li class="
		{{ $route == 'product.stock' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-cart"></i>
                    </div>
                    <div class="menu-title">Stock Manage</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('product.stock') }}"><i class="bx bx-right-arrow-alt"></i>Product Stock</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('return_order.menu'))
            <li
                class="

		{{ $route == 'return.request' ? 'mm-active' : '' }}
		{{ $route == 'order.show' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-delivery"></i>
                    </div>
                    <div class="menu-title">Return Order</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('return.request') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            All Return Order
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('complete.return.request') }}">
                            <i class="bx bx-right-arrow-alt"></i>
                            Completed Return Order
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('review.menu'))
            <li
                class="

		{{ $route == 'pending.review' ? 'mm-active' : '' }}
		{{ $route == 'blog.view' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-react"></i>
                    </div>
                    <div class="menu-title">Review</div>
                </a>
                <ul>
                    <li> <a href="{{ route('pending.review') }}"><i class="bx bx-right-arrow-alt"></i>Pending
                            Review</a>
                    </li>
                    <li> <a href="{{ route('publish.review') }}"><i class="bx bx-right-arrow-alt"></i>Publish
                            Review</a>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('subscribe.menu'))
            <li class="

		{{ $route == 'subscribe.index' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="menu-title">Subscribe</div>
                </a>
                <ul>
                    <li> <a href="{{ route('subscribe.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Subscribe</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('brand.menu'))
            <li
                class="

		{{ $route == 'brand.edit' ? 'mm-active' : '' }}
		{{ $route == 'brand.view' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-coffee-cup"></i>
                    </div>
                    <div class="menu-title">Brand</div>
                </a>
                <ul>
                    <li> <a href="{{ route('brand.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage Brand</a>
                    </li>
                    <li> <a href="{{ route('brand.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('category.menu'))
            <li
                class="

	{{ $route == 'category.edit' ? 'mm-active' : '' }}
    {{ $route == 'category.view' ? 'mm-active' : '' }}
    {{ $route == 'subcategory.edit' ? 'mm-active' : '' }}
    {{ $route == 'subcategory.view' ? 'mm-active' : '' }}
    {{ $route == 'subsubcategory.edit' ? 'mm-active' : '' }}
    {{ $route == 'subsubcategory.view' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-codepen"></i>
                    </div>
                    <div class="menu-title">Category</div>
                </a>
                <ul>
                    <li><a href="{{ route('category.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Category</a>
                    </li>
                    <li><a href="{{ route('category.create') }}"><i class="bx bx-right-arrow-alt"></i>Add
                            Category</a>
                    <li><a href="{{ route('subcategory.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            SubCategory</a>
                    <li> <a href="{{ route('subcategory.create') }}"><i class="bx bx-right-arrow-alt"></i>Add
                            SubCategory</a>
                    <li> <a href="{{ route('subsubcategory.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            SubSubCategory</a>
                    <li> <a href="{{ route('subsubcategory.create') }}"><i class="bx bx-right-arrow-alt"></i>Add
                            SubSubCategory</a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="
	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-control-panel"></i>
                </div>
                <div class="menu-title">Commission</div>
            </a>
            <ul>
                <li> <a href="{{ route('commission.index') }}"><i class="bx bx-right-arrow-alt"></i>Commission
                        List</a>
                </li>
            </ul>
        </li>

        <li class="

	{{ $route == 'package.edit' ? 'mm-active' : '' }}

	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-css3"></i>
                </div>
                <div class="menu-title">Package</div>
            </a>
            <ul>
                <li> <a href="{{ route('package.list') }}"><i class="bx bx-right-arrow-alt"></i>Package List</a>
                </li>
                <li> <a href="{{ route('package.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Package</a>
            </ul>
        </li>

        <li
            class="
	{{ $route == 'admin.cashout.accept.list' ? 'mm-active' : '' }}
	{{ $route == 'admin.cashout.reject.list' ? 'mm-active' : '' }}
	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-diamond-alt"></i>
                </div>
                <div class="menu-title">Cash Out</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.cashout.report') }}"><i class="bx bx-right-arrow-alt"></i>Cashout
                        Report</a>
                </li>
                <li> <a href="{{ route('admin.cashout.accept.list') }}"><i class="bx bx-right-arrow-alt"></i>Accept
                        List</a>
                </li>
                <li> <a href="{{ route('admin.cashout.reject.list') }}"><i class="bx bx-right-arrow-alt"></i>Reject
                        List</a>
                </li>
            </ul>
        </li>

        <li
            class="
	{{ $route == 'admin.product.cashout.accept.list' ? 'mm-active' : '' }}
	{{ $route == 'admin.product.cashout.reject.list' ? 'mm-active' : '' }}
	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-diamond-alt"></i>
                </div>
                <div class="menu-title">Refund Withdraw</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.product.cashout.report') }}"><i
                            class="bx bx-right-arrow-alt"></i>Product Cashout Report</a>
                </li>
                <li> <a href="{{ route('admin.product.cashout.accept.list') }}"><i
                            class="bx bx-right-arrow-alt"></i>Accept List</a>
                </li>
                <li> <a href="{{ route('admin.product.cashout.reject.list') }}"><i
                            class="bx bx-right-arrow-alt"></i>Reject List</a>
                </li>
            </ul>
        </li>

        <li
            class="
	{{ $route == 'admin.all.approved.request' ? 'mm-active' : '' }}
	{{ $route == 'admin.all.rejected.request' ? 'mm-active' : '' }}
	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-coin"></i>
                </div>
                <div class="menu-title">Balance Request</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.balance.request') }}"><i class="bx bx-right-arrow-alt"></i>Balance
                        Request List</a>
                </li>
                <li> <a href="{{ route('admin.all.approved.request') }}"><i
                            class="bx bx-right-arrow-alt"></i>Approved Request</a>
                </li>
                <li> <a href="{{ route('admin.all.rejected.request') }}"><i
                            class="bx bx-right-arrow-alt"></i>Rejected Request</a>
                </li>
            </ul>
        </li>

        <li
            class="
	{{ $route == 'admin.deposite.approved.request' ? 'mm-active' : '' }}
	{{ $route == 'admin.deposite.rejected.request' ? 'mm-active' : '' }}
	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-coin"></i>
                </div>
                <div class="menu-title">Deposite Product Stock Request</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.deposite.request') }}"><i class="bx bx-right-arrow-alt"></i>Deposite
                        Request List</a>
                </li>
                <li> <a href="{{ route('admin.all.deposite.approved.request') }}"><i
                            class="bx bx-right-arrow-alt"></i>Deposite Approved Request</a>
                </li>
                <li> <a href="{{ route('admin.all.deposite.rejected.request') }}"><i
                            class="bx bx-right-arrow-alt"></i>Deposite Rejected Request</a>
                </li>
                <li> <a href="{{ route('admin.deposite.commission.create') }}"><i
                            class="bx bx-right-arrow-alt"></i>Deposite Commission</a>
                </li>
            </ul>
        </li>
        <li class="
        ">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-diamond"></i>
                </div>
                <div class="menu-title">Rank</div>
            </a>
            <ul>
                <li><a href="{{ route('admin.rank.create') }}"><i class="bx bx-right-arrow-alt"></i>Rank List</a>
                </li>
                 <li><a href="{{ route('admin.smart.create') }}"><i class="bx bx-right-arrow-alt"></i>Smart
                        Commission
                    </a>
                </li>
                <li><a href="{{ route('admin.ambassador.create') }}"><i class="bx bx-right-arrow-alt"></i>Ambassador
                        Commission
                    </a>
                </li>
                <li><a href="{{ route('admin.brand.create') }}"><i class="bx bx-right-arrow-alt"></i>Brand
                        Commission</a>
                </li>
                <li><a href="{{ route('admin.crown.create') }}"><i class="bx bx-right-arrow-alt"></i>Crown
                        Commission</a>
                </li>
                <li><a href="{{ route('admin.executive.create') }}"><i class="bx bx-right-arrow-alt"></i>Executive
                        Commission</a>
                </li>
            </ul>
        </li>

        <li class="
	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-diamond"></i>
                </div>
                <div class="menu-title">Wallet</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.wallet.index') }}"><i class="bx bx-right-arrow-alt"></i>Wallet
                        Update</a>
                </li>
            </ul>
        </li>




        <li class="
	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-train-alt"></i>
                </div>
                <div class="menu-title">Reffrel</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.refferel.index') }}"><i class="bx bx-right-arrow-alt"></i>Reffrel
                        List</a>
                </li>
            </ul>
        </li>

        <li class="
	">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="lni lni-shopping-basket"></i>
                </div>
                <div class="menu-title">Generation</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.generation.index') }}"><i class="bx bx-right-arrow-alt"></i>Generation
                        List</a>
                </li>
            </ul>
        </li>

        @if (Auth::user()->can('pages.menu'))
            <li
                class="

	{{ $route == 'pages.edit' ? 'mm-active' : '' }}
	{{ $route == 'pages.view' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-react"></i>
                    </div>
                    <div class="menu-title">Pages</div>
                </a>
                <ul>
                    <li> <a href="{{ route('pages.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage Pages</a>
                    </li>
                    <li> <a href="{{ route('pages.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Padges</a>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('setting.menu'))
            <li
                class="
		{{ $route == 'setting.index' ? 'mm-active' : '' }}
		{{ $route == 'admin.user.index' ? 'mm-active' : '' }}
		{{ $route == 'admin.user.create' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-cog"></i>
                    </div>
                    <div class="menu-title">Advance Setting</div>
                </a>
                <ul>
                    <li> <a href="{{ route('setting.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Setting</a>
                    </li>
                    <li> <a href="{{ route('color.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage Color</a>
                    </li>
                    <li> <a href="{{ route('admin.user.create') }}"><i class="bx bx-right-arrow-alt"></i>User
                            Create</a>
                    <li> <a href="{{ route('admin.user.index') }}"><i class="bx bx-right-arrow-alt"></i>User List</a>
                    <li> <a href="{{ route('admin.user.active.index') }}"><i class="bx bx-right-arrow-alt"></i>Active
                            User List</a>
                    <li> <a href="/chatify"><i class="bx bx-right-arrow-alt"></i>Chat Application</a>
                    <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Payment Methods</a>
                    <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Manage Seo</a>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('blog.menu'))
            <li
                class="

		{{ $route == 'blog.edit' ? 'mm-active' : '' }}
		{{ $route == 'blog.view' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-cake"></i>
                    </div>
                    <div class="menu-title">Blog</div>
                </a>
                <ul>
                    <li> <a href="{{ route('blog.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage Blog</a>
                    </li>
                    <li> <a href="{{ route('blog.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Blog</a>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('banner.menu'))
            <li
                class="

		{{ $route == 'banner.edit' ? 'mm-active' : '' }}
		{{ $route == 'banner.view' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-tshirt"></i>
                    </div>
                    <div class="menu-title">Baner</div>
                </a>
                <ul>
                    <li> <a href="{{ route('banner.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage Baner</a>
                    </li>
                    <li> <a href="{{ route('banner.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Baner</a>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('checkoutnotice.menu'))
            <li
                class="

		{{ $route == 'checkoutnotice.edit' ? 'mm-active' : '' }}
		{{ $route == 'checkoutnotice.create' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fa-solid fa-bell"></i>
                    </div>
                    <div class="menu-title">Checkout Notice</div>
                </a>
                <ul>
                    <li> <a href="{{ route('checkoutnotice.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Notice</a>
                    </li>
                    <li> <a href="{{ route('checkoutnotice.create') }}"><i class="bx bx-right-arrow-alt"></i>Add
                            Checkout Notice</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('checkout.setting.menu'))
            <li
                class="

	{{ $route == 'checkout.setting.edit' ? 'mm-active' : '' }}
	{{ $route == 'checkout.setting.create' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="menu-title">Checkout Settings</div>
                </a>
                <ul>
                    <li> <a href="{{ route('checkout.setting.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Checkout Settings</a>
                    </li>
                    <li> <a href="{{ route('checkout.setting.create') }}"><i class="bx bx-right-arrow-alt"></i>Add
                            Checkout Settings</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('country.menu'))
            <li
                class="
		{{ $route == 'admin.division.view' ? 'mm-active' : '' }}
		{{ $route == 'admin.district.view' ? 'mm-active' : '' }}
		{{ $route == 'admin.subdistrict.view' ? 'mm-active' : '' }}
		{{ $route == 'admin.union.view' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fa-solid fa-globe"></i>
                    </div>
                    <div class="menu-title">Country Information</div>
                </a>
                <ul>
                    <li> <a href="{{ route('admin.division.view') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Division</a>
                    </li>
                    <li> <a href="{{ route('admin.district.view') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            District</a>
                    </li>
                    <li> <a href="{{ route('admin.subdistrict.view') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Upazilla</a>
                    </li>
                    <li> <a href="{{ route('admin.union.view') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Union</a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="
    	{{ $route == 'create.agent' ? 'mm-active' : '' }}
    ">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="fas fa-user"></i>
                </div>
                <div class="menu-title">Agents </div>
            </a>
            <ul>
                <li> <a href="{{ route('create.agent') }}"><i class="bx bx-right-arrow-alt"></i>Add Agent</a>
                </li>
                <li> <a href="{{ route('all.agent') }}"><i class="bx bx-right-arrow-alt"></i>Manage Agent</a>
                </li>
                <li> <a href="{{ route('all.agent.orders') }}"><i class="bx bx-right-arrow-alt"></i>Agent Orders</a>
                </li>
                <li> <a href="{{ route('division.agent') }}"><i class="bx bx-right-arrow-alt"></i>Division Agent</a>
                </li>
                <li> <a href="{{ route('district.agent') }}"><i class="bx bx-right-arrow-alt"></i>District Agent</a>
                </li>
                <li> <a href="{{ route('upazilla.agent') }}"><i class="bx bx-right-arrow-alt"></i>Upazilla Agent</a>
                </li>
            </ul>
        </li>

        <li
            class="
{{ $route == 'management.edit' ? 'mm-active' : '' }}
{{ $route == 'management.view' ? 'mm-active' : '' }}
">
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-bookmark-heart"></i>
                </div>
                <div class="menu-title">Management</div>
            </a>
            <ul>
                <li> <a href="{{ route('management.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                        Management</a>
                </li>
                <li> <a href="{{ route('management.create') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        Management</a>
                </li>
            </ul>
        </li>

        @if (Auth::user()->can('permission.menu'))
            <li
                class="
		{{ $route == 'all.permission' ? 'mm-active' : '' }}
		{{ $route == 'add.permission' ? 'mm-active' : '' }}
		{{ $route == 'add.roles' ? 'mm-active' : '' }}
		{{ $route == 'all.roles' ? 'mm-active' : '' }}
		{{ $route == 'add.roles.permission' ? 'mm-active' : '' }}
		{{ $route == 'all.roles.permission' ? 'mm-active' : '' }}
	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fa-solid fa-address-card"></i>
                    </div>
                    <div class="menu-title">Roles And Permission </div>
                </a>
                <ul>
                    <li> <a href="{{ route('all.permission') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Permission</a>
                    </li>
                    <li> <a href="{{ route('all.roles') }}"><i class="bx bx-right-arrow-alt"></i>Manage Roles</a>
                    </li>
                    <li> <a href="{{ route('add.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>Add
                            Roles in Permission</a>
                    </li>
                    <li> <a href="{{ route('all.roles.permission') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Roles in Permission</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('setting_admin.staff'))
            <li class="">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="fas fa-user"></i>
                    </div>
                    <div class="menu-title">Setting Admin Staff </div>
                </a>
                <ul>
                    <li> <a href="{{ route('add.admin') }}"><i class="bx bx-right-arrow-alt"></i>Add Staff</a>
                    </li>
                    <li> <a href="{{ route('all.admin') }}"><i class="bx bx-right-arrow-alt"></i>Manage Staff</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->can('coupon.menu'))
            <li
                class="

		{{ $route == 'coupon.edit' ? 'mm-active' : '' }}
		{{ $route == 'coupon.view' ? 'mm-active' : '' }}

	">
                <a href="#" class="has-arrow">
                    <div class="parent-icon"><i class="lni lni-drupal-original"></i>
                    </div>
                    <div class="menu-title">Coupon</div>
                </a>
                <ul>
                    <li> <a href="{{ route('coupon.index') }}"><i class="bx bx-right-arrow-alt"></i>Manage
                            Coupon</a>
                    </li>
                    <li> <a href="{{ route('coupon.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
                </ul>
            </li>
        @endif
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
