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
		                     <p class="mb-0"><code>User Tean Count List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table table-responsive">

	                        <table id="" class="table table-striped table-bordered">
	                            <thead>
	                                <tr>
	                                    <th class="text-center">Generation</th>
	                                    <th class="text-center">User Count</th>
	                                    <th class="text-center">Sales</th>
	                                </tr>
	                            </thead>
	                            <tbody class="text-center align-middle">
	                                <tr>
	                                    <td>1<sup>st</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 1) }}">{{ $first_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($first_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>2<sup>nd</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 2) }}">{{ $second_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($second_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>3<sup>rd</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 3) }}">{{ $third_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($third_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>4<sup>th</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 4) }}">{{ $forth_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($forth_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>5<sup>th</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 5) }}">{{ $fifth_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($fifth_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>6<sup>th</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 6) }}">{{ $sixth_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($sixth_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>7<sup>th</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 7) }}">{{ $seventh_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($seventh_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>8<sup>th</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 8) }}">{{ $eight_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($eight_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>9<sup>th</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 9) }}">{{ $nineth_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($nineth_total_sum, 2) }}</td>
	                                </tr>
	                                <tr>
	                                    <td>10<sup>th</sup> Level</td>
	                                    <td><a class="btn btn-sm btn-info" href="{{ route('user.team.view', 10) }}">{{ $tenth_count_sum ?? 0 }}</a></td>
	                                    <td>{{ config('default.currency') . number_format($tenth_total_sum, 2) }}</td>
	                                </tr>
	                            </tbody>
	                            <tfoot>
				                    <tr>
				                      <td colspan="2" style="font-weight: bold; text-align: right;">Total:</td>
				                      <td style="font-weight: bold;">{{ config('default.currency') . number_format($myScore, 2) }}</td>
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