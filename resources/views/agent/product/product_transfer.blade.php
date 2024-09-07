@extends('dealer.dealer_dashboard')
@section('dealer')
@push('css')
<style>
    .table {
        margin-bottom: 0.5rem;
    }
    .table > :not(caption) > * > * {
        padding: 0.1rem 0.4rem;
    }
    .product-price {
        font-size: 12px;
    }
    .product-thumb {
        cursor: pointer!important;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        background-color: #d56666;
        vertical-align: center !important;
        border: none;
        float: right;
        color: #fff;
        border-radius: 50%;
    }
    .material-icons {
        vertical-align: middle !important;
        font-size: 15px !important;
    }

    .select2-container--default .select2-selection--single {
        border-radius: 0px !important;
    }
    .select2-container--default {
        width: 100% !important;
    }
    .flex-grow-1 {
        margin-right: 10px;
    }

    .product_wrapper .card-body {
        padding: 0.4rem 0.4rem;
    }

    /* product discount style change */
    .product-discount {
        width: 4.5rem;
        height: 4.5rem;
        font-size: 14px;
        background-color: #23d58b;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #fff;
        font-weight: bolder;
    }
    .card{
        cursor: pointer;
    }

    #checkout_list {
    background-color: #fff;
    z-index: 1;
    max-height: 200px;
    overflow-y: auto;
    }
    .btn i {
        vertical-align: middle;
        /* font-size: 1.3rem; */
        margin-top: -1em;
        margin-bottom: -1em;
        /* margin-right: 5px; */
        color: #23d58b;
    }
