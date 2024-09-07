@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Agent List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Agent List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('create.agent') }}" class="btn btn-light"><i class="bx bxs-plus-square"></i>Add Agent</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Agent Count ({{ count($agents) }}) </span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Refer By</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Agent Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agents as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> <img src="{{ (!empty($item->photo)) ? url('upload/admin_image/'.$item->photo) : url('upload/no_image.jpg') }}" style="width:50px; height: 40px;"> </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>
                                        {{ \App\Models\User::where('id', $item->refer_by)->first()->username ?? 'Null' }}
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>Agent</td>
                                    <td class="col-2">
                                      <a href="{{ route('agent.edit',$item->id) }}" class="btn btn-primary btn-sm px-1"><i class="fas fa-edit"></i></a>
                                      <a href="{{ route('agent.destroy',$item->id) }}"class="btn btn-danger btn-sm px-1" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
