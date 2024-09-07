@extends('dealer.dealer_dashboard')
@section('dealer')
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Product List</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
       
    </div>
    <!--end row-->
    <div class="card radius-10">
       <div class="card-body">
          <div class="d-flex align-items-center">
             <div>
                <h5 class="mb-0">All Product Summary</h5>
             </div>
             <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
             </div>
          </div>
          <hr>
          <div class="table-responsive">
             <table class="table align-middle mb-0">
                <thead class="table-light">
                   <tr>
                      <th>Order id</th>
                      <th>Product Image</th>
					   <th>Username</th>
                      <th>Stock Qty</th>
                      <th>Regular price</th>
                      <th>Date</th>
                   </tr>
                </thead>
                @php
                   $transfer_product = App\Models\Stockiest::where('user_id', Auth::user()->id)->where('status',1)->get();
                @endphp
                <tbody>
                   @foreach($transfer_product as $key => $stockes)
                   <tr>
                     <td> {{ $key+1}} </td>
                      <td>
                         <div class="d-flex align-items-center">
                            <div class="recent-product-img">
                               <img src="{{ asset($stockes->product->product_thumbnail) }}" alt="">
                            </div>
                            <div class="ms-2">
                               <h6 class="mb-1 font-14">{{ $stockes->product->name_en ?? '0' }}</h6>
                            </div>
                         </div>
                      </td>
					   @php
					   	$username = App\Models\User::where('id',$stockes->stockiest_id)->first();
					   @endphp
					    <td>{{ $username->username }}</td>
					    <td>{{ $stockes->stock_qty ?? '0' }}</td>
                  
                      <td>৳{{ $stockes->product->regular_price ?? '0' }}</td>
               
                      <td>{{ $stockes->created_at->format('Y-m-d H:i:s'); }}</td>
                    
                   </tr>
                   @endforeach
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
@endsection

@push('stockiest-script')

@endpush