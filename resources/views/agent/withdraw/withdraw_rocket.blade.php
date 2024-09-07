@extends('dealer.dealer_dashboard')
@section('dealer')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
               <h6 class="mb-0 text-uppercase">Rocket Withdraw Request</h6>
               <hr>
               <div class="card border-top border-0 border-4 border-info">
                  <div class="card-body">
                     <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                           <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                           </div>
                           <h5 class="mb-0 text-info">Rocket Withdraw Request</h5>
                        </div>
                        <hr>
                    <form class="input-transparent" action="{{ route('dealer.withdraw.request.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" value="Rocket" name="gateway" />
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Withdraw Form</label>
                            <div class="col-sm-9">
                                <select name="targetWallet" id="targetWallet" class="form-control select-active w-100 " required>
                                    <option value=""  readonly selected disabled>Select Wallet</option>
                                    <option value="main_wallet">Main Wallet</option>
                                    {{-- <option value="reffer_bonus">Reffer Bonus</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Withdraw Amount</label>
                            <div class="col-sm-9">
                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                             <input type="number" id="actualprice" name="amount" class="form-control" value="" placeholder="Actual Price" min="0" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Withdraw Charge</label>
                            <div class="col-sm-9">
                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                             <input type="number" id="discount" name="withdraw_charge" class="form-control" value="10" readonly placeholder="Discount" min="0" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Payable Amount</label>
                            <div class="col-sm-9">
                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                             <input type="number" id="result" name="payable_amount" class="form-control" value="0" readonly placeholder="" min="0" >
                            </div>
                        </div>
                        @php
                            $configData = App\Models\Config::find(1);
                        @endphp
                        <div class="row mb-3">
                           <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Wallet Address</label>
                           <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <button type="button" class="btn btn-info btn-sm" onclick="copyToClipboard()">
                                        Copy Input Value
                                    </button></span>
                                </div>
                                <input type="text" value="{{ $configData->usd_wallet }}" readonly name="wallet_address" class="form-control" id="copyWallet">
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Rocket Number</label>
                            <div class="col-sm-9">
                             <input type="number" class="form-control" name="number" id="number" placeholder="Enter rocket number">
                            </div>
                         </div>
                        {{-- <div class="row mb-3">
                           <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Transaction ID</label>
                           <div class="col-sm-9">
                            <input type="text" class="form-control" name="transaction_id" id="transaction_id" placeholder="Ex: trnx11id">
                           </div>
                        </div> --}}
                        <div class="row">
                           <label class="col-sm-3 col-form-label"></label>
                           <div class="col-sm-9">
                              <button type="submit" class="btn btn-info">Send Request</button>
                           </div>
                        </div>
                    </form>
                    </div>
                  </div>
               </div>
            </div>
         </div>
    </div>
</div>
@push('dealer-script')
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
    {{-- // Discount Calculation // --}}
	<script>
		$('input').on('keyup input', function () {
			var actualprice = Number($("#actualprice").val().trim());
			var discount = Number($("#discount").val().trim());

			var discountRate = (100 - discount) / 100;
			var result = (actualprice * discountRate);
			
			$("#result").val("" + result.toFixed(2));
		});
	</script>
@endpush