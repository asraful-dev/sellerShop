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
		               <h4 class="hr-text-left mb-6">Buy Package List</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>User Buy Package List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table table-responsive">
		                    <table id="example" class="table table-striped table-bordered table-responsive-sm">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>In Time</th>
		                                <th>Username</th>
		                                <th>Package Name</th>
		                                <th>Package Point</th>
		                                <th>Package Amount</th>
		                            </tr>
		                        </thead>
		                        <tbody>	
		                        	@foreach ($buypackageReport as $key =>  $report)
		                            <tr role="row" class="even">
			                              <td class="col-1">{{ $key+1}}</td>
			                              <td class="col-2">
			                              	{{ date('Y-m-d H:i:s', strtotime($report->created_at)) }}	
			                              </td>
			                              <td class="col-2">
			                              	{{ \App\Models\User::where('id', $report->user_id)->first()->username }}
			                              </td>
			                              <td>{{ $report->package_name }}</td>
			                              <td>{{ $report->package_point ?? '0' }}</td>
			                               <td class="col-2">
			                              	  	{{ $report->amount }}
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