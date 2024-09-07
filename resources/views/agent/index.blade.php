@extends('agent.agent_dashboard')
@section('agent')
    @php
        $id = Auth::user()->id;
        $agentId = App\Models\User::find($id);
        $status = $agentId->active_status;
    @endphp
    <div class="page-content">
        {{-- @if ($status === '1')
   <h4>Dealer Account is <span class="text-success">Active</span> </h4>
   @else
   <h4>Dealer Account is <span class="text-danger">InActive</span> </h4>
   <p class="text-danger"><b> Plz wait admin will check and approve your account</b></p>
   @endif --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @php
                                $total_order = App\Models\Order::where('type', 4)->count();
                            @endphp
                            <h5 class="mb-0 text-white">{{ $total_order ?? '0' }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-cart fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Order</p>
                            {{-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @php
                                $pending_order = App\Models\Order::where('delivery_status', 'pending')
                                    ->where('type', 4)
                                    ->count();
                            @endphp
                            <h5 class="mb-0 text-white">{{ $pending_order ?? '0' }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Pending Order</p>
                            {{-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @php
                                $confirmed_order = App\Models\Order::where('delivery_status', 'confirmed')
                                    ->where('type', 4)
                                    ->count();
                            @endphp
                            <h5 class="mb-0 text-white">{{ $confirmed_order ?? '0' }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Confirmed Order</p>
                            {{-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @php
                                $paid_order = App\Models\Order::where('payment_status', 1)
                                    ->where('type', 4)
                                    ->count();
                            @endphp
                            <h5 class="mb-0 text-white">{{ $paid_order ?? '0' }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Paid Order</p>
                            {{-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-orange">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @php
                                $unpaid_order = App\Models\Order::where('payment_status', 0)
                                    ->where('type', 4)
                                    ->count();
                            @endphp
                            <h5 class="mb-0 text-white">{{ $unpaid_order ?? '0' }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-dollar fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">UnPaid Order</p>
                            {{-- <p class="mb-0 ms-auto">+1.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @php
                                $agent_commission = Auth::user()->agent_commission;
                            @endphp
                            <h5 class="mb-0 text-white">৳{{ number_format($agent_commission ?? '0', 2) }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-group fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Commission Wallet</p>
                            {{-- <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ohhappiness">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            @php
                                $deposite_amount = Auth::user()->deposite_amount;
                            @endphp
                            <h5 class="mb-0 text-white"> ৳{{ number_format($deposite_amount ?? '0', 2) }}</h5>
                            <div class="ms-auto">
                                <i class='bx bx-group fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-3 bg-light-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Deposite Amount</p>
                            {{-- <p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Orders Summary</h5>
                    </div>
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order Code</th>
                                <th>Username</>
                                <th>Amount</th>
                                <th>Delivery Status</th>
                                <th>Payment Status</th>
                                <th>Order Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            $current_user = Auth::user()->id;
                            $orders = App\Models\Order::where('user_id', $current_user)
                                ->where('type', 4)
                                ->latest()
                                ->get();
                        @endphp
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $order->invoice_no }}</td>
                                    <td><b>{{ $order->user->username }}</b></td>
                                    <td>৳{{ $order->grand_total }}</td>
                                    <td>
                                        @php
                                            $status = $order->delivery_status;
                                            if ($order->delivery_status == 'cancelled') {
                                                $status = '<span class="badge bg-danger">Received</span>';
                                            }
                                            
                                        @endphp
                                        <span class="badge bg-success">{!! $status !!}</span>
                                    </td>
                                    <td>
                                        @if ($order->payment_status == '1')
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-danger">Un-Paid</span>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>

                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="javascript:;" class="ms-4"><i
                                                    class="bx bx-down-arrow-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
