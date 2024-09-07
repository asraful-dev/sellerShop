@extends('admin.admin_master')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Managements List</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Managements List</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('management.create') }}" class="btn btn-success">Add Management</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Management Count
                ({{ count($managements) }}) </span>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-responsive-sm"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Number</th>
                                    <th>Experience</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($managements as $key => $item)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td>
                                            <img src="{{ asset($item->photo) }}" width="50px" height="30px;"
                                                class="img-sm img-avatar" alt="No Image">
                                        </td>
                                        <td> {{ $item->name ?? 'NULL' }} </td>
                                        <td> {{ $item->designation ?? 'NULL' }} </td>
                                        <td> {{ $item->number ?? 'NULL' }} </td>
                                        <td> {{ $item->experience ?? 'NULL' }} </td>
                                        <td class="col-1">
                                            @if ($item->position == 1)
                                                <span class="badge bg-success">Managment Member</span>
                                            @elseif($item->position == 2)
                                                <span class="badge bg-success">Royal Member</span>
                                            @elseif($item->position == 3)
                                                <span class="badge bg-success">Founder Member</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <a href="{{ route('management.in_active', ['id' => $item->id]) }}"
                                                    class="badge badge-success"><span
                                                        class="badge bg-success">Active</span></a>
                                            @else
                                                <a href="{{ route('management.active', ['id' => $item->id]) }}"
                                                    class="badge badge-danger"><span
                                                        class="badge bg-danger">Disable</span></a>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('management.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm px-1"><i class="fas fa-edit"></i></a>

                                            <a href="{{ route('management.delete', $item->id) }}"class="btn btn-danger btn-sm px-1"
                                                title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
