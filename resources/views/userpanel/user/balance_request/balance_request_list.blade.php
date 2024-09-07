@extends('layouts.userpanel')
@section('user_content')
<!-- <div class="d-flex align-items-center px-6 py-5">
	<div class="text-light mr-auto">
	    <h2 class="fw-100 mb-0">Balance Request List</h2>
	    <span class="lead-1 text-info">User Balance Request List</span>
	</div>
</div> -->
<!-- Transparent -->
<div class="overflow-hidden">
	<div id="dashboard" >
		<div class="d-flex align-items-center px-6 py-5">
		  <!-- <div class="text-light mr-auto">
		    <h2 class="fw-100 mb-0">Tables</h2>
		    <span class="lead-1 text-info">Styling of tables.</span>
		  </div> -->
		</div>

		<div class="container-fluid p-0">
		   <div class="row panel-top-line">
		      <div class="col">
		         <div class="py-7">
		            <!-- dataTables.js -->
		            <div class="mb-7">
		               <h4 class="hr-text-left mb-6">Balance Request List</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>User Balance Request List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table">
		                    <table id="example" class="table table-striped table-bordered table-responsive-sm">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>Screenshot</th>
		                                <th>Name</th>
		                                <th>Gateway</th>
						                <th>Amount</th>
						                <th>Wallet Address</th>
		                                <th>Trx ID</th>
						                <th>Sender Number</th>
						                <th>Request Time</th>
						                <th>Status</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@foreach ($balanceRequests as $key =>  $balanceRequest)
		                            <tr>
		                                <td class="col-1">{{ $key+1}}</td>
		                                <td><img style='height:40px;width:70px;' src="{{ asset('public/upload/screenshot') }}/{{ $balanceRequest->screenshot }}" alt=""></td>
		                                <td>
		                                    @php
		                                        $user = \App\Models\User::where('id', $balanceRequest->user_id)->first();
		                                    @endphp
		                                    {{ $user->name; }}
		                                </td>
		                                <td>{{ $balanceRequest->gateway }}</td>
				                        <td>{{ $balanceRequest->amount }}</td>
				                        <td>{{ $balanceRequest->wallet_address }}</td>
				                        <td>{{ $balanceRequest->transaction_id }}</td>
				                        <td>{{ $balanceRequest->sender_number }}</td>
				                        <td>
				                          	{{ $balanceRequest->created_at->format('Y-m-d') }}
				                        </td>
				                        <td>
				                          	@if($balanceRequest->status == 1)
				                               <span class="my-3 mx-1 btn btn-round btn-warning">Paid</span>
				                            @else
				                              <span class="my-3 mx-1 btn btn-round btn-danger">Unpaid</span>
				                            @endif
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
		</div>
	</div>
</div>


@endsection
