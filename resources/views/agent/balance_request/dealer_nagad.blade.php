@extends('dealer.dealer_dashboard')
@section('dealer')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
               <h6 class="mb-0 text-uppercase">Nagad Balance Request</h6>
               <hr>
               <div class="card border-top border-0 border-4 border-info">
                  <div class="card-body">
                     <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                           <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                           </div>
                           <h5 class="mb-0 text-info">Nagad Balance Request</h5>
                        </div>
                        <hr>
                    <form class="input-transparent" action="{{ route('dealer.balance.request.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="Nagad" name="gateway" />
                        <div class="row mb-3">
                           <label for="inputEnterYourName" class="col-sm-3 col-form-label">Sender Number</label>
                           <div class="col-sm-9">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="text"name="sender_number" class="form-control" value="{{ old('sender_number') }}" id="inputEnterYourName" placeholder="Enter Sender Number"  required min="0" required>
                           </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                             <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                             <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="Amount" min="0" required>
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
                                <input type="text" value="{{ $configData->nagad_wallet }}" readonly name="wallet_address" class="form-control" id="copyWallet">
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Transaction ID</label>
                           <div class="col-sm-9">
                            <input type="text" class="form-control" name="transaction_id" id="transaction_id" placeholder="Ex: trnx11id">
                           </div>
                        </div>
                        <div class="row mb-3">
                           <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Screenshot</label>
                           <div class="col-sm-9">
                            <input type="file" class="form-control" name="screenshot" id="screenshot" placeholder="Ex: trnx11id">
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <img width="70px" height="50px" class="mt-3" src="{{ asset('upload/no_image.jpg') }}" id="item_output" alt="">
                            </div>
                        </div>
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
@endpush