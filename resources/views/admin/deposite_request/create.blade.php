@extends('admin.admin_master')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Product Stock Deposite List</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product Stock Deposite List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <span class="badge badge-success rounded-pill" style="font-size: 18px;">Product Stock Deposite Count
                ({{ count($deposite_product) }}) </span>
            <hr />
            <div class="card">
                <div class="card-body">
                    <p>Check All Commission</p>
                    <hr>
                    @php
                        $today_total_deposite = App\Models\DepositeProduct::whereDay('created_at', date('d'))
                            ->where('status', 0)
                            ->sum('amount');
                        // dd($deposite_product);
                    @endphp
                    {{-- <form action="#" method="post">
                    @csrf
                    <div class="form-group mt-2 mb-3">
                        <label for="commission_amount">Commission Amount:</label>
                        <input type="number" name="amount" min="0" class="form-control mt-2" value="{{ $today_total_deposite ?? '0'}}" id="commission_amount" placeholder="Enter user commission amount">
                    </div>
                    <button type="submit" class="btn btn-success mb-3"><i class="fa-solid fa-check"></i></button>
                </form> --}}
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-responsive-sm"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Username</th>
                                    <th>Deposite Amount</th>
                                    <th>Gateway</th>
                                    <th>Deposite</th>
                                    <th>Request Time</th>
                                    <th>Monthly Commission Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deposite_product as $key => $deposite)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        @php
                                            $user = App\Models\User::where('id', $deposite->user_id)->first();
                                        @endphp
                                        <td>{{ $user->username ?? 'Null' }}</td>
                                        <td class="col-2">{{ $deposite->amount }}</td>
                                        <td>{{ $deposite->gateway ?? 'Null' }}</td>
                                        @if ($deposite->created_at->format('d') == date('d'))
                                            <td><span class="badge bg-success rounded-pill">Today Deposite</span></td>
                                        @else
                                            <td><span class="badge bg-danger rounded-pill">OLd Deposite</span></td>
                                        @endif
                                        <td>
                                            {{ $deposite->created_at->format('Y-m-d H:i:s') }}
                                        </td>
                                        @php
                                            $monthly_days = Carbon\Carbon::parse($deposite['created_at'])->addDays(30);
                                        @endphp
                                        <td>
                                            {{ $monthly_days->format('Y-m-d H:i:s') }}
                                        </td>
                                        <td>
                                            @if ($monthly_days->format('d') <= date('d'))
                                                <a href="{{ route('admin.deposite.commission.store', $deposite->id) }}"
                                                    class="btn btn-primary btn-sm px-1"><i
                                                        class="fa-solid fa-check"></i></a>
                                            @else
                                                <a href="#" class="btn btn-danger btn-sm px-1 disabled"><i
                                                        class="fa-solid fa-times"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
