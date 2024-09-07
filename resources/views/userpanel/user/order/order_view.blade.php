@extends('layouts.userpanel')
@section('user_content')
<div class="overflow-hidden">
	<div id="dashboard" >
		<div class="d-flex align-items-center px-6 py-5">
		  <!-- <div class="text-light mr-auto">
		    <h2 class="fw-100 mb-0">Tables</h2>
		    <span class="lead-1 text-info">Styling of tables.</span>
		  </div> -->
		</div>
		<!--start breadcrumb-->
		<div class="container-fluid p-0">
		    <div class="row panel-top-line">
		    	<div class="col">
		        	<div class="py-7">
		        		<div class="mb-7">
			        		<h4 class="hr-text-left mb-6">Order</h4>
				            <div class="px-4 px-md-6 mb-6">
				                <div class="alert alert-no-bg alert-theme bg-light_A-5" role="alert">
				                    <p class="mb-0"><code>Order List</code></p>
				                </div>
				            </div>
			            </div>
			            <div class="px-4 px-md-6">
			            	<section class="py-4">
								<div class="container">
									<div class="invoice invoice-content invoice-3">
								        <div class="container">
								            <div class="row">
								                <div class="col-lg-12">
								                    <div class="invoice-inner">
								                        <div class="invoice-info" id="invoice_wrapper">
								                            <div class="invoice-top">
								                                <div class="row">
								                                    <div class="col-lg-4 col-md-6">
								                                        <div class="invoice-number">
								                                            <h4 class="invoice-title-1 mb-5">Invoice To</h4>
								                                            <p class="invoice-addr-1 text-capitalize">
								                                            	Name:
								                                                <strong>{{ get_setting('business_name')->value ?? 'Null'}}</strong> <br />
								                                                 Email: <strong>{{ get_setting('email')->value ?? 'Null'}}</strong><br>
								                                                  Phone: <strong>{{ get_setting('phone')->value ?? 'Null'}}</strong> <br>
								                                                Address:<strong> {{ get_setting('business_address')->value ?? 'Null'}}</strong>
								                                               <br>
								                                            </p>
								                                        </div>
								                                    </div>
								                                    <div class="col-lg-4 col-md-6">
								                                        <div class="invoice-number">
								                                            <h4 class="invoice-title-1 mb-5">Bill To</h4>
								                                            <p class="invoice-addr-1 text-capitalize">
								                                            	Name:
								                                                <strong>{{ $order->user->name ?? 'NULL' }}</strong> <br />
								                                                Email: <strong>{{ $order->user->email }}</strong><br>
								                                                Phone: <strong>{{ $order->user->phone ?? 'NULL' }}</strong><br>
								                                                Union: <strong>{{ ucwords($order->union->name_en ?? 'Null' ) }}</strong> <br /> Upazilla: <strong>{{ ucwords($order->upazilla->name_en ?? 'Null' ) }}</strong> <br />
                                												District: <strong>{{ ucwords($order->district->name_en ?? 'Null') }}</strong><br />
                                												Division: <strong>{{ ucwords($order->division->name_en ?? 'Null') }}</strong><br>
                                												Address:
								                                                <strong>{{ $order->address ?? 'NULL' }}</strong> <br>
								                                            </p>
								                                        </div>
								                                    </div>
								                                    <div class="col-lg-4 col-md-6">
								                                        <div class="invoice-number">
								                                            <h4 class="invoice-title-1 mb-5">Overview</h4>
								                                            <p class="invoice-addr-1 text-capitalize ">
								                                                Invoice No:<strong> {{ $order->invoice_no?? 'Null'}}</strong><br />
								                                                Invoice Date:<strong> {{ \Carbon\Carbon::parse($order->date)->isoFormat('MMM Do YYYY')}}</strong><br />
								                                                Payment Method: <strong> {{ $order->payment_method }}</strong><br />
								                                                Status:<strong> {{ $order->delivery_status }}</strong>
								                                            </p>
								                                        </div>
								                                    </div>
								                                </div>
								                            </div>
								                            <div class="invoice-center table-responsive ">
								                                <div>
								                                	<div class="data_table table-responsive">
								                                    	<table id="example" class="table table-striped table-bordered">
								                                        <thead class="bg-active">
								                                            <tr>
								                                                <td class="col-md-1">
																	                <label>Image </label>
																	            </td>
																	            <td class="col-3">
																	                <label>Product Name </label>
																	            </td>
																	            <td class="col-1">
																	                <label>Product Code  </label>
																	            </td>
																	         
																	            <td class="col-md-1">
																	                <label>Color </label>
																	            </td>
																	            <td class="col-md-1">
																	                <label>Size </label>
																	            </td>
																	            <td class="col-1">
																	                <label>Price  </label>
																	            </td>
																	            <td class="col-1">
																	                <label>Quantity </label>
																	            </td>
																	            <td class="col-1">
																	                <label>Total Price </label>
																	            </td>

								                                            </tr>
								                                        </thead>
								                                        <tbody>
							                                                @foreach($order->order_details as $order_detail)
							                                                <tr>
							                                                	<td class="col-md-1">
																	                <label>
																	                	<img src="{{ asset($order_detail->product->product_thumbnail) }}" style="width:50px; height:50px;" > </label>
																	            </td>
																	            <td class="col-2">{{$order_detail->product->name_en}}</td>
																	            <td class="col-1">{{$order_detail->product->product_code}}</td>
																	         
							                                                  

							                                                    <td class="col-1">{{$order_detail->color ?? 'Null'}}</td>

							                                                    <td class="col-1">{{$order_detail->size ?? 'Null'}}</td>

							                                                    <td class="text-center">৳{{$order_detail->
							                                                    price ?? 'NULL'}}</td>

							                                                    <td class="text-center">{{$order_detail->
							                                                    qty ?? 'NULL'}}</td>

							                                                    
							                                                    <td class="text-right">৳{{ $order_detail->price * $order_detail->qty ?? '0' }} </td>
							                                                </tr>
							                                                @endforeach
							                                                <tr class="">
							                                                    <td colspan="7" class="text-end f-w-600">SubTotal:</td>
							                                                    <td class="text-right">৳{{ $order->grand_total ?? 'NULL' }}</td>
							                                                </tr>
							                                                <tr>
							                                                    <td colspan="7" class="text-end f-w-600">Grand Total:</td>
							                                                    <td class="text-right f-w-600">৳{{ $order->grand_total ?? 'NULL' }}</td>
							                                                </tr>
								                                        </tbody>
								                                    </table>
								                                </div>
								                            </div>
								                            <div class="invoice-bottom">
								                                <div class="row">
								                                    <div class="col-sm-6">
								                                        <div>
								                                            <h3 class="invoice-title-1">Important Note</h3>
								                                            <ul class="important-notes-list-1">
								                                                <li>All amounts shown on this invoice are in BDT</li>
								                                                <li>finance charge of 1.5% will be made on unpaid balances after 30 days.</li>
								                                                <li>Once order done, money can't refund</li>
								                                                <li>Delivery might delay due to some external dependency</li>
								                                            </ul>
								                                        </div>
								                                    </div>
								                                    <div class="col-sm-6 col-offsite">
								                                        <div class="text-end">
								                                            <p class="mb-0 text-13">Thank you for your business</p>
								                                            <p><strong>{{ get_setting('business_name')->value ?? 'Null'}}</strong></p>
								                                        </div>
								                                    </div>
								                                </div>
								                            </div>
								                        </div>
								                    </div>
								                </div>
								            </div>
								        </div>
									</div>
								</div>
							</section>
			            </div>
		         	</div>
		        </div>
		    </div>
		</div>
		<!--end breadcrumb-->
	</div>
</div>
@endsection