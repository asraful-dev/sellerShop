@extends('admin.admin_master')
@section('admin')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Rank List</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Rank List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <span class="badge badge-success rounded-pill" style="font-size: 18px;">Rank Count
                ({{ count($ranks) }}) </span>
            <hr />
            <div class="card">
                <div class="card-body">
                    <p>Check All Rank</p>
                    <hr>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-responsive-sm"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Username</th>
                                    <th>Refer By</th>
                                    <th>Rank Position</th>
                                    <th>Rank Commission</th>
                                    <th>Request Time</th>
                                    {{-- <th>Monthly Commission Time</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranks as $key => $rank)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td>
                                            {{ $rank->username }}
                                        </td>
                                        <td>
                                            {{ \App\Models\User::where('id', $rank->refer_by)->first()->username ?? 'Null' }}
                                        </td>
                                        <td>
                                            @if ($rank->smart_seller_status == 1)
                                                Smart Seller
                                            @elseif($rank->smart_seller_status == 2)
                                                Ambassador Seller
                                            @elseif($rank->smart_seller_status == 3)
                                                Brand Ambassador
                                            @elseif($rank->smart_seller_status == 4)
                                                Crown Ambassador
                                            @elseif($rank->smart_seller_status == 5)
                                                Executive Director
                                            @endif
                                        </td>
                                        <td>
                                            @if ($rank->smart_seller_status == 1)
                                                {{ $rank->smart_seller_amount ?? 0 }}
                                            @elseif($rank->smart_seller_status == 2)
                                                {{ $rank->smart_seller_amount ?? 0 }}
                                            @elseif($rank->smart_seller_status == 3)
                                                {{ $rank->smart_seller_amount ?? 0 }}
                                            @elseif($rank->smart_seller_status == 4)
                                                {{ $rank->smart_seller_amount ?? 0 }}
                                            @elseif($rank->smart_seller_status == 5)
                                                {{ $rank->smart_seller_amount ?? 0 }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $rank->created_at->format('Y-m-d') }}
                                        </td>
                                        @php
                                            $monthly_days = Carbon\Carbon::parse($rank['created_at'])->addDays(30);
                                        @endphp
                                        {{-- <td>
                                            {{ $monthly_days->format('Y-m-d H:i:s') }}
                                        </td> --}}
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
