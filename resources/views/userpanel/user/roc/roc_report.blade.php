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
		            	@php
		            		use Carbon\Carbon;
		            		$today = $carbon=Carbon::now();
		            	@endphp
		               <h4 class="hr-text-left mb-6">ROC Report</h4>
		               <h4 class="hr-text-left mb-3 mr-3" style="float:right;">TodayDay Name: {{ $carbon->format('l'); }}</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>User Roc Report List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table">
		                    <table id="example" class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>In Time</th>
		                                <th>Username</th>
		                                <th>Daily Roc</th>
		                                <!-- <th>Action</th> -->
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@php
				                       $amount=0;
				                    	@endphp
		                        	@foreach ($rocReport as $key =>  $report)
		                            <tr role="row" class="even">
			                              <td class="col-1">{{ $key+1}}</td>
			                              <td class="col-2">
			                              	{{ date('Y-m-d H:i:s', strtotime($report->created_at)) }}
			                              </td>
			                              <td class="col-2">
			                              	{{ \App\Models\User::where('id', $report->user_id)->first()->username }}
			                              </td>
			                               <td class="col-2">
			                               	@php
										              	$current_user = Auth::User()->id;
										              	$roc_report = App\Models\User::where('id', $current_user)->where('updated_at', '>=', \Carbon\Carbon::today())->sum('roc');

										            @endphp
			                              	  	{{ $roc_report }}
			                              	  	@php
							                        	$amount+=$roc_report;
							                      	@endphp
			                              	</td>
			                              	<!-- <td class="col-2">
			                              		<a href="#" class="btn btn-danger btn-rounded" id="delete"><i class="icon-cross"></i>Delete</a>
			                              	</td> -->
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
<!-- sweetalerat delete data -->
 <script type="text/javascript">
    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Request!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Send it!'
        }).then((result) => {
           if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
        });
    });
</script>

@endsection