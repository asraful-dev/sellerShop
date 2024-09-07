@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Package List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Package List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('package.create') }}" class="btn btn-success">Add Package</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Pages Count ({{ count($packages) }}) </span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Package Icon</th>
                                <th>Package Name</th>
                                <th>Parcentage</th>
                                <th>Package Point</th>
                                <th>Package Day</th>
                                <th>Package Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packages as $key => $package)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td>
                                        <img src="{{ asset($package->icon) }}" class="justify-content-center" width="50px" height="30px;" alt="No Image">   
                                    </td>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ $package->percentage }}</td>
                                    <td>{{ $package->package_point }}</td>
                                    <td>{{ $package->day }}</td>
                                    <td>{{ $package->amount }}</td>
                                    <td>
                                      <!-- <a href="#" class="btn btn-success btn-sm px-1"><i class="fas fa-eye"></i></a> -->

                                      <a href="{{ route('package.edit',$package->id) }}" class="btn btn-primary btn-sm px-1"><i class="fas fa-edit"></i></a>

                                      <a href="{{ route('package.delete',$package->id) }}"class="btn btn-danger btn-sm px-1" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
