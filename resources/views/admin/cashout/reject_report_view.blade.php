@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Rejected Requests</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Rejected Requests</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div style="flex: 2;">
                    <a href="{{ route('admin.cashout.accept.list') }}" class="btn btn-success">Accept List</a>
                    <a href="{{ route('admin.cashout.reject.list') }}" class="btn btn-danger">Reject List</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> RejectList Count ({{ count($rejectLists) }}) </span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Date & Time</th>
                                <th>Request Number</th>
                                <th>Gateway</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($rejectLists as $cashoutrequest)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $cashoutrequest->user->username ?? 'Null'  }}
                                    </td>
                                    <td>
                                        {{ $cashoutrequest->created_at->format('Y-m-d H:i:s'); }}
                                    </td>
                                    <td>
                                        {{ $cashoutrequest->number }}
                                    </td>
                                    <td>
                                        {{ $cashoutrequest->gateway }}
                                    </td>
                                    <td>
                                        {{ $cashoutrequest->amount }}
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
