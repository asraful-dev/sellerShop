@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Balance Request</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Balance Request</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                
            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Balance Request Count ({{ count($balanceRequests) }}) </span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Username</th>
                                <th>Gateway</th>
                                <th>Amount</th>
                                <th>Wallet Address</th>
                                <th>Trx ID</th>
                                <th>Sender Number</th>
                                <th>Request Time</th>
                                <th>Screenshot</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($balanceRequests as $balanceRequest)
                                <tr>
                                    <td>{{ $balanceRequest->id }}</td>
                                    <td>
                                        @php
                                            $user = \App\Models\User::where('id', $balanceRequest->user_id)->first();
                                        @endphp
                                        {{ $user->username?? 'Null' }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->gateway }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->amount }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->wallet_address }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->transaction_id }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->sender_number }}
                                    </td>
                                    <td>
                                        {{ $balanceRequest->created_at->format('Y-m-d') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.balance.image.show', $balanceRequest->id) }}">
                                            <img style='height:40px;width:70px;' src="{{ asset('public/upload/screenshot') }}/{{ $balanceRequest->screenshot }}" alt=""> 
                                        </a>
                                    </td>
                                    <td class="col-2">
                                        
                                      <a href="{{ route('approved.balance.request', $balanceRequest->id) }}" class="btn btn-primary btn-sm px-1"><i class="fa-solid fa-check"></i></a>

                                      <a href="{{ route('reject.balance.request', $balanceRequest->id) }}"class="btn btn-danger btn-sm px-1" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
