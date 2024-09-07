@php
    $colorsetting = App\Models\Color::find(1);
@endphp
<!-- header -->
<header class="main-header" style="background-color:{{ $colorsetting->primary_color ?? 'null' }}">
    <!-- nav -->
    <nav class="main-navbar navbar navbar-expand-lg navbar-light shadow-2">
        <div class="lnav-box d-flex">
            @php
                $id = Auth::guard('web')->user()->id;
                $adminData = App\Models\User::where('role', 'user')->find($id);
            @endphp
            <div class="logo-wrapper px-3 d-none d-md-flex">
                <img src="{{ !empty($adminData->profile_photo) ? url('public/upload/user_images/' . $adminData->profile_photo) : url('public/upload/user1.png') }}"
                    height="60px" width="50px;" alt="Logo">
            </div>
            <div class="sidebar-toggler-wrapper ml-auto">
                <button class="p-collapsing-sidebar-toggler sidebar-toggler-secondary transition rounded-circle"
                    data-collapsing="partially" data-collapsing-target="#adminNav" type="button">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div class="d-none d-lg-block ml-0 mr-auto pl-4">
            <ul class="nav navbar-nav flex-row">

            </ul>
        </div>
        <div class="d-lg-block ml-0 mr-auto pl-2">
            <ul class="nav navbar-nav flex-row">
                <li class="notf-item nav-item p-static p-md-relative dropdown">
                    <span class="fw-400">
                        <a target="_blank" class="mx-1 btn btn-round btn-danger" href="{{ route('home') }}">
                            <i class="far fa-folder mr-1"></i>
                            <span class="">Order</span></a>
                    </span>
                    <style>
                        @media only screen and (max-width: 600px) {
                            .order_click {
                                display: none;
                            }
                        }
                    </style>
                    <span class="fw-400 order_click">
                        <a target="_blank" class="mx-1 btn btn-round btn-primary" href="{{ route('home') }}">
                            <i class="far fa-folder mr-1"></i>
                            <span class="">আরও অর্ডার করতে এখানে ক্লিক করুন</span></a>
                    </span>
                </li>
            </ul>
        </div>
        <div class="pr-6">
            <ul class="nav sec-nav navbar-nav flex-row">
                <!-- <li class="nav-item dropdown">
              <a class="nav-link text-capitalize d-none d-md-inline-flex align-items-center h-100 small-2" href="#" id="dropdownLang_02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-lang mr-3" src="{{ asset('frontend/index_files/usa.svg ') }}" alt="USA">
                <div class="lh-1 fw-400">
                  English
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow-1 py-3 position-absolute mt-1" aria-labelledby="dropdownAdmin">
                <a class="dropdown-item d-flex align-items-center py-1" href="#">
                  <img class="img-lang mr-3" src="{{ asset('frontend/index_files/usa.svg ') }}" alt="USA">
                  English
                </a>
                <a class="dropdown-item d-flex align-items-center py-1" href="#">
                  <img class="img-lang mr-3" src="{{ asset('frontend/index_files/ger.svg ') }}" alt="GR">
                  German
                </a>
                <a class="dropdown-item d-flex align-items-center py-1" href="#">
                  <img class="img-lang mr-3" src="{{ asset('frontend/index_files/fr.svg ') }}" alt="FR">
                  France
                </a>
                <a class="dropdown-item d-flex align-items-center py-1" href="#">
                  <img class="img-lang mr-3" src="{{ asset('frontend/index_files/cn.svg ') }}" alt="CN">
                  Chinese
                </a>
              </div>
            </li> -->
                <!--  <li class="nav-item">
              <a href="#" data-toggle="offcanvas" data-target="#offcanvas-search" class="nav-link lead-2 pl-2 pl-md-3"><span><i class="fa fa-search"></i></span></a>
            </li> -->
                <li class="notf-item nav-item p-static p-md-relative dropdown">
                    <a class="notf-link nav-link d-inline-flex align-items-center h-100 small-1 pl-2 pl-md-3"
                        href="#" id="dropdownAdmin" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="p-relative d-inline-flex">
                            <span><i class="fa fa-bell"></i></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-sm-center dropdown-menu-right dropdown-menu-wh shadow-1 bc-t position-absolute mt-1"
                        aria-labelledby="dropdownAdmin">
                        <div class="dropdown-inner rounded-2">
                            <div class="warning-gradient px-4 py-3 text-center">
                                @php
                                    $BalanceRequest = App\Models\BalanceRequest::where('user_id', Auth::user()->id)->count();
                                    $BalanceRequestDatas = App\Models\BalanceRequest::where('user_id', Auth::user()->id)->get();
                                @endphp
                                <h5 class="mb-0"> Notifications {{ $BalanceRequest }}</h5>
                            </div>
                            <div class="pl-4 pr-3 py-5">
                                <div class="dropdown-scrollbar" data-scrollbar="dropdown" tabindex="2"
                                    style="overflow: hidden; outline: none;">
                                    <ul class="list-unstyled">
                                        @foreach ($BalanceRequestDatas as $BalanceRequestData)
                                            @if ($BalanceRequestData->approved_by == 'Admin')
                                                <li class="pb-4">
                                                    <div class="d-flex align-items-center text-white">
                                                        <div class="text-warning lead-2"><i class="fas fa-envelope"></i>
                                                        </div>
                                                        <div class="px-4">
                                                            <span
                                                                class="norM_wids text-warning lead-1 lh-2 fw-600 d-block">New
                                                                Message</span>
                                                            <span class="norM_wids">Admin Accept your
                                                                {{ $BalanceRequestData->wallet_address }}
                                                                Request</span>
                                                        </div>
                                                        <div class="text-nowrap ml-auto pr-4">
                                                            {{ $BalanceRequestData->created_at->diffForHumans() }}
                                                        </div>
                                                        <img style="height: 50px;width: 50px;display: inline;margin-left: 5px;"
                                                            src="{{ asset('upload/screenshot') }}/{{ $BalanceRequestData->screenshot }}"
                                                            alt="TRX ID">
                                                    </div>
                                                </li>
                                            @elseif($BalanceRequestData->rejected_by == 'Admin')
                                                <li class="pb-4">
                                                    <div class="d-flex align-items-center text-white">
                                                        <div class="text-warning lead-2"><i
                                                                class="fas fa-envelope"></i></div>
                                                        <div class="px-4">
                                                            <span
                                                                class="norM_wids text-warning lead-1 lh-2 fw-600 d-block">New
                                                                Message</span>
                                                            <span class="norM_wids">Admin Reject your
                                                                {{ $BalanceRequestData->wallet_address }}
                                                                Request</span>
                                                        </div>
                                                        <div class="text-nowrap ml-auto pr-4">
                                                            {{ $BalanceRequestData->created_at->diffForHumans() }}
                                                        </div>
                                                        <img style="height: 50px;width: 50px;display: inline;margin-left: 5px;"
                                                            src="{{ asset('upload/screenshot') }}/{{ $BalanceRequestData->screenshot }}"
                                                            alt="TRX ID">
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="dropdown-load-more text-center px-4 py-2">
                                <a href="{{ route('user.notification') }}"><span
                                        class="far fa-comment-alt mr-1"></span> load more</a>
                            </div>
                        </div>
                        <div id="ascrail2001" class="nicescroll-rails nicescroll-rails-vr"
                            style="width: 6px; z-index: 11; cursor: default; position: absolute; top: 0px; left: -6px; height: 0px; display: none;">
                            <div class="nicescroll-cursors"
                                style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgba(255, 255, 255, 0.7); border: 0px; background-clip: padding-box; border-radius: 5px;">
                            </div>
                        </div>
                        <div id="ascrail2001-hr" class="nicescroll-rails nicescroll-rails-hr"
                            style="height: 6px; z-index: 11; top: -6px; left: 0px; position: absolute; cursor: default; display: none;">
                            <div class="nicescroll-cursors"
                                style="position: absolute; top: 0px; height: 6px; width: 0px; background-color: rgba(255, 255, 255, 0.7); border: 0px; background-clip: padding-box; border-radius: 5px;">
                            </div>
                        </div>
                    </div>
                </li>
                <!--  <li class="notf-item nav-item p-static p-md-relative dropdown">
              <a class="notf-link nav-link d-inline-flex align-items-center h-100 small-1 pl-2 pl-md-3" href="#" id="dropdownCart" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="p-relative d-inline-flex">
                  <span class="badge badge-counter badge-warning l-1"></span><span class="lead-2"><i class="fa fa-shopping-cart"></i></span>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-menu-sm-center dropdown-menu-wh shadow-1 bc-t position-absolute mt-1" aria-labelledby="dropdownCart">
                <div class="dropdown-inner rounded-2">
                  <div class="warning-gradient px-4 py-3 text-center">
                    <h5 class="mb-0">Cart (+7)</h5>
                  </div>
                  <div class="pl-4 pr-3 py-5">
                    <div class="dropdown-scrollbar" data-scrollbar="dropdown" tabindex="3" style="overflow: hidden; outline: none;">
                      <ul class="cart_list_hr list-unstyled">
                        <li class="cart_list_item_hr">
                          <div class="d-flex align-items-center text-white">
                            <div class="text-warning cart-img lead-2">
                              <img src="{{ asset('frontend/index_files/eCe-02.jpg ') }}" alt="Smart Watch">
                            </div>
                            <div class="flex-1 px-4">
                              <div class="d-flex align-items-center">
                                <div class="pr-4">
                                  <a href="#" class="cart-nav-title text-warning lead-1 lh-2 fw-600 d-block">Apple iMac (27-inch Retina 5K Display, 3.0GHz 6-core 8th-Generation Intel Core i5 Processor, 1TB</a>
                                  <div class="cart-nav-desc">Learn small ways to make a big difference to.</div>
                                </div>
                                <div class="px-3 ml-auto">
                                  <a href="#" class="text-nowrap text-warning"><i class="fas fa-trash"></i></a>
                                </div>
                              </div>
                              <div class="d-flex">
                                <div>x2</div>
                                <div class="ml-auto">€500.99</div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="cart_list_item_hr">
                          <div class="d-flex align-items-center text-white">
                            <div class="text-warning cart-img lead-2">
                              <img src="{{ asset('frontend/index_files/eCe-03.jpg ') }}" alt="Smart Watch">
                            </div>
                            <div class="flex-1 px-4">
                              <div class="d-flex align-items-center">
                                <div class="pr-4">
                                  <a href="#" class="cart-nav-title text-warning lead-1 lh-2 fw-600 d-block">Apple iPhone 8 Plus, 64GB, Gold - Fully Unlocked (Renewed)</a>
                                  <div class="cart-nav-desc">This phone is locked to simple Mobile from Tracfone.</div>
                                </div>
                                <div class="px-3 ml-auto">
                                  <a href="#" class="text-nowrap text-warning"><i class="fas fa-trash"></i></a>
                                </div>
                              </div>
                              <div class="d-flex">
                                <div>x1</div>
                                <div class="ml-auto">€225.99</div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="cart_list_item_hr">
                          <div class="d-flex align-items-center text-white">
                            <div class="text-warning cart-img lead-2">
                              <img src="{{ asset('frontend/index_files/eCe-04.jpg ') }}" alt="Smart Watch">
                            </div>
                            <div class="flex-1 px-4">
                              <div class="d-flex align-items-center">
                                <div class="pr-4">
                                  <a href="#" class="cart-nav-title text-warning lead-1 lh-2 fw-600 d-block">Apple MacBook Pro (13-inch Retina, 2.3GHz dual-Core Intel Core i5, 8GB RAM, 256GB SSD)</a>
                                  <div class="cart-nav-desc">Renewed products work and look like new.</div>
                                </div>
                                <div class="px-3 ml-auto">
                                  <a href="#" class="text-nowrap text-warning"><i class="fas fa-trash"></i></a>
                                </div>
                              </div>
                              <div class="d-flex">
                                <div>x3</div>
                                <div class="ml-auto">€282.99</div>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="cart_list_item_hr">
                          <div class="d-flex align-items-center text-white">
                            <div class="text-warning cart-img lead-2">
                              <img src="{{ asset('frontend/index_files/eCe-05.jpg') }}" alt="Smart Watch">
                            </div>
                            <div class="flex-1 px-4">
                              <div class="d-flex align-items-center">
                                <div class="pr-4">
                                  <a href="#" class="cart-nav-title text-warning lead-1 lh-2 fw-600 d-block">Sony Xperia 10 Plus Unlocked Smartphone</a>
                                  <div class="cart-nav-desc">Wide display Full HD+, designed to fit in your hand comfortably.</div>
                                </div>
                                <div class="px-3 ml-auto">
                                  <a href="#" class="text-nowrap text-warning"><i class="fas fa-trash"></i></a>
                                </div>
                              </div>
                              <div class="d-flex">
                                <div>x1</div>
                                <div class="ml-auto">€200.99</div>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="dropdown-load-more text-center px-4 py-2">
                    <a href="#"><span class="icon-cart mr-1"></span> View Cart</a>
                  </div>
                </div>
              <div id="ascrail2002" class="nicescroll-rails nicescroll-rails-vr" style="width: 6px; z-index: 11; cursor: default; position: absolute; top: 0px; left: -6px; height: 0px; display: none;"><div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgba(255, 255, 255, 0.7); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2002-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 6px; z-index: 11; top: -6px; left: 0px; position: absolute; cursor: default; display: none;"><div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 6px; width: 0px; background-color: rgba(255, 255, 255, 0.7); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
            </li> -->
                <!--  <li class="userTH-item nav-item dropdown">
              <a class="userTH-link nav-link d-inline-flex align-items-center h-100 small-1 pl-2 pl-md-3" href="#" id="dropdownAdmin_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-options lead-2"></span></a>
              <div class="dropdown-menu dropdown-menu-right shadow-1 py-3 position-absolute mt-1" aria-labelledby="dropdownAdmin">
                <a class="dropdown-item" href="#">Dashboards</a>
                <a class="dropdown-item" href="#">UI</a>
                <a class="dropdown-item" href="#">Charts</a>
              </div>
            </li> -->
                <li class="user-item nav-item dropdown">
                    <a class="user-link nav-link d-inline-flex align-items-center h-100 small-1 pl-1 pl-sm-3 pr-0"
                        href="#" id="dropdownAdmin_02" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">

                        @php
                            $id = Auth::guard('web')->user()->id;
                            $adminData = App\Models\User::where('role', 'user')->find($id);
                        @endphp
                        <img class="user-avatar rounded-circle mr-sm-3"
                            src="{{ !empty($adminData->profile_photo) ? url('public/upload/user_images/' . $adminData->profile_photo) : url('public/upload/user1.png') }}"
                            alt="Avatar">
                        <div class="d-none d-sm-block lh-1">
                            <div class="lh-5">{{ Auth::user()->name }}</div>
                            <span class="small-3"><i class="fas fa-circle text-warning small-5"></i> Online</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow-1 py-3 position-absolute mt-2"
                        aria-labelledby="dropdownAdmin">
                        <a class="dropdown-item" href="{{ route('user.profile.view') }}"><span class="mr-2"><i
                                    class="fa fa-user"></i></span>Profile View</a>
                        <a class="dropdown-item" href="{{ route('user.password.change') }}"><span class="mr-2"><i
                                    class="fa fa-user"></i></span>Password Change</a>
                        <a href="{{ route('user.logout') }}" class="dropdown-item" style="cursor:pointer;">
                            <span class="mr-2"><i class="fa fa-lock"></i></span>Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.nav -->
</header>
<!-- /.header -->
