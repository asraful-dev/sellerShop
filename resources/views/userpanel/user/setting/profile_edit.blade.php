@extends('layouts.userpanel')
@section('user_content')
    <div class="main-container">
        <div class="overflow-hidden">
            <!-- input-group -->
            <div id="input-group" class="page-content-fl">
                <div class="d-flex align-items-center px-6 py-5">
                    <div class="text-light mr-auto">
                        <h2 class="fw-100 mb-0">User Profile Update</h2>
                    </div>
                </div>

                <div class="mt-0 mb-5 m-5" style="background-image: url({{ asset('frontend/assets/img/bg/bg-2.jpg') }});"
                    data-overlay="9">
                    <div class="container-fluid p-0">
                        <div class="row panel-top-line">
                            <div class="col">
                                <div class="py-7">
                                    <div class="form_controls_area">
                                        <div class="mb-5">
                                            <div class="row">
                                                <div class="col-md-8 mx-auto">
                                                    @php
                                                        $id = Auth::guard('web')->user()->id;
                                                        $adminData = App\Models\User::where('role', 'user')->find($id);
                                                    @endphp
                                                    <!-- Input group -->
                                                    <form method="POST"
                                                        action="{{ route('user.profile.update', $adminData->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mt-1">
                                                            <div class="pb-4">
                                                                <code>Name:</code>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-user"></i></span>
                                                                </div>
                                                                <input type="text" class="form-control" name="name"
                                                                    id="controlFormControlInput1"
                                                                    value="{{ $adminData->name }}" placeholder="Enter name">
                                                                @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- <div class="mt-1">
	                            <div class="pb-4">
	                              <code>User Name:</code>
	                            </div>
	                            <div class="input-group">
	                              <div class="input-group-prepend">
	                                <span class="input-group-text"><i class="fas fa-user"></i></span>
	                              </div>
	                              <input type="text" name="username" class="form-control" id="controlFormControlInput1" value="{{ $adminData->username }}" readonly style="background-color:#091121;" placeholder="Enter Username">
	                              @error('username')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
	                            </div>
	                          </div> --}}

                                                        <div class="mt-5">
                                                            <div class="pb-4">
                                                                <code>Email:</code>
                                                            </div>
                                                            <div class="input-group">
                                                                <input type="email" name="email"
                                                                    value="{{ $adminData->email }}" class="form-control"
                                                                    placeholder="Enter Email">
                                                                @error('email')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">@example.com</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-1">
                                                            <div class="pb-4">
                                                                <code>Phone:</code>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-phone"></i></span>
                                                                </div>
                                                                <input type="number" name="phone" class="form-control"
                                                                    id="controlFormControlInput1"
                                                                    value="{{ $adminData->phone }}"
                                                                    placeholder="Enter phone"
                                                                    style="background-color:#091121;" readonly>
                                                                @error('phone')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="mt-5">
                                                            <div class="pb-4">
                                                                <code>Address:</code>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i
                                                                            class="fas fa-shopping-cart"></i></span>
                                                                </div>
                                                                <input type="text" name="address"
                                                                    value="{{ $adminData->address }}" class="form-control"
                                                                    placeholder="Enter Address">
                                                                @error('address')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-5">
                                                            <div class="pb-4">
                                                                <code>Profile Photo:</code>
                                                            </div>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"></span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="profile_photo"
                                                                        class="custom-file-input" id="image">
                                                                    @error('profile_photo')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                    <label class="custom-file-label" for="customFile">Choose
                                                                        file</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <img id="showImage" class="rounded avatar-lg mt-3"
                                                                    src="{{ !empty($adminData->profile_photo) ? url('public/upload/user_images/' . $adminData->profile_photo) : url('public/upload/user1.png') }}"
                                                                    alt="No Image" width="80px" height="70px;">
                                                            </div>
                                                        </div>

                                                        <div class="mt-5">
                                                            <div class="form-group">
                                                                <div class="input-group-append">
                                                                    <button class="my-3 mx-1 btn btn-round btn-theme"
                                                                        type="submit">Update</button>
                                                                </div>
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
                    </div>
                </div>
            </div>
            <!-- /.input-group -->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Site Contact logo Show -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
