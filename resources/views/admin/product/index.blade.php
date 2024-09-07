@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
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
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('product.create') }}" class="btn btn-success">Add Product</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Product Count ({{ count($products) }}) </span>
        <hr/>
        <div class="ms-auto m-3" style="text-align: right;">
            <div class="btn-group">
                <a href="{{ route('product.import') }}" class="btn btn-info rounded-pill waves-effect waves-light" style="margin-right: 10px;">Import</a>
                <a href="{{ route('product.export') }}" class="btn btn-danger rounded-pill waves-effect waves-light">Export </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Product Image</th>
                                <th>Name (English)</th>
                                <th>Name (Bangla)</th>
                                <th>Category</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $item)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>
                                    <img src="{{ asset($item->product_thumbnail) }}" width="50px" height="30px;" class="img-sm img-avatar" alt="No Image">
                                    </td>
                                    <td> {{ $item->name_en ?? 'NULL' }} </td>
                                    <td> {{ $item->name_bn ?? 'NULL' }} </td>
                                    <td> {{ $item->category->category_name_en  ?? 'NULL'}} </td>
                                    <td> {{ $item->regular_price ?? 'NULL' }} </td>
                                    <td> {{ $item->minimum_buy_qty ?? 'NULL' }} </td>
                                    <td>
                                        @if($item->discount_price > 0)
                                            @if($item->discount_type == 1)
                                                <span class="badge rounded-pill bg-info text-white">৳{{ $item->discount_price }} off</span>
                                            @elseif($item->discount_type == 2)
                                                <span class="badge rounded-pill bg-success text-white">{{ $item->discount_price }}% off</span>
                                            @endif
                                        @else
                                          <span class="badge rounded-pill bg-danger text-white">No Discount</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == 1)
                                        <a href="{{ route('product.in_active',['id'=>$item->id]) }}" class="badge badge-success"><span class="badge bg-success">Active</span></a>
                                        @else
                                          <a href="{{ route('product.active',['id'=>$item->id]) }}" class="badge badge-danger"><span class="badge bg-danger">Disable</span></a>
                                        @endif
                                    </td>
                                    <td class="col-3">
                                      <a href="{{ route('product.view',$item->id) }}" class="btn btn-success btn-sm px-1"><i class="fas fa-eye"></i></a>

                                      <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary btn-sm px-1"><i class="fas fa-edit"></i></a>

                                      <a href="{{ route('product.delete',$item->id) }}"class="btn btn-danger btn-sm px-1" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
