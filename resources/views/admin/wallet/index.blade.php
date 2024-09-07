@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Wallet Information</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Wallet Information</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">

                </div>
            </div>
            <!--end breadcrumb-->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <!-- DataTales Example -->
                <div class="row">
                    <form method="post" action="{{ route('admin.wallet.update', $configData->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-10 offset-1">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>Update Wallet Address</h4>
                                    <hr>
                                    <div class="row">
                                        {{-- <div class="col-12">
                            <label for="usd_wallet" class="form-label">USD Wallet:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="usd_wallet" value="{{ $configData->usd_wallet }}" class="form-control border-start-0" id="usd_wallet" placeholder="Enter USD wallet" />
                            </div>
                            @error('usd_wallet')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div> --}}

                                        <div class="col-12">
                                            <label for="rocket_wallet" class="form-label">Rocket Wallet:</label>
                                            <div class="input-group input-group-lg"> <span class="input-group-text"><i
                                                        class='bx bxs-user'></i></span>
                                                <input type="text" name="rocket_wallet"
                                                    value="{{ $configData->rocket_wallet }}"
                                                    class="form-control border-start-0" id="rocket_wallet"
                                                    placeholder="Enter Rocket wallet" />
                                            </div>
                                            @error('rocket_wallet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12 mt-3">
                                            <label for="bkash_wallet" class="form-label">Bkash Wallet:</label>
                                            <div class="input-group input-group-lg"> <span class="input-group-text"><i
                                                        class='bx bxs-user'></i></span>
                                                <input type="text" name="bkash_wallet"
                                                    value="{{ $configData->bkash_wallet }}"
                                                    class="form-control border-start-0" id="bkash_wallet"
                                                    placeholder="Enter Bkash wallet" />
                                            </div>
                                            @error('bkash_wallet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12 mt-3">
                                            <label for="nagad_wallet" class="form-label">Nagad Wallet:</label>
                                            <div class="input-group input-group-lg"> <span class="input-group-text"><i
                                                        class='bx bxs-user'></i></span>
                                                <input type="text" name="nagad_wallet"
                                                    value="{{ $configData->nagad_wallet }}"
                                                    class="form-control border-start-0" id="nagad_wallet"
                                                    placeholder="Enter Nagad wallet" />
                                            </div>
                                            @error('nagad_wallet')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 text-right mt-3">
                                            <div class="form-group">
                                                <button class="btn btn-success" type="submit"
                                                    style="float:right;">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
@endsection
