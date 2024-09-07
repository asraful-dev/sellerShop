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
		               <h4 class="hr-text-left mb-6">Placement View</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>Placement View</code></p>
		                  </div>
                          <div class="text-center">
                            @php
                                $placement_count = App\Models\User::where('left_placement', Auth::user()->id)->count();
                            @endphp
                            <h3>Username: {{ Auth::user()->name ?? 'Null'}} </h3>
                          </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table">
		                    <table id="" class="table table-striped table-bordered table-responsive-sm">
		                        <tbody>
                                    <tr>
                                        @foreach ($placement_all as $key =>  $item)
                                            <td>{{ $item->username }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach ($placement_all as $key =>  $item)
                                            @php
                                                $placement_count = App\Models\User::where('left_placement', $item->id)->count();
                                            @endphp
                                            <td>{{ $placement_count ?? '0' }}</td>
                                        @endforeach
                                    </tr>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
                    <div class="px-4 px-md-6 mt-5">
                        <h3>Placement Rank List:</h3>
		                <div class="data_table">
		                    <table id="" class="table table-striped table-bordered table-responsive-sm">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>Ranerk</th>
		                                <th>Rank(k)</th>
		                                <th>Rank(k1)</th>
                                        <th>Rank(k2)</th>
		                                <!--<th>Genaration</th>-->
                                        <th>Status</th>
		                            </tr>
		                        </thead>
		                        <tbody>
                                    @php
                                        $placement_count = App\Models\User::where('left_placement', Auth::user()->id)->count();
                                    @endphp
                                    <tr role="row" class="even">
                                        <td>R1</td>
                                        <td>1000</td>
                                        <td>1000</td>
                                        <!--<td>1000</td>-->
                                        <td>3.000R</td>
                                        <td>
                                            {{-- placement check if condition with count 3 --}}
                                            @if($placement_count >= 3)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked  id="flexCheckDefault">
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>R2</td>
                                        <td>10k</td>
                                        <td>10k</td>
                                        <td>10k</td>
                                        <!--<td>3.000R</td>-->
                                        <td>
                                            @if($placement_count >= 10)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""   id="flexCheckDefault">
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>R3</td>
                                        <td>50k</td>
                                        <td>50k</td>
                                        <td>50k</td>
                                        <!--<td>20.00R</td>-->
                                        <td>
                                            @if($placement_count >= 20)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""   id="flexCheckDefault">
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>R4</td>
                                        <td>50k</td>
                                        <td>50k</td>
                                        <td>50k</td>
                                        <!--<td>20.00R</td>-->
                                        <td>
                                            @if($placement_count >= 50)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""   id="flexCheckDefault">
                                            </div>
                                            @endif
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
