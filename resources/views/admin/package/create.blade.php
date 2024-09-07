@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Package Create</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Package Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('package.list') }}" class="btn btn-primary">Package List</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('package.store') }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Create a New Package</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label">Package Name:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                  <input type="text" name="name" value="{{ old('name') }}" class="form-control border-start-0" id="name" placeholder="Enter Package name" />
                                </div>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="amount" class="form-label">Package Amount:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text">৳</span>
                                  <input type="number" name="amount" value="{{ old('amount') }}" class="form-control border-start-0" id="amount" placeholder="Enter Package amount" min="0" />
                                </div>
                                @error('amount')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="day" class="form-label">Package Day:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='fas fa-box'></i></span>
                                  <input type="number" name="day" value="{{ old('day') }}" class="form-control border-start-0" id="day" placeholder="Enter Package day" min="0" />
                                </div>
                                @error('day')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="percentage" class="form-label">Package Percentage:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='fas fa-building'></i></span>
                                  <input type="number" name="percentage" value="{{ old('percentage') }}" class="form-control border-start-0" id="percentage" placeholder="Enter Package percentage" min="0" />
                                </div>
                                @error('percentage')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="package_point" class="form-label">Package Point:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text">৳</span>
                                  <input type="number" name="package_point" value="{{ old('package_point') }}" class="form-control border-start-0" id="package_point" placeholder="Enter Package point" min="0" />
                                </div>
                                @error('package_point')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                          <div class="col-md-12 mt-3">
                              <div class="form-group">
                                <label for="icon">Package Icon <span class="text-light font-weaight-bolder">(Size:700,400):</span></label>
                                <span class="text-danger">*</span>
                                @error('icon')
                                  <span class="text-danger" style="font-weight:bolder;">{{ $message }}</span>
                                @enderror
                                <div class="mb-2">
                                  <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
                                </div>
                                <div class="input-group mb-3">
                                  <input type="file" class="form-control image" name="icon" id="icon">
                                  <label class="input-group-text" for="icon">Upload</label>
                                </div>
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
