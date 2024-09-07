@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Upazilla Agent List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Upazilla Agent List</li>
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
        <span class="badge badge-success rounded-pill" style="font-size: 18px;"> Upazilla Agent</span>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Username</th>
                                <th>Upazilla Commission</th>
                                <th>Phone</th>
                                <th>Agent</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agents as $key=> $item) 
                                @php
                                    $commission = 0.00;
                                    $agent1 = App\Models\User::where('agent_type', 'agent')->where('upazilla_id',$item->upazilla_id)->first();
                                @endphp
                                
                                @if (empty($agent1->upazilla_id))
                                @else
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $agent1->username }}</td>
                                        <td>{{ $agent1->upazila_commission }}</td>
                                        <td>{{ $agent1->phone }}</td>
                                         @php
                                            $upazilla_id = App\Models\Upazila::where('id',$item->upazilla_id)->first();
                                            $upazilla_name = $upazilla_id->name_en;
                                        @endphp
                                        <td>{{ $upazilla_name ?? 'Null'}}</td>
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
