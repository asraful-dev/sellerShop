@extends('admin.admin_master')
@section('admin')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product ROI List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product Roi List</li>
                    </ol>
                </nav>
            </div>
           
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
					<table id="example" class="table table-striped table-bordered">
						<thead class="table-dark">
							<tr>
								<th>SL</th>
								<th>Transaction Time</th>
								<th>To User</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							@php
							   $amount=0;
							@endphp
							@foreach ($transferHistories as $key =>  $transferHistory)
							<tr>
								<td>{{ $key+1}}</td>
								<td>
									{{ date('Y-m-d H:i:s', strtotime($transferHistory->created_at)) }}
								</td>
								<td>
									{{ App\Models\User::find($transferHistory->user_id)->username; }}
								</td>
								<td> {{ $transferHistory->amount }}</td>
								   @php
									$amount+=$transferHistory->amount;
								  @endphp
							</tr>
							@endforeach
							<tfoot>
								<tr>
								  <td colspan="3" style="font-weight: bold; text-align: right;">Total:</td>
								  <td style="font-weight: bold;">{{ $amount }}</td>
								</tr>
							</tfoot>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
