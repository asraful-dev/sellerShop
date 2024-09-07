@extends('agent.agent_dashboard')
@section('agent')
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
                        <h5 class="mb-0">All Product Summary</h5>
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
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Delivery Status</th>
                                <th>Payment Status</th>
                                <th>Order Time</th>
                                <th class="text-end">Options</th>
                            </tr>
                        </thead>
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
                                    <td class="text-end">
                                        <a class="btn btn-primary btn btn-success btn-sm"
                                            href="{{ route('agent.order.show', $order->id) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a class="btn btn-primary btn-icon btn btn-primary btn-sm"
                                            href="{{ route('agent.invoice.download', $order->id) }}">
                                            <i class="fa-solid fa-download"></i>
                                        </a>
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

@push('agent-script')
@endpush
