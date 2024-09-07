@extends('agent.agent_dashboard')
@section('dealer')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Nagad Withdraw Request</h6>
                    <hr>
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Nagad Withdraw Request</h5>
                                </div>
                                <hr>
                                <form class="input-transparent" action="{{ route('agent.withdraw.request.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="Nagad" name="gateway" />
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Withdraw
                                            Form</label>
                                        <div class="col-sm-9">
                                            <select name="targetWallet" id="targetWallet"
                                                class="form-control select-active w-100 " required>
                                                <option value="" readonly selected disabled>Select Wallet</option>
                                                <option value="commission_wallet">Commission Wallet</option>
                                                {{-- <option value="reffer_bonus">Reffer Bonus</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Withdraw
                                            Amount</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="number" id="actualprice" name="amount" class="form-control"
                                                value="" placeholder="Enter amount" min="0" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nagad Number</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="number" id="number"
                                                placeholder="Enter nagad number" required>
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
    @push('agent-script')
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
            $('input').on('keyup input', function() {
                var actualprice = Number($("#actualprice").val().trim());
                var discount = Number($("#discount").val().trim());

                var discountRate = (100 - discount) / 100;
                var result = (actualprice * discountRate);

                $("#result").val("" + result.toFixed(2));
            });
        </script>
    @endpush
