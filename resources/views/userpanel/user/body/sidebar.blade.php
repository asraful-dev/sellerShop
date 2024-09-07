@php
    $route = Route::current()->getName();
    $prefix = Request::route()->getPrefix();
@endphp
@php
    $id = Auth::user()->id;
    $agent = App\Models\User::where('agent_type', 'agent')
        ->where('id', $id)
        ->first();
@endphp
<!-- sidebar -->
<nav id="adminNav" class="main-sidebar p-collapsing-sidebar sidebar-fixed sidebar-left d-flex flex-column">
    <div class="main-sidebar-inner" data-scrollbar="sidebar" tabindex="5" style="overflow: hidden; outline: none;">
        <ul class="sidebar-nav sidebar-nav-light-hover list-unstyled text-unset small-3 fw-600 content-list">
            <style type="text/css">
                .sidebar-nav-light-hover>.nav-item.active>.nav-link.collapser-active {
                    position: relative;
                    color: rgb(255 255 255 / 90%) !important;
                    margin: auto;
                    padding: 10px 20px;
                    background-color: #01172E;
                }

                .sidebar-nav-light-hover>.nav-item.active>.nav-link.collapser-active:hover {
                    position: relative;
                    color: rgb(255 255 255 / 90%) !important;
                    margin: auto;
                    padding: 10px 20px;
                    background-color: #27263B;
                }
            </style>

            <li class="nav-item text-light transition active" style="padding-top:30px;">
                <a href="{{ route('dashboard') }}" aria-expanded="false"
                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                    <i class="fa fa-desktop"></i> <span class="p-collapsing-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item text-light transition active">
                <a href="{{ route('user.profile.view') }}" aria-expanded="false"
                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                    <!-- <img src="{{ asset('frontend/userpanel_sidebar_img/107137-add-profile-picture.gif') }}" width="30" height="20" alt=""> --><i
                        class="fa fa-user"></i> <span class="p-collapsing-title">My Profile</span>
                </a>
            </li>
            @if ($agent)
            @else
                <li class="nav-item text-light transition active">
                    <a href="{{ route('user.refferal.link') }}" aria-expanded="false"
                        class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                        <i class="fas fa-link"></i> <span class="p-collapsing-title">Refferal Link</span>
                    </a>
                </li>
            @endif

            <li class="nav-item text-light transition active">
                <a href="{{ route('buy.package.create') }}" aria-expanded="false"
                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                    <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Upgrade Package</span>
                </a>
            </li>

            <li class="nav-item text-light transition active">
                <a href="{{ route('user.buy.package.report') }}" aria-expanded="false"
                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                    <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Upgrade Package Report</span>
                </a>
            </li>

            <!--@if (Auth::user()->active_status == 0)
-->
            <!--<li class="nav-item text-light transition active">-->
            <!--  <a href="{{ route('user.id.upgrade') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">-->
            <!--   <i class="fas fa-portrait"></i> <span class="p-collapsing-title">ID Upgrade</span>-->
            <!--  </a>-->
            <!--</li>-->
        <!--@else-->

            <!--
