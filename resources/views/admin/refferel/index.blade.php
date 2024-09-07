@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Referral List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Referral List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Referral Count ({{ count($refferel_users) }}) </span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Joining Date</th>
                                <th>Username</th>
                                <th>Reffer By</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach( $refferel_users as $refferel_user)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $refferel_user->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{ $refferel_user->username }}
                                    </td>
                                    @php
                                        $refer_by = \App\Models\User::where('id', $refferel_user->refer_by)->first();
                                    @endphp
                                    <td>{{ $refer_by->username ?? 'Null' }}</td>
                                    <td>
                                        {{ $refferel_user->phone }}
                                    </td>
                                    <td>
                                        {{ $refferel_user->email }}
                                    </td>
                                    <td>
                                        {{ $refferel_user->main_wallet ?? 'Null' }}
                                    </td>
                                    <td>
                                        @if($refferel_user->active_status == 1)
                                            <a href="#" class="badge badge-success"><span class="badge bg-success">Active</span></a>
                                        @else
                                            <a href="#" class="badge badge-danger"><span class="badge bg-danger">Disable</span></a>
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
