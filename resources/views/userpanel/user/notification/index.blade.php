@extends('layouts.userpanel')
@section('user_content')
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
		               <h4 class="hr-text-left mb-6">Notification List</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>User Notification List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		            	 <div class="data_table">
		                    <table id="example" class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>Username</th>
		                                <th>Notification Message</th>
		                                <th>Notification Time</th>
		                                <th>Image</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        @php
			                      $BalanceRequest = App\Models\BalanceRequest::where('user_id', Auth::user()->id)->count();
			                      $BalanceRequestDatas = App\Models\BalanceRequest::where('user_id', Auth::user()->id)->get();
			                    @endphp
		                        <tbody>
		                        	@foreach($BalanceRequestDatas as $key => $BalanceRequestData)
                          				@if($BalanceRequestData->approved_by == 'Admin')
				                            <tr role="row" class="even">
				                                <td class="col-1">{{ $key+1}}</td>
				                               	<td class="col-2">
				                              		@php
					                              		$current_user = Auth::User()->id;
					                              		$user = App\Models\User::where('id', $current_user)->first();
					                              	@endphp
		                                            {{ $user->username; }}
				                              	</td>
						                        <td class="col-5"> Admin Accept your {{ $BalanceRequestData->wallet_address }} Request</td>
						                        <td class="col-2">
						                        	{{ date('Y-m-d H:i:s', strtotime($BalanceRequestData->created_at)) }}
						                         </td>

					                           	<td class="col-5">
					                            	<img style="height: 50px;width: 50px;display: inline;margin-left: 5px;" src="{{ asset('upload/screenshot') }}/{{ $BalanceRequestData->screenshot }}" alt="TRX ID">
					                            </td>

				                              	@if($BalanceRequestData->status == '1')
					                             	<td class="col-6">
					                              		<a href="#" class="my-3 mx-1 btn btn-round btn-success">Accpted</a>
					                              	</td> 
				                              	@endif
				                            </tr>
				                           	@elseif($BalanceRequestData->rejected_by == 'Admin')
		                          			<tr role="row" class="even">
						                        <td class="col-1">{{ $key+1}}</td>
						                        <td class="col-2">
					                              	@php
					                              		$current_user = Auth::User()->id;
					                              		$user = App\Models\User::where('id', $current_user)->first();
					                              	@endphp
			                                        {{ $user->username; }}
				                              	</td>
						                        <td class="col-5"> Admin Reject your {{ $BalanceRequestData->wallet_address }} Request</td>
						                        <td class="col-2"> {{ date('Y-m-d H:i:s', strtotime($BalanceRequestData->created_at)) }}</td>

				                              	<td class="col-5">
				                              	  <img style="height: 50px;width: 50px;display: inline;margin-left: 5px;" src="{{ asset('upload/screenshot') }}/{{ $BalanceRequestData->screenshot }}" alt="TRX ID">
				                              	</td>

						                        @if($BalanceRequestData->status == '2')
							                        <td class="col-6">
							                        	<a href="#" class="my-3 mx-1 btn btn-round btn-danger">Rejected</a>
							                        </td>
						                        @endif
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
		</div>
	</div>
</div>


@endsection