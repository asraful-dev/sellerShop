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
		               <h4 class="hr-text-left mb-6">My Purchase Orders</h4>
		               <div class="px-4 px-md-6 mb-6">
		                  <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
		                     <p class="mb-0"><code>My Orders List</code></p>
		                  </div>
		               </div>
		            </div>
		            <div class="px-4 px-md-6">
		                <div class="data_table table-responsive">
		                    <table id="example" class="table table-striped table-bordered">
		                        <thead class="table-dark">
		                            <tr>
		                                <th>SL</th>
		                                <th>Order Invoice No</th>
                                        <th>Date & Time</th>
								
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th colspan="2">Actions</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@if($orders->count() > 0)
		                        		@foreach($orders as $key=> $order)
		                            	<tr role="row" class="even">
		                              		<td class="col-1">{{ $key+1}}</td>
		                              		<td class="col-2">{{ $order->invoice_no }}</td>
                                            <td class="col-2">
                                                {{ \Carbon\Carbon::parse($order->date)->isoFormat('MMM Do YYYY')}}
                                            </td>
											@php
												$order_details = App\Models\OrderDetail::where('order_id',$order->id)->first();
												$product = App\Models\Product::where('id',$order_details->product_id ?? 'Null')->first();
											@endphp
											
                                            <td>৳{{ $order->grand_total }}</td>
                                            <td class="col-2">
                                            	@if($order->delivery_status == 'pending')
													<div class="btn btn-sm btn-warning btn-round px-4">
                                                		Pending
                                                	</div>
												@elseif($order->delivery_status == 'confirmed')
													<div class="btn btn-sm btn-warning btn-round px-4">
														Confirmed
													</div>
												@elseif($order->delivery_status == 'shipped')
													<div class="btn btn-sm btn-warning btn-round px-4">
														Shipped
													</div>
												@elseif($order->delivery_status == 'picked_up')
													<div class="btn btn-sm btn-warning btn-round px-4">
	                                                	Picked Up
	                                                </div>
	                                            @elseif($order->delivery_status == 'on_the_way')
													<div class="btn btn-sm btn-warning btn-round px-4">
	                                                	On The Way
	                                                </div>
	                                            @elseif($order->delivery_status == 'delivered')
													<div class="btn btn-sm btn-warning btn-round px-4">
	                                                	Delivered
	                                                </div>
	                                            @elseif($order->delivery_status == 'cancel')
													<div class="btn btn-sm btn-danger btn-round px-4">
	                                                	Cancel
	                                                </div>
												@endif
                                            </td>
		                              		<td colspan="2">
                                                <a href="{{ route('order.view',$order->invoice_no) }}" class="mx-1 btn btn-round btn-primary">View</a>
                                                <a href="{{ route('order.invoice.download',$order->id) }}" class="mx-1 btn btn-round btn-danger">Invoice</a>
                                            </td>
			                         	</tr>
			                        	@endforeach
			                        @else
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>
                                                <span class="text-center text-white">Your Order Empty!</span>
                                            </td>
                                        </tr>
                                    @endif
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