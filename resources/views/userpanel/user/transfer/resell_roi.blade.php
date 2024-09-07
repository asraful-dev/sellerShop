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
		               <h4 class="hr-text-left mb-6">Resell Roi History</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0 d-none"><code>User Transfer Recieve History</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		              	<div class="data_table">
		                    <table id="example" class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>Transaction Time</th>
		                                <th>To User</th>
		                                <th>Amount</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@php
				                       $amount=0;
				                    @endphp
		                        	@foreach ($transferHistories as $key =>  $transferHistory)
		                            <tr>
		                                <td>{{ $key+1}}</td>
		                                <td>
		                                    {{ date('Y-m-d H:i:s', strtotime($transferHistory->created_at)) }}
		                                </td>
		                                <td>
		                                	{{ App\Models\User::find($transferHistory->user_id)->username; }}
		                                </td>
		                                <td> {{ $transferHistory->amount }}</td>
		                               	@php
				                        	$amount+=$transferHistory->amount;
				                      	@endphp
		                            </tr>
		                            @endforeach
		                            <tfoot>
					                    <tr>
					                      <td colspan="3" style="font-weight: bold; text-align: right;">Total:</td>
					                      <td style="font-weight: bold;">{{ $amount }}</td>
					                    </tr>
					                </tfoot>
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