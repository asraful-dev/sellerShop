@extends('layouts.frontend')
@section('content-frontend')
<main class="ps-page--my-account">
   <div class="ps-breadcrumb">
      <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>Referral List</li>
        </ul>
      </div>
   </div>
   <section class="ps-section--account">
      <div class="container">
         <div class="row">
            <div class="col-lg-4">
               <div class="card p-5">
                @include('frontend.common.user_side_nav')
               </div>
            </div>
            <div class="col-lg-8">
               <div class="card rounded-0 shadow-none border">
                  <div class="card-header pt-4 border-bottom-0">
                    <h5 class="mb-0 fs-18 fw-700 text-dark">Referral List</h5>
                  </div>
                  <div class="card-body">
                    <table class="table table-responsive" style="background:#00ab5b;font-weight: 600; color:#fff;">
                        <thead>
                           <tr>
                                <th>SL</th>
                                <th>Joining Date</th>
                                <th>Username</th>
                                <th>Phone No</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($refferel_users as $key =>  $refferel_user)
                           <tr>
                                <td>{{ $key+1}}</td>
                                <td>
                                    {{ date('Y-m-d H:i:s', strtotime($refferel_user->created_at)) }}
                                </td>
                                <td>
                                    {{ $refferel_user->username }}
                                </td>
                                <td> {{ $refferel_user->phone }}</td>
                                <td>{{ $refferel_user->email }}</td>
                                <td> ৳{{ number_format($refferel_user->main_wallet ?? '0', 2)}}</td>
                                <td>
                                    @if($refferel_user->active_status == 1)
                                        <span class="badge rounded-pill bg-info text-light">Active</span>
                                    @else
                                        <span class="badge rounded-pill bg-danger text-light">Inactive</span>
                                    @endif
                                </td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection

