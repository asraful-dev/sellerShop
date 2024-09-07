@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Agent</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Agent</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('all.agent') }}" class="btn btn-primary">Agent List</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('agent.update',$agent->id) }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Create Agent</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label">Name:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                  <input type="text" name="name" value="{{ $agent->name }}" class="form-control border-start-0" id="name" placeholder="Enter name" />
                                </div>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              
                              <div class="col-12 mt-1">
                                <label for="username" class="form-label">Username:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                  <input type="text" name="username" value="{{ $agent->username }}" class="form-control border-start-0" id="username" placeholder="Enter username" required />
                                </div>
                                @error('username')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="col-12 mt-1">
                                <label for="email" class="form-label">Email:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                  <input type="email" name="email" value="{{ $agent->email }}" class="form-control border-start-0" id="email" placeholder="Enter email" />
                                </div>
                                @error('email')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="col-12 mt-1">
                                <label for="phone" class="form-label">Phone:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                  <input type="number" name="phone" value="{{ $agent->phone }}" class="form-control border-start-0" id="phone" placeholder="Enter phone" min="0" required />
                                </div>
                                @error('phone')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              <div class="col-12 mt-1">
                                <label for="password" class="form-label">Password: <span class="text-light font-weight-bolder"></span></label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                  <input type="password" name="password" value="" class="form-control border-start-0" id="password" min="0" max="6" placeholder="Enter Password" />
                                </div>
                                @error('password')
                                  <span class="text-light font-weight-bolder">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="col-12 mt-1">
                                <label for="password_confirmation" class="form-label">Confirm Password: <span class="text-light font-weight-bolder"></label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                  <input type="password" name="password_confirmation" value="" class="form-control border-start-0" id="password_confirmation" min="0" max="6" placeholder="Enter Confirmation Password" />
                                </div>
                                @error('password_confirmation')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                              
                               <div class="col-12 mt-3">
                                   <!--========== Start Division Select All Data  ========-->
                                    <label>Division (আপনার বিভাগ নাম):</label>
	                                <select class="ps-select single-select" name="division_id" id="division_id" class="form-control" style="width: 100% !important;">
	                                	<option value="">Select Division</option>
	                                	@foreach(get_divisions() as $division)
                                          <option value="{{ $division->id }}">{{ $division->name_en }}</option>
                                        @endforeach
	                                </select>
                        	        <!--========== End Division Select All Data  ========-->
                                </div>
                                <div class="col-12 mt-3">
                                    <!--==== Start Division Select District All Data =====-->
                            		@php
                                        $districts = App\Models\District::where('status',1)->get();
                                    @endphp
                            		<div class="form-group">
                                        <label>District (আপনার জেলার নাম):</label>
    	                                <select class="ps-select single-select" name="district_id" id="district_id" class="form-control" style="width: 100% !important;" >
    	                                    <option value="">Select District</option>
    	                                    @foreach($districts as $district)
    	                                	    <option value="{{ $district->id }}">{{ $district->name_en }}</option>
    	                                	@endforeach
    	                                </select>
                                    </div>
                                	<!--==== End Division Select District All Data =====-->
                                </div>
                                <div class="col-12 mt-3">
                                   	<!--==== Start District Select Upazilla All Data =====-->
                            		@php
                                        $upazillas = App\Models\Upazila::where('status',1)->get();
                                    @endphp
                            		<div class="form-group">
                                        <label>Upazilla (আপনার উপজেলা নাম):</label>
    	                                <select class="ps-select single-select" name="upazilla_id" id="upazilla_id" class="form-control" style="width: 100% !important;" >
    	                                	<option value="">Select Upazilla</option>
    	                                	  @foreach($upazillas as $upazilla)
    	                                	    <option value="{{ $upazilla->id }}">{{ $upazilla->name_en }}</option>
    	                                	  @endforeach
    	                                </select>
                                    </div>
                                	<!--==== End District Select Upazilla All Data =====-->
                                </div>
                            <!--<div class="col-12 mt-2">-->
                            <!--    <div class="form-group">-->
                            <!--        <label class="form-label" for="roles" id="roles" required="">Agent Type:</label>-->
                            <!--        <select class="single-select form-control form-select" name="agent_type">-->
                            <!--            <option value="" selected disabled>Select Agent</option>-->
                            <!--                <option value="division">Division</option>-->
                            <!--                <option value="district">District</option>-->
                            <!--                <option value="upazilla">Upazilla</option>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
                           <div class="col-md-12 text-right mt-3">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit" style="float:right;">Update</button>
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
