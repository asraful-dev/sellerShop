@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Admin All User Create</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Admin All User Create</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('all.admin') }}" class="btn btn-primary">Edit Admin All User List</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('admin.update',$adminuser->id) }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Admin All User Edit</h4>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <label for="name" class="form-label">Name:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                  <input type="text" name="name" value="{{ $adminuser->name }}" class="form-control border-start-0" id="name" placeholder="Enter name" />
                                </div>
                                @error('name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="col-12 mt-1">
                                <label for="email" class="form-label">Email:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                  <input type="email" name="email" value="{{ $adminuser->email }}" class="form-control border-start-0" id="email" placeholder="Enter email" />
                                </div>
                                @error('email')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="col-12 mt-1">
                                <label for="phone" class="form-label">Phone:</label>
                                <div class="input-group input-group-lg"> <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                  <input type="number" name="phone" value="{{ $adminuser->phone }}" class="form-control border-start-0" id="phone" placeholder="Enter phone" min="0" required />
                                </div>
                                @error('phone')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            <div class="col-12 mt-2">
                                <div class="form-group">
                                    <label class="form-label" for="roles" id="roles" required="">Asign Roles</label>
                                    <select class="single-select form-control form-select" name="roles">
                                        <option value="" selected disabled>Select Roles</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $adminuser->hasRole($role->name) ? 'selected' : '' }} >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
