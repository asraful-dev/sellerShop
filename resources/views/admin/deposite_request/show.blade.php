@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product Stock Deposite  Slip Request</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product Stock Deposite  Slip Request</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                
            </div>
        </div>
        <!-- Row starts -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row justify-content-center">
                            <div class="card-title text-center">
                                <h3 id="addPackageText">Product Stock Deposite Slip Show Image</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                           <tr>
                                <td>Product Stock Deposite Slip  Request Image:</td>
                                <td>
                                   <img src="{{ asset('public/upload/screenshot') }}/{{ $imageShow->screenshot }}" alt="" style="height:100%; width:100%;">
                                </td>
                             </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row ends -->
    </div>
</div>
@endsection
