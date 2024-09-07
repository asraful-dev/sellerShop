@extends('agent.agent_dashboard')
@section('agent')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Bank Deposite Request</h6>
                    <hr>
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Bank Deposite Request</h5>
                                </div>
                                <hr>
                                <form class="input-transparent" action="{{ route('agent.balance.request.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="Bank" name="gateway" />
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Bank Name</label>
                                        <div class="col-sm-9">
                                            <select name="bank_name" data-required="1" class="form-control">
                                                <option value="" selected disabled>Select Bank</option>
                                                <option value="eastern">Eastern Bank Limited</option>
                                                <option value="brac">BRAC Bank Limited</option>
                                                <option value="dutch">Dutch Bangla Bank</option>
                                                <option value="trust">Trust Bank Limited</option>
                                                <option value="sonali">Sonali Bank</option>
                                                <option value="prime">Prime Bank Limited</option>
                                                <option value="islami">Islami Bank</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Account</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="text"name="account_name" class="form-control"
                                                value="{{ old('account_name') }}" id="inputEnterYourName"
                                                placeholder="Enter Account Number" required min="0" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Branch Name</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="text"name="branch_name" class="form-control"
                                                value="{{ old('branch_name') }}" id="inputEnterYourName"
                                                placeholder="Enter Branch Name" required min="0" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Deposite
                                            Amount</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="number" name="amount" class="form-control"
                                                value="{{ old('amount') }}" placeholder="Deposite Amount" min="0"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Deposite Holder
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="text"name="holder_name" class="form-control"
                                                value="{{ old('holder_name') }}" id="inputEnterYourName"
                                                placeholder="Enter holder name" required min="0" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Slip</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="screenshot" id="screenshot"
                                                placeholder="Ex: trnx11id">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img width="70px" height="50px" class="mt-3"
                                                src="{{ asset('upload/no_image.jpg') }}" id="item_output" alt="">
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
    @endpush
