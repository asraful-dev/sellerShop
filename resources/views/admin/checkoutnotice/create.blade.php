@extends('admin.admin_master')
@section('slider_create') active @endsection
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Checkout Notice Create</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout Notice Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('checkoutnotice.index') }}" class="btn btn-primary">Checkout List</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('checkoutnotice.store')}}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Checkout Notice Create</h4>
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <label for="brand_name_en" class="form-label">Checkout Notice Title:</label>
                            <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                              <input type="text" name="title" class="form-control border-start-0" id="title" value="{{ old('title')}}" placeholder="Enter checkout title" />
                            </div>
                            @error('title')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="col-md-12 mt-2">
                            <div class="form-group">
                              <label for="description" class="col-sm-3 col-form-label">Description:</label>
                              <div class="col-sm-12">
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Description">{{ old('description')}}</textarea>
                              </div>
                            </div>
                            @error('description')
                              <span class="text-danger" style="font-weight:bolder;">{{ $message }}</span>
                            @enderror
                          </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for="status">Status</label>
                                   <span class="text-danger">*</span>
                                  <select name="status" id="status" class="form-control form-select">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Disable</option>
                                  </select>
                              </div>
                           </div>
                           <div class="col-md-12 text-right mt-3">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit" style="float:right;">Submit</button>
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
        $('.brand_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    }); 
</script>
@endsection
