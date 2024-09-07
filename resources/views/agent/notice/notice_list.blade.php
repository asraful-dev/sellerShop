@extends('dealer.dealer_dashboard')
@section('dealer')
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Notice List</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Notice List</li>
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
                <h5 class="mb-0">All Notice Summary</h5>
             </div>
             <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
             </div>
          </div>
          <hr>
          <div class="table-responsive">
             <table class="table align-middle mb-0">
                <thead class="table-light">
                   <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                   </tr>
                </thead>
                @php
                $notice_count = App\Models\Notice::where('notice_roll','dealer')->where('status',1)->count();
                $notices = App\Models\Notice::where('notice_roll','dealer')->where('status',1)->get();
              @endphp
                <tbody>
                   @foreach($notices as $key => $notice)
                   <tr>
                    <td> {{ $key+1}} </td>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->description ?? 'Null' }}</td>
					<td>
                        <img src="{{ asset($notice->image) }}" width="60" height="50" alt="">
                    </td>
                    <td>
                        @if($notice->status == 1)
                            <span>Active</span>
                        @else
                            <span>Inactive</span>
                        @endif
                    </td>
                    <td> {{ date("F j Y, g:i a", strtotime($notice->created_at)) }}</td>
                    
                   </tr>
                   @endforeach
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
@endsection

@push('dealer-script')

@endpush