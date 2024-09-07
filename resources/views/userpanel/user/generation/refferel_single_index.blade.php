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
		               <h4 class="hr-text-left mb-6">Referral List</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>User Referral List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		               	<div class="data_table">
		                    <table id="example" class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>Joining Date</th>
		                                <th>Username</th> 
		                                <th>Mobile</th>
		                                <th>Email</th>
		                                <th>Amount</th>
		                                <th>Status</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@foreach ($single_all_user as $key =>  $refferel_user)
		                            <tr>
		                                <td>{{ $key+1}}</td>
		                                <td>
		                                    {{ date('Y-m-d H:i:s', strtotime($refferel_user->created_at)) }}
		                                </td>
		                                <td>
											<a href="#" class="btn btn-success btn-sm">{{ $refferel_user->username }}</a>
		                                </td> 
		                                <td> {{ $refferel_user->phone }}</td>
		                               	<td>{{ $refferel_user->email }}</td>
		                               	<td>{{ $refferel_user->main_wallet ?? '0' }}</td>
		                               	<td>
		                               		@if($refferel_user->active_status == 1)
                                                <a class="my-3 mx-1 btn btn-round btn-danger"><i class="icon-check"></i>  Active</a>
                                            @else
                                                <a class="my-3 mx-1 btn btn-round btn-warning"><i class="icon-cross"></i>  Inactive</a>
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