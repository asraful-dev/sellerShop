@extends('layouts.userpanel')
@section('user_content')
<div class="d-flex align-items-center px-6 py-5">
	<div class="text-light mr-auto">
	    <h2 class="fw-100 mb-0">Package</h2>
	    <span class="lead-1 text-info">User Buy Package</span>
	</div>
</div>

<!-- Transparent -->
<div class="mt-0 mb-5 m-5" style="background-image: url({{asset('frontend/assets/img/bg/bg-2.jpg')}});" data-overlay="9">
	<div class="position-relative my-2">
	    <!-- <div class="mt-5">
	    	<label>Package Name</label>
	      <div class="input-group">
	       <select name="package" data-required="1" class="form-control">
          	<option value=""  selected disabled>Select Package</option>
              @foreach($packages as $package)
                  <option value="{{ $package->id }}"> {{ $package->name }}</option>
              @endforeach
          </select>
	        <div class="input-group-append">
	          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
	        </div>
	      </div>
	    </div> -->

	    <div class="mt-5">
	    	<form action="{{ route('buy.id.upgrade.store',$package->id) }}" class="input-transparent" method="post" id="package_success">
	        @csrf
	    	<label>Amount</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
	        </div>
	        <input type="hidden" name="id" id="singlePackageId">
	        <input id="packageAmount" type="text" readonly class="form-control" name="package_amount" value="10">
	        @error('amount')
                <small class="text-danger">{{ $message }}</small>
            @enderror
	        <div class="input-group-append">
	          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
	        </div>
	      </div>
	    </div>

	    <div class="mt-5">
	      <div class="form-group">

	           <button type="submit" id="buyNow" class="my-3 mx-1 btn btn-round btn-theme">Buy Now</button>
	          </form>
	      </div>
	    </div>
	  
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="package"]').on('change', function(){
          var customer_id = $(this).val();
          if(customer_id) {
              $.ajax({
                  url: "{{  url('/user/package/IdUpgrade/') }}/"+customer_id,
                  type:"GET",
                  dataType:"json",
                  success:function(package) {
                    $('#packageAmount').val(package.amount);
                    $('#singlePackageId').val(package.id);
                  },
              });
          } else {
                alert('danger');
          }
      });
  });
</script>


<!-- sweetalerat delete data -->
 <script type="text/javascript">
    $(function(){
        $(document).on('click','#buyNow',function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Are you sure?',
            text: "Send This Request!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Send it!'
        }).then((result) => {
            $('#package_success').submit();
            Swal.fire(
            'Sent !',
            'Your file has been sent.',
            'success'
            )
          })
        });
    });
</script>

@endsection
