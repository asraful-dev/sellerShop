@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Checkout Notice List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout Notice List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('checkoutnotice.create') }}" class="btn btn-success">Add Checkout Notice</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Checkout Notice Count ({{ count($checkouts) }}) </span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($checkouts as $key => $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td> {{ $item->title ?? 'NULL' }} </td>
                                    <td> {{ $item->description ?? 'NULL' }} </td>
                                    <td>
                                        @if($item->status == 1)
                                        <a href="{{ route('checkoutnotice.in_active',['id'=>$item->id]) }}" class="badge badge-success"><span class="badge bg-success">Active</span></a>
                                        @else
                                          <a href="{{ route('checkoutnotice.active',['id'=>$item->id]) }}" class="badge badge-danger"><span class="badge bg-danger">Disable</span></a>
                                        @endif
                                    </td>
                                    <td  class="col-2">
                                      <a href="{{ route('checkoutnotice.edit',$item->id) }}" class="btn btn-primary btn-sm px-1"><i class="fas fa-edit"></i></a>
                                      <a href="{{ route('checkoutnotice.delete',$item->id) }}"class="btn btn-danger btn-sm px-1" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
