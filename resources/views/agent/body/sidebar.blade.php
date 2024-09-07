@php
    $id = Auth::user()->id;
    $dealerId = App\Models\User::find($id);
    $status = $dealerId->active_status;
@endphp
<style>
    .mm-active>a,
    .sidebar-wrapper .metismenu a:active,
    .sidebar-wrapper .metismenu a:focus,
    .sidebar-wrapper .metismenu a:hover {
        color: #fff;
        text-decoration: none;
        background: rgb(255 0 82);
    }

    .sidebar-wrapper .metismenu ul {
        border: 1px solid #ededed;
        background: #4bbd6d;
    }

    .sidebar-wrapper .metismenu {
        color: #fff;
        background-color: red;
    }

    .sidebar-wrapper .metismenu a {
        color: #fff;
    }
</style>
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Agent</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('agent.dashobard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title" style="color:#fff;">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-fresh-juice'></i>
                </div>
                <div class="menu-title">Product Manage </div>
            </a>
            <ul>
                <li> <a href="{{ route('agent.product.list') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
                </li>
                <li> <a href="{{ route('agent.order.product.list') }}"><i class="bx bx-right-arrow-alt"></i>Order
                        Product List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-fresh-juice'></i>
                </div>
                <div class="menu-title">All Deposite Request</div>
            </a>
            <ul>
                <li> <a href="{{ route('agent.bank.request') }}"><i class="bx bx-right-arrow-alt"></i>Bank Request</a>
                </li>
                <li> <a href="{{ route('agent.balance.request.list') }}"><i class="bx bx-right-arrow-alt"></i>My
                        Deposite
                        Request List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-fresh-juice'></i>
                </div>
                <div class="menu-title">All Withdraw Request</div>
            </a>
            <ul>
                <li> <a href="{{ route('agent.bkash.withdraw.request') }}"><i class="bx bx-right-arrow-alt"></i>Bkash
                        Request</a>
                </li>
                <li> <a href="{{ route('agent.nagad.withdraw.request') }}"><i class="bx bx-right-arrow-alt"></i>Nagad
                        Request</a>
                </li>
                <li> <a href="{{ route('agent.withdraw.request.list') }}"><i class="bx bx-right-arrow-alt"></i>My
                        Withdraw Request List</a>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a href="#" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-fresh-juice'></i>
                </div>
                <div class="menu-title">All Withdraw Request</div>
            </a>
            <ul>
                <li> <a href="{{ route('agent.usd.withdraw.request') }}"><i class="bx bx-right-arrow-alt"></i>Bank
                        Request</a>
                </li>
                <li> <a href="{{ route('agent.bkash.withdraw.request') }}"><i class="bx bx-right-arrow-alt"></i>Bkash
                        Request</a>
                </li>
                <li> <a href="{{ route('agent.nagad.withdraw.request') }}"><i class="bx bx-right-arrow-alt"></i>Nagad
                        Request</a>
                </li>
                <li> <a href="{{ route('agent.rocket.withdraw.request') }}"><i class="bx bx-right-arrow-alt"></i>Rocket
                        Request</a>
                </li>
                <li> <a href="{{ route('agent.withdraw.request.list') }}"><i class="bx bx-right-arrow-alt"></i>My
                        Withdraw Request List</a>
                </li>
            </ul>
        </li> --}}
        {{-- <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="bx bx-cart"></i>
            </div>
            <div class="menu-title"> Order Manage </div>
         </a>
         <ul>
            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Vendor Order</a>
            </li>
            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Return Order</a>
            </li>
            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Complete Return Order</a>
            </li>
         </ul>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-indent-increase"></i>
            </div>
            <div class="menu-title"> Review Manage </div>
         </a>
         <ul>
            <li> <a href="#"><i class="bx bx-right-arrow-alt"></i>All Review</a>
            </li>
         </ul>
      </li> --}}
    </ul>
    <!--end navigation-->
</div>
