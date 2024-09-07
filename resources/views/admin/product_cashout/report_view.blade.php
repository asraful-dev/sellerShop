@extends('admin.admin_master')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Cashout Report Show</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cashout Report Show</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div style="flex: 2;">
                        <a href="{{ route('admin.product.cashout.accept.list') }}" class="btn btn-success">Accept List</a>
                        <a href="{{ route('admin.product.cashout.reject.list') }}" class="btn btn-danger">Reject List</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Cashout Count ({{ count($cashouts) }})
            </span>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-responsive-sm"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Date & Time</th>
                                    <th>Request Number</th>
                                    <th>Gateway</th>
                                    <th>Amount</th>
                                    <th>Bank Name</th>
                                    <th>Account Name</th>
                                    <th>Branch Name</th>
                                    <th>Holder Name</th>
                                    <th>Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cashouts as $key => $cashout)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td>
                                            {{ $cashout->user->username ?? 'Null' }}
                                        </td>
                                        <td>
                                            {{ $cashout->created_at->format('Y-m-d H:i:s') }}
                                        </td>
                                        <td>
                                            {{ $cashout->number }}
                                        </td>
                                        <td>
                                            {{ $cashout->gateway }}
                                        </td>
                                        <td>
                                            {{ $cashout->amount }}
                                        </td>
                                        @if ($cashout->bank_name == 'brac')
                                            <td>Brac Bank Limited</td>
                                        @elseif($cashout->bank_name == 'eastern')
                                            <td>Eastern Bank Limited</td>
                                        @elseif($cashout->bank_name == 'dutch')
                                            <td>Dutch Bangla Bank</td>
                                        @elseif($cashout->bank_name == 'trust')
                                            <td>Trust Bank Limited</td>
                                        @elseif($cashout->bank_name == 'sonali')
                                            <td>Sonali Bank</td>
                                        @elseif($cashout->bank_name == 'prime')
                                            <td>Prime Bank Limited</td>
                                        @elseif($cashout->bank_name == 'islami')
                                            <td>Islami Bank</td>
                                        @else
                                            <td>{{ $cashout->bank_name }}</td>
                                        @endif

                                        <td>{{ $cashout->account_name ?? 'Null' }}</td>
                                        <td>{{ $cashout->branch_name ?? 'Null' }}</td>
                                        <td>{{ $cashout->holder_name ?? 'Null' }}</td>

                                        <td>
                                            @if ($cashout->status == 1)
                                                <form action="{{ route('admin.product.approved.request', $cashout->id) }}"
                                                    id="firstForm" method="post">
                                                    @csrf
                                                    <button type="submit" id="pending"
                                                        class="btn btn-primary">Pending</button>
                                                </form>
                                            @elseif($cashout->status == 2)
                                                <button class="btn btn-warning">Approved</button>
                                            @elseif($cashout->status == 3)
                                                <button class="btn btn-secondary">Cancel</button>
                                            @endif
                                        <td>

                                        <td>
                                            @if ($cashout->status == 3)
                                                Null
                                            @else
                                                <form action="{{ route('admin.product.cancel.request', $cashout->id) }}"
                                                    id="secondForm" method="post">
                                                    @csrf
                                                    <button type='submit' id="cancel"
                                                        class="btn btn-primary">Cancel</button>
                                                </form>
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
