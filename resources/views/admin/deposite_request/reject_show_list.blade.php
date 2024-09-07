@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product Stock Deposite Rejected Requests</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product Stock Deposite Rejected Requests</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                
            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Product Stock Deposite Rejected Requests Count ({{ count($reject_reports) }}) </span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Username</th>
                                <th>Sender Number</th>
                                <th>Amount</th>
                                <th>Wallet Address</th>
                                <th>Trx ID</th>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Branch Name</th>
                                <th>Holder Name</th>
                                <th>Accepted Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($reject_reports as $balanceRequest)
                                <tr>
                                    <td>{{ $balanceRequest->id }}</td>
                                    @php
                                      $user = \App\Models\User::where('id', $balanceRequest->user_id)->first();
                                    @endphp
                                    <td>
                                        {{ $user->username ?? 'Null' }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->sender_number }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->amount }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->wallet_address }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->trx_id }}
                                    </td>
                                    @if($balanceRequest->bank_name == 'brac')
                                    <td>Brac Bank Limited</td>
                                    @elseif($balanceRequest->bank_name == 'eastern')
                                        <td>Eastern Bank Limited</td>
                                    @elseif($balanceRequest->bank_name == 'dutch')
                                        <td>Dutch Bangla Bank</td>
                                    @elseif($balanceRequest->bank_name == 'trust')
                                        <td>Trust Bank Limited</td>
                                    @elseif($balanceRequest->bank_name == 'sonali')
                                        <td>Sonali Bank</td>
                                    @elseif($balanceRequest->bank_name == 'prime')
                                        <td>Prime Bank Limited</td>
                                    @elseif($balanceRequest->bank_name == 'islami')
                                        <td>Islami Bank</td>
                                    @else
                                        <td>{{ $balanceRequest->bank_name }}</td>
                                    @endif
                                
                                <td>{{ $balanceRequest->account_name ?? 'Null' }}</td>
                                <td>{{ $balanceRequest->branch_name ?? 'Null' }}</td>
                                <td>{{ $balanceRequest->holder_name ?? 'Null' }}</td>
                                    <td>
                                        {{ $balanceRequest->created_at->format('Y-m-d H:i:s') }}
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
