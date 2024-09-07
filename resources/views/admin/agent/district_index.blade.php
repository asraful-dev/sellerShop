@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All District Agent List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All District Agent List</li>
                    </ol>
                </nav>
            </div>
            <!--<div class="ms-auto">-->
            <!--    <div class="btn-group">-->
            <!--        <a href="{{ route('create.agent') }}" class="btn btn-light"><i class="bx bxs-plus-square"></i>Add Agent</a>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <!--end breadcrumb-->
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> District Agent</span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Username</th>
                                <th>District Commission</th>
                                <th>Phone</th>
                                <th>Agent</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agents as $key=> $item)
                                @php
                                    $commission = 0.00;
                                    $agent1 = App\Models\User::where('agent_type', 'agent')->where('district_id',$item->district_id)->first();
                                @endphp
                                
                                @if (empty($agent1->district_id))
                                @else
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $agent1->username }}</td>
                                        <td>{{ $agent1->district_commission }}</td>
                                        <td>{{ $agent1->phone }}</td>
                                        <td>{{ $agent1->district->name_en ?? 'Null' }}</td>
                                        <td>Agent</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
