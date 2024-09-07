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
		               <h4 class="hr-text-left mb-6">Rank & Incentive</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>Rank & Incentive List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table table-responsive">
		                    <table id="example" class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>Stauts</th>
		                                <th>Designation</th>
		                                <th>Achievement</th>
		                                <th>Reward</th>
		                                <th>Global Share</th>
		                                <th>Sponsor</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                            	<tr role="row" class="even">
			                              <td class="col-1">1</td>
			                              <td class="col-1">0</td>
			                              <td class="col-1">Awual</td>
			                              <td class="col-1">$1000</td>
			                              <td class="col-1">$10</td>
			                              <td class="col-1">--</td>
			                              <td class="col-1">2 Direct Sponser</td>
			                           </tr>
			                           <tr role="row" class="even">
			                              <td class="col-1">2</td>
			                              <td class="col-1">0</td>
			                              <td class="col-1">Sunny</td>
			                              <td class="col-1">$500</td>
			                              <td class="col-1">$100</td>
			                              <td class="col-1">1%</td>
			                              <td class="col-1">3 Direct Sponser</td>
			                           </tr>
			                           <tr role="row" class="even">
			                              <td class="col-1">3</td>
			                              <td class="col-1">0</td>
			                              <td class="col-1">Sales</td>
			                              <td class="col-1">$10000</td>
			                              <td class="col-1">$200</td>
			                              <td class="col-1">0.50%</td>
			                              <td class="col-1">4 Direct Sponser</td>
			                           </tr>
			                           <tr role="row" class="even">
			                              <td class="col-1">4</td>
			                              <td class="col-1">0</td>
			                              <td class="col-1">Rabi</td>
			                              <td class="col-1">$20000</td>
			                              <td class="col-1">$300</td>
			                              <td class="col-1">0.50%</td>
			                              <td class="col-1">5 Direct Sponser</td>
			                           </tr>
			                           <tr role="row" class="even">
			                              <td class="col-1">5</td>
			                              <td class="col-1">0</td>
			                              <td class="col-1">Khames</td>
			                              <td class="col-1">$100000</td>
			                              <td class="col-1">$2000</td>
			                              <td class="col-1">0.25%</td>
			                              <td class="col-1">6 Direct Sponser</td>
			                           </tr>
			                           <tr role="row" class="even">
			                              <td class="col-1">6</td>
			                              <td class="col-1">0</td>
			                              <td class="col-1">Sades</td>
			                              <td class="col-1">$200000</td>
			                              <td class="col-1">$4000</td>
			                              <td class="col-1">0.50%</td>
			                              <td class="col-1">7 Direct Sponser</td>
			                           </tr>
			                           <tr role="row" class="even">
			                              <td class="col-1">7</td>
			                              <td class="col-1">0</td>
			                              <td class="col-1">Sabeya</td>
			                              <td class="col-1">$400000</td>
			                              <td class="col-1">$8000</td>
			                              <td class="col-1">0.25%</td>
			                              <td class="col-1">8 Direct Sponser</td>
			                           </tr>
			                           <tr role="row" class="even">
			                              <td class="col-1">8</td>
			                              <td class="col-1">0</td>
			                              <td class="col-1">Samenn</td>
			                              <td class="col-1">$1000000</td>
			                              <td class="col-1">$15000</td>
			                              <td class="col-1">0.25%</td>
			                              <td class="col-1">10 Direct Sponser</td>
			                           </tr>
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