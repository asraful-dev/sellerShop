@extends('admin.admin_master')
@section('slider_create')
    active
@endsection
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Brand Commission</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Brand Commission</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('admin.rank.create') }}" class="btn btn-primary">Rank List</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                @php
                    use Carbon\Carbon;
                    $total_brand_seller = App\Models\User::where('role', 'user')
                        ->where('smart_seller_status', 3)
                        ->whereMonth('created_at', Carbon::now()->month)
                        ->count();
                @endphp
                <h3>Total Brand Saller This Month: <span
                        class="text-light font-weight-bolder">{{ $total_brand_seller ?? '0' }}</span></h3>
                <!-- Page Heading -->
                <!-- DataTales Example -->
                <div class="row">
                    <form action="{{ route('admin.rank.brand.store') }}" method="post">
                        @csrf
                        <div class="form-group mt-2 mb-3">
                            <label for="commission_amount">Commission Amount:</label>
                            <input type="number" name="amount" min="0" class="form-control mt-2" value=""
                                id="commission_amount" placeholder="Enter brand commission amount">
                        </div>
                        <button type="submit" class="btn btn-success mb-3">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