@endif-->

            <!-- <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-rocket"></i> <span class="p-collapsing-title">Reffer Bonus</span>
        </a>
      </li> -->
            @if ($agent)
            @else
                <li class="nav-item text-light transition active">
                    <a href="{{ route('user.orders.index') }}" aria-expanded="false"
                        class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                        <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Purchase Product</span>
                    </a>
                </li>
            @endif

            @if ($agent)
            @else
                <li class="nav-item text-light transition active">
                    <a href="{{ route('user.orders2.index') }}" aria-expanded="false"
                        class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                        <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Resell Product</span>
                    </a>
                </li>
            @endif

            @if ($agent)
            @else
                <li class="nav-item text-light transition">
                    <a href="#" aria-expanded="false" data-toggle="collapse"
                        class="sbr-collapse nav-link nav-link-border collapser open">
                        <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Generation & Transfer
                            Money</span>
                    </a>
                    <div class="nav-collapse collapse

        {{ request()->route()->getName() == 'user.generation.list'? 'show': '' }}
        {{ request()->route()->getName() == 'user.refferel.list'? 'show': '' }}
        {{ request()->route()->getName() == 'user.income'? 'show': '' }}
        {{ request()->route()->getName() == 'user.transfer.create'? 'show': '' }}
        {{ request()->route()->getName() == 'user.send.transfer'? 'show': '' }}
        {{ request()->route()->getName() == 'user.recieve.transfer'? 'show': '' }}

        "
                        style="">
                        <ul class="list-unstyled">
                            <li class="nav-item">
                                <a href="{{ route('user.generation.list') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-donate"></i> <span class="p-collapsing-title">Team
                                        Generation</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.product.generation.list') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-donate"></i> <span class="p-collapsing-title">Product sale
                                        Generation</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.refferel.list') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-share-square"></i> <span class="p-collapsing-title">Referral
                                        List</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.income') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-shopping-bag"></i> <span class="p-collapsing-title">Income
                                        Statement</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.transfer.create') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-exchange-alt"></i> <span class="p-collapsing-title">Balance
                                        Transfer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.send.transfer') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-notes-medical"></i> <span class="p-collapsing-title">Send
                                        History</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.recieve.transfer') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-notes-medical"></i> <span class="p-collapsing-title">Receive
                                        History</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.recieve_roi.transfer') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-notes-medical"></i> <span class="p-collapsing-title">Receive ROI
                                        History</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.resell_roi.transfer') }}" aria-expanded="false"
                                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                    <i class="fas fa-notes-medical"></i> <span class="p-collapsing-title">Resell ROI
                                        History</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            <!-- <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-rocket"></i> <span class="p-collapsing-title">Team Sales Bonus</span>
        </a>
      </li> -->

            <!-- <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-rocket"></i> <span class="p-collapsing-title">Mega Commission</span>
        </a>
      </li>

      <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-rocket"></i> <span class="p-collapsing-title">Car Rent</span>
        </a>
      </li>

      <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-rocket"></i> <span class="p-collapsing-title">House Rent</span>
        </a>
      </li>

      <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-rocket"></i> <span class="p-collapsing-title">Yearly Fund</span>
        </a>
      </li>

       <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-rocket"></i> <span class="p-collapsing-title">Rnak Incentive</span>
        </a>
      </li>

       <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-rocket"></i> <span class="p-collapsing-title">Stockiest Bonus</span>
        </a>
      </li> -->

            <!--<li class="nav-item text-light transition active">-->
            <!--  <a href="{{ route('user.roc.report') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">-->
            <!--   <i class="fas fa-rocket"></i> <span class="p-collapsing-title">Roc Report</span>-->
            <!--  </a>-->
            <!--</li>-->

            {{-- <li class="nav-item text-light transition active">
        <a href="/chatify"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
          <i class="fas fa-sms"></i> <span class="p-collapsing-title">Chat Application</span>
        </a>
      </li> --}}

            {{-- <li class="nav-item text-light transition active">
        <a href="{{ route('user.tree')}}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
          <i class="fas fa-sms"></i> <span class="p-collapsing-title">My Tree</span>
        </a>
      </li> --}}
            {{--
      <li class="nav-item text-light transition active">
        <a href="{{ route('user.tree.summary')}}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
          <i class="fas fa-sms"></i> <span class="p-collapsing-title">Binary Summary</span>
        </a>
      </li> --}}

            <li class="nav-item text-light transition active">
                <a href="{{ route('user.balance.flexiload.request') }}" aria-expanded="false"
                    class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                    <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Mobile Recharge</span>
                </a>
            </li>


            <li class="nav-item text-light transition">
                <a href="#" aria-expanded="false" data-toggle="collapse"
                    class="sbr-collapse nav-link nav-link-border collapser open  {{ request()->route()->getName() == 'user.balance.usd.request'? 'active': '' }}">
                    <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Deposite Money</span>
                </a>
                <div class="nav-collapse collapse

        {{ request()->route()->getName() == 'user.balance.usd.request'? 'show': '' }}
        {{ request()->route()->getName() == 'user.balance.bkash.request'? 'show': '' }}
        {{ request()->route()->getName() == 'user.balance.nagad.request'? 'show': '' }}
        {{ request()->route()->getName() == 'user.balance.rocket.request'? 'show': '' }}
        {{ request()->route()->getName() == 'user.balance.request.list'? 'show': '' }}

        "
                    style="">
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a href="{{ route('user.balance.usd.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.balance.usd.request'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">USD Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.balance.bkash.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Bkash
                                    Request</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('user.balance.flexiload.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Flexiload
                                    Request</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('user.balance.nagad.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Nagad
                                    Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.balance.rocket.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Rocket
                                    Request</span>
                            </a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--  <a href="{{ route('user.balance.nagad.request') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">-->
                        <!--    <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Nagad Request</span>-->
                        <!--  </a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a href="{{ route('user.balance.request.list') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">My Balance Request
                                    List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item text-light transition">
                <a href="#" aria-expanded="false" data-toggle="collapse"
                    class="sbr-collapse nav-link nav-link-border collapser open  {{ request()->route()->getName() == 'user.balance.usd.request'? 'active': '' }}">
                    <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Deposite For Product
                        Stock</span>
                </a>
                <div class="nav-collapse collapse

      {{ request()->route()->getName() == 'user.deposite.bkash.request'? 'show': '' }}
      {{ request()->route()->getName() == 'user.deposite.nagad.request'? 'show': '' }}
      {{ request()->route()->getName() == 'user.deposite.bank.request'? 'show': '' }}
      {{ request()->route()->getName() == 'user.deposite.request.list'? 'show': '' }}

      "
                    style="">
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a href="{{ route('user.deposite.bkash.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Bkash
                                    Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.deposite.nagad.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Nagad
                                    Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.deposite.bank.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Bank
                                    Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.deposite.request.list') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">My Deposite
                                    Request List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            {{-- <li class="nav-item text-light transition active">
        <a href="{{ route('user.income') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-shopping-bag"></i> <span class="p-collapsing-title">Income Statement</span>
        </a>
      </li> --}}
            {{--
      <li class="nav-item text-light transition active">
        <a href="{{ route('user.transfer.create') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
          <i class="fas fa-exchange-alt"></i> <span class="p-collapsing-title">Capital Transfer</span>
        </a>
      </li> --}}

            {{-- <li class="nav-item text-light transition active">
        <a href="{{ route('user.send.transfer') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
          <i class="fas fa-notes-medical"></i> <span class="p-collapsing-title">Send History</span>
        </a>
      </li> --}}
            {{--
      <li class="nav-item text-light transition active">
        <a href="{{ route('user.recieve.transfer') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
          <i class="fas fa-notes-medical"></i> <span class="p-collapsing-title">Receive History</span>
        </a>
      </li>  --}}

            <!--  <li class="nav-item text-light transition active">
        <a href="#"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
          <i class="fa fa-home"></i> <span class="p-collapsing-title">Transaction History</span>
        </a>
      </li> -->

            <li class="nav-item text-light transition">
                <a href="#" aria-expanded="false" data-toggle="collapse"
                    class="sbr-collapse nav-link nav-link-border collapser open ">
                    <i class="fas fa-shopping-cart"></i> <span class="p-collapsing-title">Withdraw Money</span>
                </a>
                <div class="nav-collapse collapse

        {{ request()->route()->getName() == 'user.cashout.usd.request'? 'show': '' }}
        {{ request()->route()->getName() == 'user.cashout.bkash.request'? 'show': '' }}
        {{ request()->route()->getName() == 'user.cashout.nagad.request'? 'show': '' }}
        {{ request()->route()->getName() == 'user.cashout.rocket.request'? 'show': '' }}
        {{ request()->route()->getName() == 'user.cashout.report'? 'show': '' }}

        "
                    style="">
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a href="{{ route('user.cashout.usd.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.cashout.usd.request'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">USD
                                    Withdraw</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.cashout.bkash.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.cashout.bkash.request'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Bkash
                                    Withdraw</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.cashout.nagad.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.cashout.nagad.request'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Nagad
                                    Withdraw</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.cashout.rocket.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.cashout.rocket.request'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Rocket
                                    Withdraw</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.cashout.report') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.cashout.report'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Withdraw
                                    Report</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item text-light transition">
                <a href="#" aria-expanded="false" data-toggle="collapse"
                    class="sbr-collapse nav-link nav-link-border collapser open ">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="p-collapsing-title">Refund Withdraw
                    </span>
                </a>
                <div class="nav-collapse collapse
                  {{ request()->route()->getName() == 'user.product.cashout.usd.request'? 'show': '' }}
                  {{ request()->route()->getName() == 'user.product.cashout.bkash.request'? 'show': '' }}
                  {{ request()->route()->getName() == 'user.product.cashout.nagad.request'? 'show': '' }}
                  {{ request()->route()->getName() == 'user.cashout.bank.request'? 'show': '' }}
                  {{ request()->route()->getName() == 'user.product.cashout.rocket.request'? 'show': '' }}
                  {{ request()->route()->getName() == 'user.product.cashout.report'? 'show': '' }}
                  "
                    style="">
                    <ul class="list-unstyled">
                        {{-- <li class="nav-item">
                            <a href="{{ route('user.product.cashout.bkash.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.product.cashout.bkash.request'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Bkash
                                    Withdraw</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.product.cashout.nagad.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.product.cashout.nagad.request'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Nagad
                                    Withdraw</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('user.cashout.bank.request') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.product.cashout.bank.request'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Bank
                                    Withdraw</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.product.cashout.report') }}" aria-expanded="false"
                                class="sbr-collapse nav-link nav-link-border collapsed collapser {{ request()->route()->getName() == 'user.cashout.report'? 'active': '' }}">
                                <i class="fas fa-dollar-sign"></i> <span class="p-collapsing-title">Withdraw
                                    Report</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- @if ($agent)
            @else
                <li class="nav-item text-light transition active">
                    <a href="{{ route('user.rank.index') }}" aria-expanded="false"
                        class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                        <i class="fas fa-building"></i> <span class="p-collapsing-title">Rank Incentive</span>
                    </a>
                </li>
            @endif --}}

            <!--  <li class="nav-item text-light transition active">
        <a href=""  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-building"></i> <span class="p-collapsing-title">Refer Team Count</span>
        </a>
      </li> -->
            {{-- @if ($agent)
            @else
                <li class="nav-item text-light transition active">
                    <a href="{{ route('user.placement.index') }}" aria-expanded="false"
                        class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
                        <i class="fas fa-building"></i> <span class="p-collapsing-title">Rank Team</span>
                    </a>
                </li>
            @endif --}}
            <!--<li class="nav-item text-light transition active">-->
            <!--  <a href="{{ route('user.placement.index') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">-->
            <!--   <i class="fas fa-building"></i> <span class="p-collapsing-title">Placement Team</span>-->
            <!--  </a>-->
            <!--</li>-->
            {{-- <li class="nav-item text-light transition active">
        <a href="{{ route('user.placement.genatation.index') }}"  aria-expanded="false"  class="sbr-collapse nav-link nav-link-border collapsed collapser collapser-active">
         <i class="fas fa-building"></i> <span class="p-collapsing-title">Placement Genaration</span>
        </a>
      </li> --}}


        </ul>
    </div>
    <div id="ascrail2004" class="nicescroll-rails nicescroll-rails-vr"
        style="width: 6px; z-index: 11; cursor: default; position: absolute; top: 62px; left: 233.333px; height: 482px; display: block; opacity: 0;">
        <div class="nicescroll-cursors"
            style="position: relative; top: 0px; float: right; width: 6px; height: 128px; background-color: rgb(12, 196, 76); border: 0px; background-clip: padding-box; border-radius: 0px;">
        </div>
    </div>
    <div id="ascrail2004-hr" class="nicescroll-rails nicescroll-rails-hr"
        style="height: 6px; z-index: 11; top: 538px; left: 0px; position: absolute; cursor: default; display: none; width: 233px; opacity: 0;">
        <div class="nicescroll-cursors"
            style="position: absolute; top: 0px; height: 6px; width: 239px; background-color: rgb(12, 196, 76); border: 0px; background-clip: padding-box; border-radius: 0px; left: 0px;">
        </div>
    </div>
</nav>
<!-- /.sidebar -->
