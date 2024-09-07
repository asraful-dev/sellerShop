@extends('layouts.userpanel')
@section('user_content')
<div class="d-flex align-items-center px-6 py-5">
	<div class="text-light mr-auto">
	    <h2 class="fw-100 mb-0">Transfer</h2>
	    <span class="lead-1 text-info">User Transfer</span>
	</div>
</div>

<!-- Transparent -->
<div class="mt-0 mb-5 m-5" style="background-image: url({{asset('frontend/assets/img/bg/bg-2.jpg')}});" data-overlay="9">
	<div class="position-relative my-2">
		<form action="{{ route('user.transfer.store') }}" class="input-transparent" method="post">
	    @csrf
	    <div class="mt-5">
	    	<label>Type Username:</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text"><i class="fas fa-user"></i></span>
	        </div>
	        <input type="text" class="form-control" name="username" required>
	        @error('username')
            <small class="text-danger">{{ $message }}</small>
          @enderror
	      </div>
	    </div>
	    <div class="mt-5">
	    	<label>Transfer Type</label>
	      <div class="input-group">
	       <select name="package" class="form-control" id="wallet">
          	<option value=""  selected disabled>Select Transfer</option>
            <option value="fund_wallet">Fund Wallet</option>
            <option value="main_wallet">Main Wallet</option>
          </select>
	        <div class="input-group-append">
	          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
	        </div>
	      </div>
	      <!-- <p id="packageAmount" class="mt-3 transfer_amount"></p> -->
	    </div>

	    <div class="mt-5">
	    	<label>Transfer Amount</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
	        </div>
	        <input  type="number" class="form-control" id="package_amount" name="package_amount">
	        @error('package_amount')
            <small class="text-danger">{{ $message }}</small>
          @enderror
	        <div class="input-group-append">
	          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
	        </div>
	      </div>
	    </div>

	    <div class="mt-5">
	      <div class="form-group">
	        <button type="submit" id="buyNow" class="my-3 mx-1 btn btn-round btn-theme">Submit</button>
	      </div>
	    </div>
	  </form>
	
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- user fund/main amount show ajax -->
<script type="text/javascript">
	$(document).ready(function() {
      $('select[name="package"]').on('change', function(){
            // var e = document.getElementById("wallet");
            // var value = e.value;
            // var text = e.options[e.selectedIndex].text;
            var id = $(this).val();
            if($(this).val() == 'fund_wallet'){
               $('#package_amount').val({{ Auth::user()->fund_wallet }});
            }

            if($(this).val() == 'main_wallet'){
                $('#package_amount').val({{ Auth::user()->main_wallet }});
            }
            
        	//  $('#package_amount').val(id);
          if(id != null) {
              $.ajax({
                  url: "{{  url('/user/amount/show/ajax') }}/"+id,
                  type: "GET",
                  dataType:"json",
                  success:function(package) {
                    console.log('Done');
                  },
              });
          }else {
            alert('danger');
          }
      });
    });
</script> 
@endsection
