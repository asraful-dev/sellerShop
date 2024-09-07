@extends('agent.agent_dashboard')
@section('agent')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Balance Request List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Balance Request List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

        </div>
        <!--end row-->
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="mb-0">Balance Request List</h5>
                    </div>
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>SL</th>
                                <th>Screenshot</th>
                                <th>Name</th>
                                <th>Gateway</th>
                                <th>Amount</th>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Branch Name</th>
                                <th>Holder Name</th>
                                <th>Request Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($balanceRequests as $key => $balanceRequest)
                                <tr>
                                    <td class="col-1">{{ $key + 1 }}</td>
                                    <td><img style='height:40px;width:70px;'
                                            src="{{ asset('public/upload/screenshot') }}/{{ $balanceRequest->screenshot }}"
                                            alt=""></td>
                                    <td>
                                        @php
                                            $user = \App\Models\User::where('id', $balanceRequest->user_id)->first();
                                        @endphp
                                        {{ $user->name }}
                                    </td>
                                    <td>{{ $balanceRequest->gateway }}</td>
                                    <td>{{ $balanceRequest->amount }}</td>
                                    @if ($balanceRequest->bank_name == 'brac')
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
                                        {{ $balanceRequest->created_at->format('Y-m-d') }}
                                    </td>
                                    <td>
                                        @if ($balanceRequest->status == 1)
                                            <span class="my-3 mx-1 btn btn-round btn-success">Paid</span>
                                        @else
                                            <span class="my-3 mx-1 btn btn-round btn-danger">Unpaid</span>
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
@endsection

@push('stockiest-script')
@endpush
