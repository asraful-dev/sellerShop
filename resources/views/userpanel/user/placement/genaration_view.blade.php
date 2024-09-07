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
		               <h4 class="hr-text-left mb-6">Genaration View</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>Genaration View</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table">
		                    <table id="example" class="table table-striped table-bordered table-responsive-sm">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>Rank</th>
		                                <th>Rank(k)</th>
		                                <th>Rank(k1)</th>
                                        <th>Rank(k2)</th>
		                                <!--<th>Genaration</th>-->
                                        <th>Status</th>
		                            </tr>
		                        </thead>
		                        <tbody>
                                    <tr role="row" class="even">
                                        <td>R1</td>
                                        <td>1000</td>
                                        <td>1000</td>
                                        <td>1000</td>
                                        <!--<td>3.000R</td>-->
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked  id="flexCheckDefault">
                                              </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>R2</td>
                                        <td>10k</td>
                                        <td>10k</td>
                                        <td>10k</td>
                                        <!--<td>3.000R</td>-->
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked  id="flexCheckDefault">
                                              </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>R3</td>
                                        <td>50k</td>
                                        <td>50k</td>
                                        <td>50k</td>
                                        <!--<td>20.00R</td>-->
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked  id="flexCheckDefault">
                                              </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>R4</td>
                                        <td>50k</td>
                                        <td>50k</td>
                                        <td>50k</td>
                                        <!--<td>20.00R</td>-->
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked  id="flexCheckDefault">
                                              </div>
                                        </td>
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


@endsection
