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
		               <h4 class="hr-text-left mb-6">User Single Team Count</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>User Single Team Count List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table">


		                    <table id="example"  class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th class="text-center">SL</th>
	                                    <th class="text-center">User</th>
	                                    <th class="text-center">Refer By</th>
	                                    <th class="text-center">Amount</th>
	                                    <th class="text-center">Date</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@php
			                       		$amount=0;
			                    	@endphp
	                        		@foreach ($SoldPackage as $package)
                                     	<tr role="row" class="even">
                                     		<td>{{ $loop->iteration }}</td>
	                                        <td>{{ $package->users->name ?? 'Null' }} ({{ $package->users->username ?? 'Null' }})</td>
	                                        <td>{{ $package->users->name ?? 'Null' }}</td>
	                                        <td>{{ $package->amount ?? '0' }}</td>
	                                        @php
							                    $amount+=$package->amount;
							                @endphp
                                        	<td>{{ date('M d, Y, h:i a', strtotime($package->created_at)) }}</td>
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