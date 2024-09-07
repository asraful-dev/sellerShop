@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Generation List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Generation List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                
            </div>
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Generation Count ({{ count($generations) }}) </span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>In Time</th>
                                <th>Commission Receive</th>
                                <th>Amount</th>
                                <th>Generation</th>
                                <th>Package Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($generations as $generation)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                        {{ $generation->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{ \App\Models\User::where('id', $generation->from_id)->first()->username }}
                                    </td>
                                    <td>
                                        {{ $generation->amount }}
                                    </td>
                                    <td>
                                        {{ $generation->refer_type }}
                                    </td>
                                    <td>
                                        {{ $generation->package_amount }}
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
