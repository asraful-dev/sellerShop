@extends('layouts.userpanel')
@section('user_content')
    <div class="overflow-hidden">
        <div id="dashboard">

            <!-- content-header -->
            <div class="row flex-wrap align-items-center px-6 py-5">
                <div class="col">
                    <div class="text-light pb-5 pb-lg-0 mr-auto">
                        <h2 class="fw-100 mb-0">User Dashboard</h2>
                        <p class="mb-0">Summary of your App</p>
                    </div>
                </div>
                <div class="col-12 col-lg-auto">
                    <div class="d-flex flex-wrap">
                        <div
                            class="w-100 w-sm-auto reportrange-btn d-flex align-items-center warning-gradient rounded-4 c-pointer">
                            <div class="d-flex align-items-center justify-content-center w-100">
                                <div id="reportrange" class="py-2 px-6">
                                    <span
                                        style="font-size: 22px; font-weight: bold;">Username:{{ Auth::user()->username }}</span>&nbsp;
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <a href="#"
                            class="mt-4 mt-sm-0 ml-sm-4 reportrange-btn btn btn-sm btn-circle warning-gradient lead-1 text-secondary">
                            <span class="fas fa-plus mr--1"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <div class="container-fluid p-0">
                <!-- panel-card -->
                <div class="card-row row no-gutters">
                    <div class="card-item col-lg-6 col-xl-3">
                        <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                            <div class="flex-1">
                                <span>Cash Wallet</span>
                                @php
                                    $main_wallet = Auth::user()->main_wallet;
                                @endphp
                                <h3 class="mb-0">{{ number_format($main_wallet ?? '0', 2) }}</h3>
                                <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                            </div>
                            <div class="card-icon">
                                <div class="text-warning">
                                    <span class="far fa-eye"></span>
                                </div>
                            </div>
                            <div class="progress w-100 h-5 mt-4 mb-2">
                                <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-item col-lg-6 col-xl-3">
                        <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                            <div class="flex-1">
                                <span>Fund Amount</span>
                                @php
                                    $fund_wallet = Auth::user()->fund_wallet;
                                @endphp
                                <h3 class="mb-0">{{ number_format($fund_wallet ?? '0', 2) }}</h3>
                                <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                            </div>
                            <div class="card-icon">
                                <div class="text-warning">
                                    <span class="far fa-eye"></span>
                                </div>
                            </div>
                            <div class="progress w-100 h-5 mt-4 mb-2">
                                <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $id = Auth::user()->id;
                        $agent = App\Models\User::where('agent_type', 'agent')
                            ->where('id', $id)
                            ->first();
                    @endphp

                    @if ($agent)
                    @else
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    <span>Affiliate Bonus</span>
                                    @php
                                        $refer_bonus = Auth::user()->refer_bonus;
                                    @endphp
                                    <h3 class="mb-0">{{ number_format($refer_bonus ?? '0', 2) }}</h3>
                                    <!--<span class="small"><span class="text-success"> <a  href="" class="btn btn-success">Convert</a></span></span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="far fa-eye"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($agent)
                    @else
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    <span>Commission Wallet</span>
                                    <h3 class="mb-0">{{ Auth::user()->main_wallet ?? '0' }}</h3>
                                    <!--<span class="small"><span class="text-success"> <a  href="" class="btn btn-success">Convert</a></span></span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="far fa-eye"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card-item col-lg-6 col-xl-3">
                        <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                            <div class="flex-1">
                                <span>Paid Withdraw</span>
                                @php
                                    $current_user = Auth::User()->id ?? 'null';
                                    $paid = App\Models\Cashout::where('status', 2)
                                        ->where('user_id', $current_user)
                                        ->sum('amount');
                                @endphp
                                <h3 class="mb-0">{{ $paid ?? '0' }}</h3>
                                <!--<span class="small"><span class="text-success"> <a  href="" class="btn btn-success">Convert</a></span></span> -->
                            </div>
                            <div class="card-icon">
                                <div class="text-warning">
                                    <span class="far fa-eye"></span>
                                </div>
                            </div>
                            <div class="progress w-100 h-5 mt-4 mb-2">
                                <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-item col-lg-6 col-xl-3">
                        <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                            <div class="flex-1">
                                <span>Pending Withdraw</span>
                                @php
                                    $current_user = Auth::user()->id;
                                    $pending = App\Models\Cashout::where('user_id', $current_user)
                                        ->where('status', 1)
                                        ->sum('amount');
                                @endphp
                                <h3 class="mb-0">{{ $pending ?? '0' }}</h3>
                                <!--<span class="small"><span class="text-success"> <a  href="" class="btn btn-success">Convert</a></span></span> -->
                            </div>
                            <div class="card-icon">
                                <div class="text-warning">
                                    <span class="far fa-eye"></span>
                                </div>
                            </div>
                            <div class="progress w-100 h-5 mt-4 mb-2">
                                <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                    style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card-item col-lg-6 col-xl-3">
                                                                                                                                                              <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                                                                                                                                                <div class="flex-1">
                                                                                                                                                                   
                                                                                                                                                                   
                                                                                                                                                                  <span>Total Deposit</span>
                                                                                                                                                                  <h3 class="mb-0">0</h3>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="card-icon">
                                                                                                                                                                  <div class="text-warning">
                                                                                                                                                                    <span class="fas fa-dollar-sign"></span>
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="progress w-100 h-5 mt-4 mb-2">
                                                                                                                                                                  <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                              </div>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="card-item col-lg-6 col-xl-3">
                                                                                                                                                              <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                                                                                                                                                <div class="flex-1">
                                                                                                                                                                  @php
                                                                                                                                                                      $current_user = Auth::User()->id;
                                                                                                                                                                      $binary_income = App\Models\DateBinaryCalculation::where('user_id', $current_user)->sum('income');
                                                                                                                                                                  @endphp
                                                                                                                                                                  <span>Team Sales Bonus</span>
                                                                                                                                                                  <h3 class="mb-0">{{ $binary_income ?? '0' }}</h3>
                                                                                                                                                                  <!-- <span class="small"><span class="text-success">47.00%</span> (30 days)</span>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="card-icon">
                                                                                                                                                                  <div class="text-warning">
                                                                                                                                                                    <span class="fas fa-wallet"></span>
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="progress w-100 h-5 mt-4 mb-2">
                                                                                                                                                                  <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                              </div>
                                                                                                                                                            </div>
                                                                                                                                                        
                                                                                                                                                        <div class="card-item col-lg-6 col-xl-3">-->
                    <!--  <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">-->
                    <!--    <div class="flex-1">-->

                    <!--      <span>Generation Income</span>-->
                    <!--      <h3 class="mb-0">0</h3>-->
                    <!--     <span class="small"><span class="text-success"> <a href="0" class="btn btn-success">Convert</a></span></span>-->
                    <!--    </div>-->
                    <!--    <div class="card-icon">-->
                    <!--      <div class="text-warning">-->
                    <!--        <span class="far fa-eye"></span>-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--    <div class="progress w-100 h-5 mt-4 mb-2">-->
                    <!--      <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </div>-->
                    <!--</div>-->
                    <!--<div class="card-item col-lg-6 col-xl-3">-->
                    <!--  <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">-->
                    <!--    <div class="flex-1">-->
                    <!--      <span>Leader Income</span>-->
                    <!--      <h3 class="mb-0">0</h3>-->
                    <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                    <!--    </div>-->
                    <!--    <div class="card-icon">-->
                    <!--      <div class="text-warning">-->
                    <!--        <span class="far fa-eye"></span>-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--    <div class="progress w-100 h-5 mt-4 mb-2">-->
                    <!--      <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">-->
                    <!--      </div>-->
                    <!--    </div>-->
                    <!--  </div>-->
                    <!--</div>
                                                                                                                                                            
                                                                                                                                                            <div class="card-item col-lg-6 col-xl-3">
                                                                                                                                                              <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                                                                                                                                                <div class="flex-1">
                                                                                                                                                                  <span>Mega Commission</span>
                                                                                                                                                                  <h3 class="mb-0">0 </h3>
                                                                                                                                                                  <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="card-icon">
                                                                                                                                                                  <div class="text-warning">
                                                                                                                                                                    <span class="fas fa-dollar-sign"></span>
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="progress w-100 h-5 mt-4 mb-2">
                                                                                                                                                                  <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                              </div>
                                                                                                                                                            </div>
                                                                                                                                                           
                                                                                                                                                            
                                                                                                                                                            <div class="card-item col-lg-6 col-xl-3">
                                                                                                                                                              <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                                                                                                                                                <div class="flex-1">
                                                                                                                                                                  <span>Car Rent</span>
                                                                                                                                                                  <h3 class="mb-0">0</h3>
                                                                                                                                                                  <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="card-icon">
                                                                                                                                                                  <div class="text-warning">
                                                                                                                                                                    <span class="far fa-user"></span>
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="progress w-100 h-5 mt-4 mb-2">
                                                                                                                                                                  <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                              </div>
                                                                                                                                                            </div>
                                                                                                                                                            
                                                                                                                                                           
                                                                                                                                                            <div class="card-item col-lg-6 col-xl-3">
                                                                                                                                                              <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                                                                                                                                                <div class="flex-1">
                                                                                                                                                                  <span>House Rent</span>
                                                                                                                                                                  <h3 class="mb-0">0</h3>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="card-icon">
                                                                                                                                                                  <div class="text-warning">
                                                                                                                                                                    <span class="fas fa-wallet"></span>
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="progress w-100 h-5 mt-4 mb-2">
                                                                                                                                                                  <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                              </div>
                                                                                                                                                            </div>
                                                                                                                                                            
                                                                                                                                                            
                                                                                                                                                             
                                                                                                                                                            <div class="card-item col-lg-6 col-xl-3">
                                                                                                                                                              <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                                                                                                                                                <div class="flex-1">
                                                                                                                                                                  <span>Yearly Fund</span>
                                                                                                                                                                  <h3 class="mb-0">0</h3>
                                                                                                                                                                  <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="card-icon">
                                                                                                                                                                  <div class="text-warning">
                                                                                                                                                                    <span class="far fa-eye"></span>
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="progress w-100 h-5 mt-4 mb-2">
                                                                                                                                                                  <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                                                                                                                                  </div>
                                                                                                                                                                </div>
                                                                                                                                                              </div>
                                                                                                                                                            </div>
                                                                                                                                                            
                                                                                                                                                             -->



                    @if ($agent)
                    @else
                        @if (Auth::user()->smart_seller_status == 1)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        <span>Rnak Incentive</span>
                                        @php
                                            $current_user = Auth::User()->id;
                                            $smart_seller_amount = App\Models\User::where('id', $current_user)
                                                ->where('smart_seller_status', 1)
                                                ->sum('smart_seller_amount');
                                        @endphp
                                        <h3 class="mb-0">{{ number_format($smart_seller_amount ?? '0', 2) }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-eye"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->smart_seller_status == 2)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        <span>Rnak Incentive</span>
                                        @php
                                            $current_user = Auth::User()->id;
                                            $smart_seller_amount = App\Models\User::where('id', $current_user)
                                                ->where('smart_seller_status', 2)
                                                ->sum('smart_seller_amount');
                                        @endphp
                                        <h3 class="mb-0">{{ number_format($smart_seller_amount ?? '0', 2) }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-eye"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->smart_seller_status == 3)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        <span>Rnak Incentive</span>
                                        @php
                                            $current_user = Auth::User()->id;
                                            $smart_seller_amount = App\Models\User::where('id', $current_user)
                                                ->where('smart_seller_status', 3)
                                                ->sum('smart_seller_amount');
                                        @endphp
                                        <h3 class="mb-0">{{ number_format($smart_seller_amount ?? '0', 2) }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-eye"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->smart_seller_status == 4)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        <span>Rnak Incentive</span>
                                        @php
                                            $current_user = Auth::User()->id;
                                            $smart_seller_amount = App\Models\User::where('id', $current_user)
                                                ->where('smart_seller_status', 4)
                                                ->sum('smart_seller_amount');
                                        @endphp
                                        <h3 class="mb-0">{{ number_format($smart_seller_amount ?? '0', 2) }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-eye"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->smart_seller_status == 5)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        <span>Rnak Incentive</span>
                                        @php
                                            $current_user = Auth::User()->id;
                                            $smart_seller_amount = App\Models\User::where('id', $current_user)
                                                ->where('smart_seller_status', 5)
                                                ->sum('smart_seller_amount');
                                        @endphp
                                        <h3 class="mb-0">{{ number_format($smart_seller_amount ?? '0', 2) }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-eye"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    @if ($agent)
                    @else
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    <span>Stock Deposite Bonus</span>
                                    @php
                                        $stock_deposite_bonus = Auth::user()->stock_deposite_bonus;
                                    @endphp
                                    <h3 class="mb-0">{{ number_format($stock_deposite_bonus ?? '0', 2) }}</h3>
                                    <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="fas fa-dollar-sign"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($agent)
                    @else
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    <span>Deposite Amount</span>
                                    @php
                                        $deposite_amount = Auth::user()->deposite_amount;
                                    @endphp
                                    <h3 class="mb-0">{{ number_format($deposite_amount ?? '0', 2) }} </h3>
                                    <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="fas fa-dollar-sign"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- @if ($agent)
       
        @else
        
        <div class="card-item col-lg-6 col-xl-3">
          <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
            <div class="flex-1">
            @php
              $current_user = Auth::User()->id;
              $purchase_wallet = App\Models\Order::where('user_id', $current_user)->where('resell_type',1)->sum('grand_total');
            @endphp
              <span>Purchase Wallet</span>
              <h3 class="mb-0">{{ $purchase_wallet ?? '0'}}</h3>
              <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
            </div>
            <div class="card-icon">
              <div class="text-warning">
                <span class="far fa-user"></span>
              </div>
            </div>
            <div class="progress w-100 h-5 mt-4 mb-2">
              <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </div>
        
        @endif --}}


                    {{-- @if ($agent)
       
        @else
        <div class="card-item col-lg-6 col-xl-3">
          <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
            <div class="flex-1">
              @php
              $current_user = Auth::User()->id;
              $roc_purc = App\Models\User::where('id', $current_user)->first();
            @endphp
              <span>Deposite Stock Commission</span>
              <h3 class="mb-0">{{ $roc_purc->roi_purchase ?? '0'}}</h3>
              <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
            </div>
            <div class="card-icon">
              <div class="text-warning">
                <span class="far fa-user"></span>
              </div>
            </div>
            <div class="progress w-100 h-5 mt-4 mb-2">
              <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </div>
        @endif --}}


                    @if ($agent)
                    @else
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    @php
                                        $current_user = Auth::User()->id;
                                        $resell_wallet = App\Models\Order::where('user_id', $current_user)
                                            ->where('resell_type', 2)
                                            ->sum('grand_total');
                                    @endphp
                                    <span>Re-sales</span>
                                    <h3 class="mb-0">{{ number_format($resell_wallet ?? '0', 2) }}</h3>

                                    <!-- <span class="small"><span class="text-success">47.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="fas fa-wallet"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($agent)
                    @else
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    @php
                                        $current_user = Auth::User()->id;
                                        $roc_rec = App\Models\User::where('id', $current_user)->first();
                                    @endphp
                                    <span>Re-sales Commission</span>
                                    <h3 class="mb-0">{{ $roc_rec->roc_resell }}</h3>

                                    <!-- <span class="small"><span class="text-success">47.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="fas fa-wallet"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- @if ($agent)
        
        @else
        <div class="card-item col-lg-6 col-xl-3">
          <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
            <div class="flex-1">
              @php
              $current_user = Auth::User()->id;
              $wallet = App\Models\SoldPackage::where('user_id', $current_user)->where('package_id',5)->sum('amount');
             @endphp
              <span>Stock Share</span>
              <h3 class="mb-0">{{ $wallet }}</h3>
              <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
            </div>
            <div class="card-icon">
              <div class="text-warning">
                <span class="far fa-eye"></span>
              </div>
            </div>
            <div class="progress w-100 h-5 mt-4 mb-2">
              <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </div>
        @endif --}}


                    {{-- @if ($agent)
        
        @else
            <div class="card-item col-lg-6 col-xl-3">
          <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
            <div class="flex-1">
              @php
              $current_user = Auth::User()->id;
              $roc_day = App\Models\User::where('id', $current_user)->first();
             @endphp
              <span>Stock Commision</span>
              <h3 class="mb-0">{{ $roc_day->roc_day }}</h3>
              <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
            </div>
            <div class="card-icon">
              <div class="text-warning">
                <span class="far fa-eye"></span>
              </div>
            </div>
            <div class="progress w-100 h-5 mt-4 mb-2">
              <div class="progress-bar bg-gradient-progress-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </div>
        @endif --}}

                    @if ($agent)
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    <span>Division Commision</span>
                                    <h3 class="mb-0">{{ Auth::user()->division_commission ?? '0' }}</h3>
                                    <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="far fa-eye"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif

                    @if ($agent)
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    <span>District Commision</span>
                                    <h3 class="mb-0">{{ Auth::user()->district_commission ?? '0' }}</h3>
                                    <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="far fa-eye"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif

                    @if ($agent)
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    <span>Upazilla Commision</span>
                                    <h3 class="mb-0">{{ Auth::user()->upazila_commission ?? '0' }}</h3>
                                    <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="far fa-eye"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif

                    @if ($agent)
                    @else
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    @php
                                        $current_user = Auth::User()->id;
                                        $today_joining = App\Models\User::where('role', 'user')
                                            ->whereDate('created_at', Carbon\Carbon::today())
                                            ->count();
                                    @endphp
                                    <span>Today Joining</span>
                                    <h3 class="mb-0">{{ $today_joining ?? '0' }}</h3>
                                    <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="far fa-user"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $refer_count = App\Models\User::where('refer_by', Auth::user()->id)->count();
                        @endphp
                        @if (Auth::user()->smart_seller_status == 1)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        @php
                                            $current_user = Auth::User()->id;
                                            $smart_seller_amount = App\Models\User::where('id', $current_user)
                                                ->where('smart_seller_status', 1)
                                                ->sum('smart_seller_amount');
                                            $smart_seller_count = App\Models\User::where('refer_by', $current_user)
                                                ->where('smart_seller_status', 1)
                                                ->count('id');
                                        @endphp
                                        <span>Smart Club</span>
                                        <h3 class="mb-0">{{ $smart_seller_amount ?? '0' }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        @php
                                            $current_user = Auth::User()->id;
                                            $smart_seller_count = App\Models\User::where('refer_by', $current_user)
                                                ->where('smart_seller_status', 1)
                                                ->count('id');
                                        @endphp
                                        <span>Smart Seller</span>
                                        <h3 class="mb-0">{{ $smart_seller_count ?? '0' }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->smart_seller_status == 2)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        @php
                                            $current_user = Auth::User()->id;
                                            $ambasssador_seller_count = App\Models\User::where('refer_by', $current_user)
                                                ->where('smart_seller_status', 1)
                                                ->count('id');
                                        @endphp
                                        <span>Ambasssador</span>
                                        <h3 class="mb-0">{{ $ambasssador_seller_count ?? '0' }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->smart_seller_status == 3)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        @php
                                            $current_user = Auth::User()->id;
                                            $brand_seller_count = App\Models\User::where('refer_by', $current_user)
                                                ->where('smart_seller_status', 2)
                                                ->count('id');
                                        @endphp
                                        <span>Brand Ambasssador</span>
                                        <h3 class="mb-0">{{ $brand_seller_count ?? '0' }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->smart_seller_status == 4)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        @php
                                            $current_user = Auth::User()->id;
                                            $crow_seller_count = App\Models\User::where('refer_by', $current_user)
                                                ->where('smart_seller_status', 3)
                                                ->count('id');
                                        @endphp
                                        <span>Crow Ambasssador</span>
                                        <h3 class="mb-0">{{ $crow_seller_count ?? '0' }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->smart_seller_status == 5)
                            <div class="card-item col-lg-6 col-xl-3">
                                <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                    <div class="flex-1">
                                        @php
                                            $current_user = Auth::User()->id;
                                            $ed_seller_count = App\Models\User::where('refer_by', $current_user)
                                                ->where('smart_seller_status', 4)
                                                ->count('id');
                                        @endphp
                                        <span>Ed Ambasssador</span>
                                        <h3 class="mb-0">{{ $ed_seller_count ?? '0' }}</h3>
                                        <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                    </div>
                                    <div class="card-icon">
                                        <div class="text-warning">
                                            <span class="far fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="progress w-100 h-5 mt-4 mb-2">
                                        <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif

                    @if ($agent)
                    @else
                        <div class="card-item col-lg-6 col-xl-3">
                            <div class="main-card card text-light flex-wrap align-items-center h-100 shadow-1">
                                <div class="flex-1">
                                    <span>Agent Commission</span>
                                    @php
                                        $agent_refer_commission = Auth::user()->agent_refer_commission;
                                    @endphp
                                    <h3 class="mb-0">{{ number_format($agent_refer_commission ?? '0', 2) }}</h3>
                                    <!-- <span class="small"><span class="text-success">3.00%</span> (30 days)</span> -->
                                </div>
                                <div class="card-icon">
                                    <div class="text-warning">
                                        <span class="fas fa-dollar-sign"></span>
                                    </div>
                                </div>
                                <div class="progress w-100 h-5 mt-4 mb-2">
                                    <div class="progress-bar bg-gradient-progress-warning" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif



                </div>
                <!-- /.panel-card -->
            </div>

        </div>
    </div>
@endsection