</style>
@endpush
<div class="page-content">
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="search_term" id="search_term" placeholder="Search by Name" onkeyup="filter()">
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- card-body end// -->
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid" id="product_wrapper">
                @foreach($products as $product)
                    @if($product->order->payment_status ?? 'Null' == 1)
                        <div class="col" onclick="addToList({{ $product->product_id }})">
                            <div class="card">
                                <img class="default-img" src="{{ asset($product->product->product_thumbnail) }}" alt="" />
                                @php
                                    if($product->discount_type == 1){
                                        $price_after_discount = $product->regular_price - $product->discount_price;
                                    }elseif($product->discount_type == 2){
                                        $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price / 100);
                                    }
                                @endphp

                                @if($product->product->discount_price > 0)
                                    @if($product->product->discount_type == 1)
                                        <div class="">
                                            <div class="position-absolute top-0 end-0 m-3 product-discount">
                                                <span class="">৳{{ $product->product->discount_price }} off</span>
                                            </div>
                                        </div>
                                    @elseif($product->product->discount_type == 2)
                                        <div class="">
                                            <div class="position-absolute top-0 end-0 m-3 product-discount">
                                                <span class="">{{ $product->product->discount_price }}% off</span>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div class="card-body">
                                    <h6 class="card-title cursor-pointer">
                                        <?php $p_name_en =  strip_tags(html_entity_decode($product->product->name_en))?>
                                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}</h6>
                                    <div class="clearfix">
                                        @if ($product->product->discount_price > 0)
                                            @php
                                                if($product->product->discount_type == 1){
                                                    $price_after_discount = $product->product->regular_price - $product->product->discount_price;
                                                }elseif($product->product->discount_type == 2){
                                                    $price_after_discount = $product->product->regular_price - ($product->product->regular_price * $product->product->discount_price / 100);
                                                }
                                            @endphp
                                            <p class="mb-0 float-end fw-bold">
                                                <span class="me-2">৳{{ $price_after_discount }}</span>
                                                <span class="old-price text-decoration-line-through text-secondary price">৳{{ $product->product->regular_price }}</span>
                                            </p>
                                        @else
                                            <div class="product-price">
                                                <span class="price text-primary old-price">৳{{ $product->product->regular_price }}</span>
                                            </div>
                                        @endif
                                        <p class="mb-0 fw-bold">Stock Qty<strong class="text-primary"> {{ $product->stock_qty }}</strong></p>
                                        <p class="mb-0 fw-bold">Product Point<strong class="text-primary"> {{ $product->product_point }}</strong></p>
                                    </div>
                                    {{-- <div class="d-flex align-items-center mt-3 fs-6">
                                        <div class="cursor-pointer">
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-warning"></i>
                                        <i class="bx bxs-star text-secondary"></i>
                                        </div>
                                        <p class="mb-0 ms-auto">4.2(182)</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div><!--end row-->
        </div>
        <div class="col-sm-4">
            <form action="{{ route('dealer.transfer.pos.store') }}" method="POST">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex border-bottom pb-3">
                            <div class="flex-grow-1">
                                <select name="stockiest_id" id="stockiest_id" class="form-control select-active w-100 form-select select-nice" required>
                                    <option value="">-- Select Stockiest --</option>
                                    @foreach($stockiest as $stock)
                                        <option value="{{ $stock->id }}">{{ $stock->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-success" data-target="#new-customer" data-toggle="modal">
                                <i class="fa-solid fa-truck-fast"></i>
                            </button>
                        </div>
                        <div>
                            <div class="row" id="checkout_list">
                                <div class="text-center pt-10 pb-10" id="no_product_text">
                                    <span>No Product Added</span>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td style="float: right;">৳ <span id="subtotal_text">0.00</span></td>
                                        <input type="hidden" id="subtotal" name="subtotal" value="0">
                                    </tr>
                                    <tr>
                                        <td>Total Point</td>
                                        <td style="float: right;"><span id="product_point_text">0.00</span></td>
                                        <input type="hidden" id="product_point" name="product_point" value="0">
                                    </tr>
                                    {{-- <tr>
                                        <td>Tax</td>
                                        <td style="float: right;">৳ 0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td style="float: right;">৳ 0.00</td>
                                    </tr> --}}
                                    <tr>
                                        <td>Discount</td>
                                        <td style="float: right;">৳ 0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="table">
                                <tbody>
                                    <tr style="font-size: 20px; font-weight: bold">
                                        <td>Total</td>
                                        <td style="float: right;">৳ <span id="total_text">0.00</span></td>
                                        <input type="hidden" id="total" name="total" value="0">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">
                                <input type="submit" class="btn btn-primary" value="Transfer Product" style="float: right;">
                            </div>
                        </div>
                    </div>
                    <!-- card-body end// -->
                </div>
            </form>
        </div>
    </div>

@endsection

@push('dealer-script')
 <!-- Sweetalert js -->
    <script>
        $(document).ready(function() {
            $('body').addClass('wrapper toggled');
        });

        function addToList(id){
            // alert(id);

            $.ajax({
                type:'GET',
                url:'/dealer/transfer/pos/product/'+id,
                dataType:'json',
                success:function(data){
                    console.log(data);

                    // Start Sweertaleart Message
                  // Start Message
                  const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 1000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: 'Product Added To Transfer List Successfully.'
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message


                    // alert(total);

                    if(data.discount_price == 0){
                        price = data.regular_price-0;
                        // alert(price);
                        point = data.product_point;
                        var subtotal = parseFloat($('#subtotal').val());
                        var total =  parseFloat($('#total').val());
                        var product_point =  parseFloat($('#product_point').val());


                        subtotal = parseFloat(subtotal + price).toFixed(2);
                        total = parseFloat(total + price).toFixed(2);
                        // alert(total);

                        p_point = parseFloat(product_point + point).toFixed(2);
                        // alert(p_point);

                        $('#subtotal').val(subtotal);
                        $('#total').val(total);
                        $('#product_point').val(p_point);

                        $('#subtotal_text').html(subtotal);
                        $('#total_text').html(total);
                        $('#product_point_text').html(p_point);
                    }else{
                        if(data.discount_price > 0){
                            if(data.discount_type == 1){
                                price = data.regular_price - data.discount_price;
                            }else if(data.discount_type == 2){
                                price = data.regular_price - (data.regular_price * data.discount_price / 100);
                            }
                        }

                        point = data.product_point;

                        var subtotal = parseFloat($('#subtotal').val());
                        var total =  parseFloat($('#total').val());
                        var product_point =  parseFloat($('#product_point').val());

                        subtotal = parseFloat(subtotal + price).toFixed(2);
                        total = parseFloat(total + price).toFixed(2);
                        p_point = parseFloat(product_point + point).toFixed(2);

                        $('#subtotal').val(subtotal);
                        $('#total').val(total);
                        $('#product_point').val(p_point);

                        $('#subtotal_text').html(subtotal);
                        $('#total_text').html(total);
                        $('#product_point_text').html(p_point);
                    }


                    $('#no_product_text').html('');

                    html = `<div id="${data.id}"><ul class="list-group list-group-flush">
                                <li class="list-group-item py-0 pl-2">
                                    <div class="row gutters-5 align-items-center">
                                        <div class="col-1">
                                            <div class="row no-gutters align-items-center flex-column aiz-plus-minus">
                                                <button class="btn btn-default" type="button" data-type="plus" data-field="qty-0" onclick="cart_increase(${data.id})">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                <input type="text" name="qty[]" id="qty${data.id}" class="col border-0 text-center flex-grow-1 fs-16 input-number" placeholder="1" value="1" min="1" max="999" onchange="updateQuantity(0)"style="margin-left: 6px;margin-right: -11px;padding: 3px;background: #23d58b;color: #fff;border-radius: 10px;">
                                                <button class="btn btn-default" type="button" data-type="plus" data-field="qty-0" onclick="cart_decrease(${data.id})">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-5" style="margin-left:5px;">
                                            <div class="text-truncate-2">${data.name_en}</div>
                                            <input type="hidden" name="product_id[]" value="${data.id}">
                                        </div>
                                        <div class="col-3">
                                            <div class="fs-12 opacity-60">${price} x <span id="itemMultiplyQtyTxt${data.id}">1</span></div>
                                            <div class="fs-15 fw-600" id="itemTotalPriceTxt${data.id}">${price}</div>
                                            <input type="hidden" name="price[]" id="price${data.id}" value="${price}">
                                            <input type="hidden" name="point[]" id="point${data.id}" value="${point}">
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn-circle" onclick="removeItem(${data.id})">
                                                <i class="fa-solid fa-delete-left"></i>
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul><hr><div>`;
                    $('#checkout_list').append(html);

                }
            });
        }

        function removeItem(id){
            // alert(id);
            var qty = parseInt($('#qty'+id).val());
            var price = parseFloat($('#price'+id).val());
            var point = parseFloat($('#point'+id).val());

            var subtotal = parseFloat($('#subtotal').val());
            var total =  parseFloat($('#total').val());
            var product_point =  parseFloat($('#product_point').val());

            // alert(price);

            subtotal = parseFloat(subtotal - (price*qty)).toFixed(2);
            //alert(subtotal);
            total = parseFloat(total - (price*qty)).toFixed(2);
            // alert(total);
            p_point = parseFloat(product_point - point).toFixed(2);


            $('#subtotal').val(subtotal);
            $('#total').val(total);
            $('#product_point').val(p_point);

            $('#subtotal_text').html(subtotal);
            $('#total_text').html(total);
            $('#product_point_text').html(p_point);

            $('#'+id).html('');
        }

        function cart_increase(id){
            var qty = parseInt($('#qty'+id).val());
            var point = parseFloat($('#point'+id).val());

            @php
                $dealer_product = DB::table('dealers')->where('user_id', Auth::user()->id)->first();
            @endphp
            // alert(qty);
            // if({{$dealer_product->stock_qty}} <= qty ){
            //     alert('You can not add more than your stock quantity');
            //     return false;
            // }else{

            // }
            var price = parseFloat($('#price'+id).val());
            $('#qty'+id).val(qty+1);
            $('#itemMultiplyQtyTxt'+id).html(qty+1);

            var totalPrice = price * (qty+1);
            $('#itemTotalPriceTxt'+id).html(totalPrice);

            var subtotal = parseFloat($('#subtotal').val());
            var total =  parseFloat($('#total').val());
            var product_point =  parseFloat($('#product_point').val());

            subtotal = subtotal + price;
            total = total + price;
            p_point =  product_point + point;

            $('#subtotal').val(subtotal);
            $('#total').val(total);
            $('#product_point').val(p_point);

            $('#subtotal_text').html(subtotal);
            $('#total_text').html(total);
            $('#product_point_text').html(p_point);
        }

        function cart_decrease(id){
            var qty = parseInt($('#qty'+id).val());
            if(qty > 1){
                $('#qty'+id).val(qty-1);

                var price = parseFloat($('#price'+id).val());
                $('#itemMultiplyQtyTxt'+id).html(qty-1);

                var totalPrice = price * (qty-1);
                $('#itemTotalPriceTxt'+id).html(totalPrice);

                var point = parseFloat($('#point'+id).val());
                // alert(point);

                var subtotal = parseFloat($('#subtotal').val());
                var total =  parseFloat($('#total').val());
                var product_point =  parseFloat($('#product_point').val());

                subtotal = parseFloat(subtotal - price).toFixed(2);
                total = parseFloat(total - price).toFixed(2);
                p_point = parseFloat(product_point - point).toFixed(2);

                $('#subtotal').val(subtotal);
                $('#total').val(total);
                $('#product_point').val(p_point);

                $('#subtotal_text').html(subtotal);
                $('#total_text').html(total);
                $('#product_point_text').html(p_point);
            }
        }

        function filter() {
            var search_term = $('#search_term').val();
            var category_id = $('#category_id').val();
            var brand_id = $('#brand_id').val();

            var url = '/dealer/pos/get-products?filter=1';
            var search_status = 0;
            if(search_term){
                if (/\S/.test(search_term)) {
                    search_term = search_term.replace(/^\s+/g, '');
                    search_term = search_term.replace(/\s+$/g, '');
                    url += '&search_term='+search_term;
                    //alert( '--'+search_term+'--' );
                    search_status = 1;
                }
            }
            if(category_id){
                url += '&category_id='+category_id;
                //alert( category_id );
                search_status = 1;
            }
            if(brand_id){
                url += '&brand_id='+brand_id;
                //alert( brand_id );
                search_status = 1;
            }

            if(search_status == 0){
                url = '/dealer/pos/get-products';
            }

            $.ajax({
                    type:'GET',
                    url:url,
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        var html = '';
                        if(Object.keys(data).length > 0){
                            $.each(data, function(key,value){
                                var product_name = value.name_en;
                                product_name = product_name.slice(0, 30) + (product_name.length > 30 ? "..." : "");

                                var price_after_discount = value.regular_price;
                                if(value.discount_type == 1){
                                    price_after_discount = value.regular_price - value.discount_price;
                                }else if(value.discount_type == 2){
                                    price_after_discount = value.regular_price - (value.regular_price * value.discount_price / 100);
                                }

                                html += `<div class="col-sm-2 col-xs-6 product-thumb" onclick="addToList(${value.id})">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="product-image">`;
                                                        if(value.product_thumbnail && value.product_thumbnail != '' && value.product_thumbnail != 'Null'){
                                html  +=                    `<img class="default-img" src="/${value.product_thumbnail}" alt="" />`;
                                                        }else{
                                html  +=                     `<img class="default-img" src="/upload/no_image.jpg" alt="" />`;
                                                        }
                                html  +=            `</div>
                                                    <p style="font-size: 10px; font-weight: bold; line-height: 15px; height: 30px;">
                                                        ${product_name}
                                                    </p>
                                                    <div>`;
                                                        if (value.discount_price > 0){

                                html  +=                    `<div class="product-price">
                                                                    <del class="old-price">৳ ${value.regular_price }</del>
                                                                    <span class="price text-primary">৳ ${price_after_discount }</span>
                                                                </div>`;
                                                            }else{
                                html  +=                        `<div class="product-price">
                                                                    <span class="price text-primary">৳ ${value.regular_price }</span>
                                                                </div>`;
                                                            }
                                html  +=            `</div>
                                                </div>
                                            </div>
                                        </div>`;

                            });
                        }else{
                            html = '<div class="text-center"><p>No products found!</p></div>'
                        }
                        $('#product_wrapper').html(html);
                    }
                });
        };

    </script>
@endpush
