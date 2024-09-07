@extends('layouts.frontend')
@section('content-frontend')
<head>
    <style>
        .description{
            font-weight: 600;
            line-height: 26px;
            font-size: 16px;
        }
        .card-title{
            padding: 10px;
            border-bottom: 1px solid #ffe8e8;
            background-color: #ede5e5;
        }
        .table tr td h5{
            font-size: 16px;
        }
        .table tr{
            border-bottom: 1px solid #977e7e;
        }
        .table tr:last-child{
            border-bottom: none;
        }
        .order_summery{
            color: #977e7e;
        }
        .order-details{
            color: #7a7a7a;
            font-size: 18px;
            padding: 10px;
            border-bottom: 1px solid #b0aaaa;
        }
        .details-table{
            /* background-color: #d7cccc; */
        }
        .details-table thead tr td{
            font-weight: 600;
            color: #8b6969;
            font-size: 16px;
        }
        .details-table tfoot tr td{
            font-weight: 600;
            color: #8b6969;
            font-size: 16px;
        }
        .back_btn{
            width: 218px;
            height: 38px;
            margin-top: 40px;
            background-color: gold;
            color: black;
            font-weight: 600;
            font-size: 16px;
        }
    </style>
</head>
        <div class="row p-5" style="margin-top: 100px;">
            <div class="col-md-4 text-center m-auto">
                <h2 class="text-center">ধন্যবাদ</h2><br>
                <h5 class="text-center description">আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে। আমাদের একজন প্রতিনিধি আপনার সাথে কথা বলে আপনাকে বিস্তারিত জানিয়ে দিবেন।</h5>
                <div class="card">
                    <div class="card-title">
                        <h4>Your order has received.</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless text-left">
                            <tr>
                                <td>
                                    <h5 class="order_summery">Order Number:</h5>
                                    <h5>{{ $order_data->id }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="order_summery">Date:</h5>
                                    <h5>{{ $order_data->order_date }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="order_summery">Total:</h5>
                                    <h5>{{ $order_data->grand_total }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="order_summery">Payment method:</h5>
                                    <h5 style="text-transform: capitalize">
                                        <?php
                                            $payment_method = $order_data->payment_method;
                                            $grand_total_with_spaces = str_replace('_', ' ', $payment_method);
                                            echo $grand_total_with_spaces;
                                            ?>
                                    </h5>
                                </td>
                            </tr>
                        </table>
                        <div class="card" style="background-color: #ede5e5 !important;">
                            <div class="card-title">
                                <h3 class="text-left order-details">Order Details</h3>
                            </div>
                            <div class="card-body">
                                <table class="table trable-borderless details-table">
                                    <thead>
                                        <tr>
                                            <td>Product</td>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                        @endphp
                                        @foreach($order_data->order_details as $details)
                                        <tr>
                                            <td>{{ $details->product->name_en }}</td>
                                            <td>{{ $details->price }}</td>
                                        </tr>
                                        @php
                                            $subtotal +=  $details->price;
                                        @endphp
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>{{ $subtotal }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td>{{ $order_data->shipping_cost }}</td>
                                        </tr>
                                        <tr>
                                            <td>Payment Method</td>
                                            <td>
                                                <h5 style="text-transform: capitalize">
                                                    <?php
                                                        $payment_method = $order_data->payment_method;
                                                        $grand_total_with_spaces = str_replace('_', ' ', $payment_method);
                                                        echo $grand_total_with_spaces;
                                                        ?>
                                                </h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>{{ $order_data->grand_total }}</td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <a class="btn btn-danger back_btn" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i>   Back To Home</a>
                </div>
            </div>
        </div>
        {{-- <script>
            
            function redirect() {
                
                // window.location.replace("{{ route('home') }}");
            }
        
            
            function countdown(seconds) {
                document.getElementById('countdown').innerText = seconds;
                if (seconds > 0) {
                    setTimeout(function() {
                        countdown(seconds - 1);
                    }, 1000);
                } else {
                    redirect(); 
                }
            }
        
            
            document.addEventListener('DOMContentLoaded', function() {
                countdown(5); 
            });
        </script> --}}
@endsection

