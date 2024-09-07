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
		               <h4 class="hr-text-left mb-6">Binary Summary Report List</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>User Buy Package List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table">
		                    <table id="example" class="table table-striped table-bordered table-responsive-sm">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>In Time</th>
		                                <th>Username</th>
		                                <th>Lp</th>
		                                <th>Rp</th>
		                                <th>Lc</th>
		                                <th>Rc</th>
		                                <th>Income</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            @php
				                       $amount=0;
				                    @endphp
		                        	@foreach ($treeReports as $key =>  $report)
		                            <tr role="row" class="even">
			                              <td class="col-1">{{ $key+1}}</td>
			                              <td class="col-2">
			                              	{{ date('Y-m-d H:i:s', strtotime($report->date)) }}	
			                              </td>
			                              <td class="col-2">
			                              	{{ \App\Models\User::where('id', $report->user_id)->first()->username }}
			                              </td>
			                              <td>{{ $report->lp }}</td>
			                              <td>{{ $report->rp }}</td>
			                              <td>{{ $report->lc }}</td>
			                              <td>{{ $report->rc }}</td>
			                              <td class="col-2">
			                              	  	{{ $report->income }}
			                              </td>
			                              @php
    				                        $amount+=$report->income;
    				                      @endphp
			                           </tr>
			                        @endforeach
		                        </tbody>
		                        <tfoot>
    			                    <tr>
    			                      <td colspan="7" style="font-weight: bold; text-align: right;">Total:</td>
    			                      <td style="font-weight: bold;">{{ $amount }}</td>
    			                    </tr>
    			                </tfoot>
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