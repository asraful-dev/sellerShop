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
		               <h4 class="hr-text-left mb-6">Withdraw Reports</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>Withdraw Reports</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6 ">
		                <div class="data_table table-responsive">
		                    <table id="example" class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>Date and time</th>
		                                <th>Gateway</th>
		                                <th>From Wallet</th>
		                                <th>Amount</th>
		                                <th>Status</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@foreach ($cashout_reports as $key =>  $report)
		                            <tr role="row" class="even">
			                              <td class="col-1">{{ $key+1}}</td>
			                              <td class="col-4">
			                              	{{ date('Y-m-d H:i:s', strtotime($report->created_at)) }}
			                              </td>
			                              <td class="col-3">
			                              	{{ $report->gateway }}
			                              </td>
			                              <td class="col-2">
			                              	  	@if($report->targetWallet == "main_wallet")
			                                        Main Wallet
			                                    @else
			                                        Reffer Bonus
			                                    @endif
			                              </td>
			                                <td class="col-2">
			                              	 	{{ $report->amount }}
			                              </td>
			                                <td class="col-2">
			                              	  	@if($report->status == 1)
			                                        <a href="#" class="my-3 mx-1 btn btn-label btn-theme"><span class="btn-lb"><i class="fas fa-shopping-cart"></i></span>Pending</a>
			                                    @else
			                                        <a href="#" class="my-3 mx-1 btn btn-label btn-danger"><span class="btn-lb"><i class="fas fa-exclamation-triangle"></i></span>Approved</a>
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