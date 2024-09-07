@extends('layouts.frontend')
@section('content-frontend')
@section('title')
    My Checkout Page
@endsection
<div class="ps-page--simple">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Account</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
    <style>
        .breadcrumb {
            background-color: #167649;
            border-radius: 1.25rem;

        }

        .name_border_color {
            height: 37px !important;
        }

        .select2-container--default .select2-selection--single {
            height: 37px !important;
        }

        .ps-btn,
        button.ps-btn {
            background-color: #ff0303;
        }

        .ps-btn,
        button.ps-btn:hover {
            background-color: #ff0303;
        }
    </style>
    <section class="ps-section--account ps-checkout">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12">
                    @php
                        $checkout_notice = App\Models\CheckoutNotice::where('status', 1)
                            ->take(1)
                            ->get();
                    @endphp
                    @foreach ($checkout_notice as $notice)
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <h3 style="color: #fff; text-align:center;">{{ $notice->title }}</h3>
                                <p style="text-align:justify; color:#fff;">
                                    {{ $notice->description }}
                                </p>
                            </ol>
                        </nav>
                    @endforeach
                </div>
            </div>
            @php
                $checkout_setting = App\Models\ChekoutSetting::where('status', 1)
                    ->latest()
                    ->get();
            @endphp
            @foreach ($checkout_setting as $setting)
                @if ($setting->status == 1 && $setting->slug == 'order-click')
                    <div class="ps-section__header">
                        <a href="{{ route('home') }}" class="ps-btn">আরও অর্ডার করতে এখানে ক্লিক করুন</a>
                    </div>
                @endif
            @endforeach
            <div class="ps-section__content">
                <form class="ps-form--checkout" action="{{ route('checkout.payment') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="ps-form__content">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-form__billing-info">
                                    {{-- <h3 class="ps-form__heading">Shipping Address</h3> --}}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <input name="name" class="form-control name_border_color"
                                                    type="text" placeholder="আপনার নাম লিখুন"
                                                    value="{{ Auth::user()->name ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Your Phone:</label>
                                                <input name="phone" class="form-control name_border_color"
                                                    type="text" placeholder="আপনার ফোন লিখুন"
                                                    value="{{ Auth::user()->phone ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $checkout_setting = App\Models\ChekoutSetting::latest()->get();
                                    @endphp
                                    @foreach ($checkout_setting as $setting)
                                        <div class="row">
                                            @if ($setting->status == 1 && $setting->slug == 'username')
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input name="username" class="form-control name_border_color"
                                                            type="text" placeholder="Enter Your Username"
                                                            value="{{ Auth::user()->username ?? '' }}">
                                                    </div>
                                                </div>
                                            @elseif($setting->status == 1 && $setting->slug == 'email')
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input name="email" class="form-control name_border_color"
                                                            type="text" placeholder="Enter Your Email"
                                                            value="{{ Auth::user()->email ?? '' }}">
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach

                                    <div class="row">
                                        <!--========== Start Division Select All Data  ========-->
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Division:</label>
                                                <select class="ps-select" name="division_id" id="division_id"
                                                    class="form-control name_border_color"
                                                    style="width: 100% !important; border:1px solid black;">
                                                    <option value="">Select Division</option>
                                                    @foreach (get_divisions() as $division)
                                                        <option value="{{ $division->id }}">{{ $division->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--========== End Division Select All Data  ========-->

                                        <!--==== Start Division Select District All Data =====-->
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>District:</label>
                                                <select class="ps-select" name="district_id" id="district_id"
                                                    class="form-control name_border_color"
                                                    style="width: 100% !important;">
                                                    <option value="">Select District</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--==== End Division Select District All Data =====-->

                                        <!--==== Start District Select Upazilla All Data =====-->
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Upazilla:</label>
                                                <select class="ps-select" name="upazilla_id" id="upazilla_id"
                                                    class="form-control name_border_color"
                                                    style="width: 100% !important;">
                                                    <option value="">Select Upazilla</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--==== End District Select Upazilla All Data =====-->

                                        <!--==== Start Upazilla Select Unions All Data =====-->
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Unions:</label>
                                                <select class="ps-select" name="union_id" id="union_id"
                                                    class="form-control name_border_color"
                                                    style="width: 100% !important;">
                                                    <option value="">Select Unions</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--==== End Upazilla Select Unions All Data =====-->
                                    </div>
                                    {{-- <div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<div class="form-group">
													<label for="shipping_method">আপনার এরিয়া সিলেক্ট করুন</label>
													<select name="shipping_method" id="shipping_method" class="form-control" required="">
															<option value="2">ঢাকার বাইরে</option>
															<option value="3">ঢাকার ভিতরে</option>
													</select>
												</div>
											</div>
										</div>
									</div> --}}
                                    {{-- <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input class="form-control" name="text" type="text" placeholder="Enter Your Country">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Post Code</label>
                                                <input class="form-control" name="post_code" type="text" placeholder="Enter Post Code">
                                            </div>
                                        </div>
                                    </div> --}}
                                    @php
                                        $checkout_notice = App\Models\CheckoutNotice::where('status', 1)
                                            ->take(1)
                                            ->skip(1)
                                            ->get();
                                    @endphp

                                    @foreach ($checkout_notice as $notice)
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <h3 style="color: #fff; text-align:center;">
                                                            {{ $notice->title }}</h3>
                                                        <p style="text-align:justify; color:#fff;">
                                                            {{ $notice->description }}</p>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Transaction NO</label>
                                                    <input class="form-control" name="transaction_no" type="text"
                                                        placeholder="Enter Your transaction no">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Payment No</label>
                                                    <input class="form-control" name="payment_no" type="text"
                                                        placeholder="Enter your payment no">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach ($checkout_setting as $setting)
                                        <div class="row">
                                            @if ($setting->status == 1 && $setting->slug == 'address')
                                                <div class="col-sm-12">
                                                    <div class="form-group ">
                                                        <label>Shipping Address</label>
                                                        <textarea name="address" id="" cols="10" rows="5" class="form-control name_border_color1"
                                                            placeholder="আপনার পূর্ণাঙ্গ ঠিকানা লিখুন" required></textarea>
                                                    </div>
                                                </div>
                                            @elseif($setting->status == 1 && $setting->slug == 'keep_up')
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="ps-checkbox">
                                                            <input class="form-control" type="checkbox"
                                                                id="save-next-time" placeholder="">
                                                            <label for="save-next-time">Keep me up to date on news and
                                                                exclusive offers?</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                    {{-- <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Screenshot</label>
												<input type="file" name="screenshot" id="screenshot" class="form-control screenshot" >
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-sm-12">
											<img width="100px" height="80px" class="mt-3 mb-5" src="{{ asset('upload/no_image.jpg') }}" id="item_output" alt="">
										</div>
									</div> --}}
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                <div class="ps-block--checkout-order">
                                    <div class="ps-block__content">
                                        <figure>
                                            <figcaption><strong>Product</strong><strong>Total</strong></figcaption>
                                        </figure>
                                        <!-- Start Product All Data Show -->
                                        @forelse($carts as $item)
                                            <figure class="ps-block__items">
                                                <a href="#">
                                                    <img src="{{ asset($item->options->image) }}" width="50"
                                                        alt="item">
                                                    <strong>
                                                        <?php $p_name_bn = strip_tags(html_entity_decode($item->name)); ?>
                                                        {{ Str::limit($p_name_bn, $limit = 20, $end = '. . .') }}<br>
                                                        <small>
                                                            <strong>Color:</strong>
                                                            {{ $item->options->color ?? 'Null' }}
                                                        </small>
                                                        <small>
                                                            <strong>Size:</strong>{{ $item->options->size ?? 'Null' }}
                                                        </small></br>
                                                        {{-- <small>
                         								<strong>Point:</strong>{{ $item->options->ppoint ?? '0' }}
                         							</small> --}}
                                                    </strong>
                                                    <span class="me-2">
                                                        <small>৳{{ $item->price }}</small>
                                                        <span>x {{ $item->qty }}</span>
                                                    </span>=
                                                    <span class="me-2">
                                                        <small>৳{{ $item->total }}</small>
                                                    </span>
                                                </a>
                                            </figure>
                                        @empty
                                            <span class="text-white text-center">
                                                Your Cart empty!
                                            </span>
                                        @endforelse
                                        <!-- End Product All Data Show -->

                                        <!-- Start Product Coupon/Subtotal Data Show -->
                                        @if (Session::has('coupon'))
                                            {{-- <figcaption>
                                        	<strong>Total Product Point</strong>
                                        	    @php
            				                       $ppoint=0;
            				                    @endphp

            				                    @foreach ($carts as $item)
                                            		@php
            				                        	$ppoint+=$item->options->ppoint;
            				                      	@endphp
        				                      	@endforeach
                                        	<strong>{{ $ppoint ?? '0' }}</strong>
                                        </figcaption></hr> --}}
                                            <figure>
                                                <figcaption>
                                                    <strong>Total:</strong>
                                                    <strong>৳{{ $cartTotal }}</strong>
                                                </figcaption>
                                                <figcaption>
                                                    <strong>Subtotal:</strong>
                                                    <strong>৳{{ $cartTotal }}</strong>
                                                </figcaption>

                                                <!-- <figcaption>
                                            <strong>Shipping</strong>
                                            <strong>0</strong>
                                        </figcaption> -->

                                                <div class="my-3 border-top"></div>
                                                <figcaption>
                                                    <strong>Coupon Name & Percent:</strong>
                                                    <small class="text-success font-weight-bolder">
                                                        {{ session()->get('coupon')['coupon_name'] }}
                                                    </small>
                                                    <small class="text-danger font-weight-bolder">
                                                        ({{ session()->get('coupon')['coupon_discount'] }}%)
                                                    </small>
                                                </figcaption>

                                                <figcaption>
                                                    <strong>Coupon Discount:</strong>
                                                    <small class="text-danger font-weight-bolder">
                                                        ৳{{ session()->get('coupon')['discount_amount'] }}
                                                    </small>
                                                </figcaption>

                                                <div class="my-3 border-top"></div>
                                                <figcaption>
                                                    <strong>Order Total:</strong>
                                                    <input type="hidden" name="cart_all_total"
                                                        class="order_total_amount"
                                                        value="{{ $cartTotal ?? '0.00' }}">
                                                    <input type="hidden" name="shipping_order_total" class=""
                                                        value="">
                                                    <strong class="order_total">
                                                        ৳{{ session()->get('coupon')['total_amount'] ?? '0.00' }}
                                                    </strong>
                                                </figcaption>
                                            </figure>
                                        @else
                                            <figure>
                                                {{-- <figcaption>
	                                            	<strong>Total Product Point</strong>
	                                            	    @php
                    				                       $ppoint=0;
                    				                    @endphp

                    				                    @foreach ($carts as $item)
    	                                            		@php
                    				                        	$ppoint+=$item->options->ppoint;
                    				                      	@endphp
                				                      	@endforeach
	                                            	<strong>{{ $ppoint ?? '0' }}</strong>
	                                            </figcaption></hr> --}}
                                                <figcaption>
                                                    <strong>Total(টোটাল):</strong>
                                                    <strong class="total">৳{{ $cartTotal }}</strong>
                                                </figcaption>
                                                <figcaption>
                                                    <strong>Subtotal(টোটাল):</strong>
                                                    <strong>৳{{ $cartTotal }}</strong>
                                                </figcaption>
                                                <figcaption>
                                                    <strong style="display:none;">Delivery Charge(ডেলিভারি
                                                        চার্জ):</strong>
                                                    <input type="hidden" name="ship_charge" class="ship_charge_val"
                                                        value="">
                                                    <strong class="ship_charge" style="display:none;">৳0</strong>
                                                </figcaption>
                                            </figure>

                                            <figure>
                                                <figcaption>
                                                    <strong>Order Total(অর্ডার টোটাল):</strong>
                                                    <input type="hidden" name="cart_all_total"
                                                        class="order_total_amount"
                                                        value="{{ $cartTotal ?? '0.00' }}">
                                                    <input type="hidden" name="shipping_order_total"
                                                        class="shipping_order_total" value="">
                                                    <strong class="order_total">
                                                        ৳{{ $cartTotal ?? '0.00' }}
                                                    </strong>
                                                </figcaption>
                                            </figure>
                                        @endif
                                        <!-- End Product Coupon/Subtotal Data Show -->
                                    </div>

                                    {{-- <div class="col-sm-12 mt-5">
                                        <div class="form-group">
                                              <label>Fund Wallet:</label>
                                              <input type="text" class="form-control" name="fund_wallet" value="{{ Auth::user()->fund_wallet ?? '0'}}" disabled>
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Delivery Type:</label>
                                            <select class="ps-select" name="resell_type" id="resell"
                                                class="form-control" style="width: 100% !important;" required>
                                                <option value="">Select Delivery Item</option>
                                                <option value="1">By Curier</option>
                                                <option value="2">From Reseller</option>
                                                <option value="3">From Agent Point</option>
                                            </select>
                                        </div>
                                    </div>
                                    <h5 class="text-danger p-2">Select a payment option:</h5>
                                    <style type="text/css">
                                        .aiz-megabox>input:checked~.aiz-megabox-elem,
                                        .aiz-megabox>input:checked~.aiz-megabox-elem {
                                            border-color: #e62e04;
                                        }

                                        .aiz-megabox .aiz-megabox-elem {
                                            border: 1px solid #6ce2b1;
                                            border-radius: 0.25rem;
                                            -webkit-transition: all 0.3s ease;
                                            transition: all 0.3s ease;
                                            border-radius: 0.25rem;
                                            cursor: pointer;
                                        }

                                        .p-3 {
                                            padding: 1rem !important;
                                        }

                                        .d-block {
                                            display: block !important;
                                        }

                                        [type='radio'] {
                                            display: none;
                                        }
                                    </style>
                                    <div class="ps-block__content">
                                        <!-- Start Product Payment Method Show -->
                                        <div class="card-body">
                                            <div class="row mt-3">
                                                <div class="col-xxl-8 col-xl-12">
                                                    <div class="row gutters-10">
                                                        {{-- <div class="col-6 col-md-6">
												            <label class="aiz-megabox d-block mb-3">
													            <input value="bkash" class="online_payment" type="radio"
													               name="payment_option" checked style="cursor:pointer;">
													            <span class="d-block aiz-megabox-elem p-3">
														            <img src="{{ asset('frontend/payment/bkash.png') }}"
														               class="img-fluid mb-2">
														            <span class="d-block text-center">
														            	<span
														               		class="d-block fw-600 fs-15">Bkash
														               	</span>
													            	</span>
													            </span>
												            </label>
												        </div>
											      		<div class="col-6 col-md-6">
												            <label class="aiz-megabox d-block mb-3">
													            <input value="nagad" class="online_payment" type="radio"
													               name="payment_option" checked>
														        <span class="d-block aiz-megabox-elem p-3">
														            <img src="{{ asset('frontend/payment/nagad.png') }}"
														               class="img-fluid mb-2">
														            <span class="d-block text-center">
														            	<span
														               		class="d-block fw-600 fs-15">Nagad
														               	</span>
													            	</span>
													            </span>
											            	</label>
											        	</div>
													    <div class="col-6 col-md-6">
												            <label class="aiz-megabox d-block mb-3">
													            <input value="sslcommerz" class="online_payment" type="radio"
													               name="payment_option" checked>
														        <span class="d-block aiz-megabox-elem p-3">
														            <img src="{{ asset('frontend/payment/sslcommerz.png') }}"
														               class="img-fluid mb-2">
														            <span class="d-block text-center">
														            	<span
														               		class="d-block fw-600 fs-15">sslcommerz
														           		</span>
													            	</span>
													            </span>
												            </label>
												        </div> --}}
                                                        <div class="col-6 col-md-6">
                                                            <label class="aiz-megabox d-block mb-3">
                                                                <input value="cash_on_delivery" class="online_payment"
                                                                    type="radio" name="payment_option" checked>
                                                                <span class="d-block aiz-megabox-elem p-3">
                                                                    <img src="{{ asset('frontend/payment/cod.png') }}"
                                                                        class="img-fluid mb-2">
                                                                    <span class="d-block text-center">
                                                                        <span class="d-block fw-600 fs-15">Cash On
                                                                            Delivery
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Payment Method Show -->
                                    </div>
                                    <button type="submit" class="ps-btn ps-btn--fullwidth">
                                        অর্ডার কনফার্ম করুন
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@push('footer-script')
    <!--===============  Start Division To District Show Ajax ===============-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/division-district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="district_id"]').html(
                                '<option value="" selected="" disabled="">Select District</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    capitalizeFirstLetter(value.name_en) +
                                    '</option>');
                            });
                            $('select[name="upazilla_id"]').html(
                                '<option value="" selected="" disabled="">Select District</option>'
                            );
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

        });
    </script>
    <!--===============  End Division To District Show Ajax ===============-->

    <!--===============  Start  District To Upazilla Show Ajax ===============-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="district_id"]').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/district-upazilla/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="upazilla_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="upazilla_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <!--===============  End  District To Upazilla Show Ajax ===============-->

    <!--===============  Start  Upazilla To Union Show Ajax ===============-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="upazilla_id"]').on('change', function() {
                var upazilla_id = $(this).val();
                if (upazilla_id) {
                    $.ajax({
                        url: "{{ url('/upazilla-union/ajax') }}/" + upazilla_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="union_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="union_id"]').append('<option value="' +
                                    value.id + '">' + value.name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <!--===============  End  Upazilla To Union Show Ajax ===============-->

    <!--===============  Start  Shipping Charge  ===============-->
    <script>
        $(document).on('change', '#division_id', function(e) {
            let division_id = $(this).val();
            if (division_id == '6') {
                // alert('dhaka');
                $('.ship_charge').text('৳0');
                var delivery_charge = 0;
                $('.ship_charge_val').val(delivery_charge);
            } else {
                // alert('others');
                $('.ship_charge').text('৳0');
                var delivery_charge = 0;
                $('.ship_charge_val').val(delivery_charge);

            }

            var cart_total = parseFloat($('.total').val());
            var cart_order_total = parseFloat($('.order_total_amount').val());

            var cart_total = parseFloat(delivery_charge) + parseFloat(cart_order_total);
            $('.order_total').html("৳" + cart_total);
            $('.shipping_order_total').val(cart_total);
            // console.log( parseFloat(cart_total) );

        });
    </script>
    <!--===============  End  Shipping Charge  ===============-->

    <script>
        document.getElementById('screenshot').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('item_output').src = src
        }
    </script>
@endpush
@endsection
