@extends('admin.admin_master')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">All User</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All User</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-success">Add User</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <span class="badge badge-success rounded-pill" style="font-size: 18px;"> User Count ({{ count($users) }})
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
                                    <th>Username</th>
                                    <th>Refer By</th>
                                    <th>Fund Wallet</th>
                                    <th>Main Wallet</th>
                                    <th>Phone</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $i++ }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->username }}
                                        </td>
                                        <td>
                                            {{ \App\Models\User::where('id', $user->refer_by)->first()->username ?? 'Null' }}
                                        </td>
                                        <td>
                                            {{ $user->fund_wallet ?? '0.00' }}
                                        </td>
                                        <td>
                                            {{ $user->main_wallet ?? '0.00' }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                        <td>
                                            {{ $user->show_password }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ date('Y-m-d H:i:s', strtotime($user->created_at)) }}
                                        </td>
                                        <td class="col-2">
                                            <a href="{{ route('admin.user.edit', $user->id) }}"
                                                class="btn btn-primary btn-sm px-1"><i class="fas fa-edit"></i></a>
                                            @if ($user->role == 'admin')
                                                <a href="{{ route('admin.user.delete', $user->id) }}" id="delete"
                                                    class="btn btn-danger btn-sm px-1 disabled"><i
                                                        class="fas fa-trash"></i></a>
                                            @else
                                                <a href="{{ route('admin.user.delete', $user->id) }}" id="delete"
                                                    class="btn btn-danger btn-sm px-1"><i class="fas fa-trash"></i></a>
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
