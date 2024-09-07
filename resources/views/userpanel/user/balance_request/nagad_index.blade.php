@extends('layouts.userpanel')
@section('user_content')
<div class="d-flex align-items-center px-6 py-5">
	<div class="text-light mr-auto">
	    <h2 class="fw-100 mb-0">Nagad Balance Request</h2>
	    <span class="lead-1 text-info">Nagad Balance Request</span>
	</div>
</div>
<!-- Transparent -->
<div class="mt-0 mb-5 m-5" style="background-image: url({{asset('frontend/assets/img/bg/bg-2.jpg')}});" data-overlay="9">
	<div class="position-relative my-2">
	  <form class="input-transparent" action="{{ route('balance.request.store') }}" method="POST" enctype="multipart/form-data">
	  	@csrf
	    <div class="mt-0 mb-3">
	     
	      <div>
	        <code class="p-5">Nagad Request</code>
	      </div>
	    </div>
	    <div class="col-12">
       		<input type="hidden" value="Nagad" name="gateway" />
       		<div align="center">
         	<img style='height:40px;width:70px;border-radius: 15px; margin-top: 20px;' src="{{ asset('upload/amount') }}/nagad1.jpg" alt="nagad">
         </div>
	    <div class="mt-5">
	    	<label>Sender Number</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
	        </div>
	        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	        <input type="text"name="sender_number" class="form-control" value="{{ old('sender_number') }}" placeholder="Enter Sender Number"  required min="0" required>
	        @error('sender_number')
                <small class="text-danger">{{ $message }}</small>
            @enderror
	        <div class="input-group-append">
	          <span class="input-group-text">৳</span>
	        </div>
	      </div>
	    </div>

	    <div class="mt-5">
	    	<label>Amount</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
	        </div>
	        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	        <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="Amount" min="0" required>
	        @error('amount')
                <small class="text-danger">{{ $message }}</small>
            @enderror
	        <div class="input-group-append">
	          <span class="input-group-text">৳</span>
	        </div>
	      </div>
	    </div>
	    @php
			$configData = App\Models\Config::find(1);
		@endphp
	    <div class="mt-5">
	      <!--<label>Wallet Address</label>-->
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text">
	          	<button type="button" class="btn btn-info btn-sm" onclick="copyToClipboard()">
                    Copy <img src="{{ asset('public/upload/copy.svg') }}" style="width:20px;" type="">
                </button></span>
	        </div>
	        <input type="text" value="{{ $configData->nagad_wallet }}" readonly name="wallet_address" class="form-control" id="copyWallet">
	      </div>
	    </div>

	    <div class="mt-5">
	    	<label>Transaction ID</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text"><i class="fas fa-user"></i></span>
	        </div>
	        <input type="text" class="form-control" name="transaction_id" id="transaction_id" placeholder="Ex: trnx11id">
	         @error('transaction_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
	      </div>
	    </div>

	    <div class="mt-5">
	    	<label>Screenshot</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text"><i class="fas fa-user"></i></span>
	        </div>
	        <input type="file" class="form-control" name="screenshot" id="screenshot" placeholder="Ex: trnx11id">
	        @error('screenshot')
                <small class="text-danger">{{ $message }}</small>
            @enderror
	      </div>
	    </div>
	    <div class="col-md-4">
            <img width="100px" height="50px" class="mt-3" src="{{ asset('upload/no_image.jpg') }}" id="item_output" alt="">
        </div>
	    <div class="mt-5">
	      <div class="form-group">
	          <button class="my-3 mx-1 btn btn-round btn-theme" type="submit">Send Request</button>
	          <a href="{{ url()->previous() }}" style="float:right;" class="my-3 mx-1 btn btn-round btn-danger" type="button">Go Back</a>
	      </div>
	    </div>
	  </form>
	</div>
</div>

<script>
        function copyToClipboard() {
            var copyGfGText = document.getElementById("copyWallet");
            copyGfGText.select();
            document.execCommand("copy");
            alert('Wallet Address Copy');
        }

        document.getElementById('screenshot').onchange = function() {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('item_output').src = src
        }

    </script>
@endsection