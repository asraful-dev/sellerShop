@extends('agent.agent_dashboard')
@section('agent')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Withdraw Reports</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Withdraw Reports</li>
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
                        <h5 class="mb-0">Withdraw Reports</h5>
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
                                <th>Date and time</th>
                                <th>Gateway</th>
                                <th>From Wallet</th>
                                <th>Withdraw Amount</th>
                                <th>Number</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cashout_reports as $key => $report)
                                <tr>
                                    <td class="col-1">{{ $key + 1 }}</td>
                                    <td>{{ date('Y-m-d H:i:s', strtotime($report->created_at)) }}</td>
                                    <td>
                                        {{ $report->gateway }}
                                    </td>
                                    <td>
                                        @if ($report->targetWallet == 'commission_wallet')
                                            Commission Wallet
                                        @else
                                            Reffer Bonus
                                        @endif
                                    </td>
                                    <td>{{ $report->amount }} BDT</td>
                                    </td>
                                    <td>{{ $report->number }}</td>
                                    <td>
                                        @if ($report->status == 1)
                                            <span class="my-3 mx-1 btn btn-round btn-success">Pending</span>
                                        @else
                                            <span class="my-3 mx-1 btn btn-round btn-danger">Approved</span>
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

@push('dealer-script')
@endpush
