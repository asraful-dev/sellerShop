@extends('admin.admin_master')
@section('slider_create') active @endsection
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Checkout Setting Update</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout Setting Update</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('checkout.setting.index') }}" class="btn btn-primary">Checkout Setting List</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('checkout.setting.update',$checkout->id) }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Checkout Setting Create</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label for="brand_name_en" class="form-label">Checkout Setting Title:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                  <input type="text" name="title" class="form-control border-start-0" required id="title" value="{{ $checkout->title }}" placeholder="Enter checkout title" />
                                </div>
                                @error('title')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              @if($checkout->slug == 'register-offer-amount')
                              <div class="col-12 mt-3">
                                <label for="amount" class="form-label">Register Offer Amount:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                  <input type="number" min="0" name="amount" class="form-control border-start-0" value="{{ $checkout->amount ?? '0'}}" placeholder="Enter Offer Amount" />
                                </div>
                                @error('amount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              @endif
                            
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for="status">Status</label>
                                   <span class="text-danger">*</span>
                                  <select name="status" id="status" class="form-control form-select">
                                    @if ($checkout->status == 1)
                                        <option value="1" selected>Active</option>
                                        <option value="0">Disable</option>
                                    @else
                                        <option value="1" >Active</option>
                                        <option value="0" selected>Disable</option>
                                    @endif
                                  </select>
                              </div>
                           </div>
                           <div class="col-md-12 text-right mt-3">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit" style="float:right;">Save</button>
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

<script type="text/javascript">
      $(document).ready(function(){
        $('.image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    }); 
</script>
@endsection
