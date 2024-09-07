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
		               <h4 class="hr-text-left mb-6">User Team Count</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>User Team Count List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table">


		                    <table id="example" class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>User Details</th>
		                                <th>Refer By</th>
		                                <th>Package Amount</th>
		                                <th>View</th>
		                            </tr>
		                        </thead>
		                        <tbody>	
		                        	@foreach ($users as $user)
	                                    @foreach ($user as $single)
	                                     	<tr role="row" class="even">
	                                            <td>{{ $loop->iteration }}</td>
	                                            <td>{{ $single->name }} ({{ $single->username }})</td>
	                                            @php
	                                            	$user_id = Auth::user()->id;
	                                            @endphp
	                                            <td>
	                                            	{{ \App\Models\User::where('id', $single->refer_by)->first()->username }}
	                                            </td>
	                                            <td>{{ config('default.currency') . $single->packages->sum('amount') }}</td>
	                                            <td><a href="{{ route('user.team.view.bettings', $single->id) }}" class="btn btn-sm btn-info">View</a></td>
	                                        </tr>
	                                    @endforeach
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