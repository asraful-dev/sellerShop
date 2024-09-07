@extends('layouts.userpanel')
@section('user_content')
    <!-- main content -->
    <div class="main-container">
        <div class="overflow-hidden">
            <!-- profile -->
            <div id="profile" class="page-content-fl">
                <div class="text-light px-4 py-4">
                    <h4 class="mb-0">User Profile View</h4>
                </div>
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 panel-header-oly">
                            <div class="profile-header bs-c bp-t d-flex align-items-end flex-column"
                                style="background: url({{ asset('frontend/index_files/profile-img-04.jpg') }}); height: 300px;">
                                <div class="flex-1 w-100 position-relative">
                                    <div class="position-absolute r-6 b-6">
                                        <a href="{{ route('user.profile.edit') }}"
                                            class="btn btn-lg btn-round btn-theme mr-4"><i class="fas fa-user-plus"></i>
                                            <span class="d-none d-md-inline">Edit Profile</span></a>
                                        <!-- <a href="#" class="btn btn-lg btn-round btn-theme"><i class="fas fa-comment-dots"></i> <span class="d-none d-md-inline">Follow</span></a> -->
                                    </div>
                                </div>
                                <div class="profile-header-nav row no-gutters align-items-center py-5 w-100">
                                    <div class="col-2 col-lg-3">
                                        @php
                                            $id = Auth::guard('web')->user()->id;
                                            $adminData = App\Models\User::where('role', 'user')->find($id);
                                        @endphp
                                        <div class="position-relative px-4">
                                            <img class="profile-avatar rounded-circle position-absolute absolute-center-X b-0 mx-6"
                                                src="{{ !empty($adminData->profile_photo) ? url('public/upload/user_images/' . $adminData->profile_photo) : url('public/upload/user1.png') }}"
                                                alt="Avatar">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">

                                        <nav class="navbar navbar-expand-lg mnh-auto">
                                            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="icon-multimedia-menu lead-3 text-warning"></span>
                                            </button>
                                            <!--
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                  <ul class="list-unstyled mb-0 d-flex justify-content-around w-100 flex-column flex-lg-row">
                                    <li class="py-2 py-lg-0"><a href="http://scanthemes.com/demo/HTML/beid/profile.html#" class="text-uppercase">Timeline</a></li>
                                    <li class="py-2 py-lg-0"><a href="http://scanthemes.com/demo/HTML/beid/profile.html#" class="text-uppercase">About</a></li>
                                    <li class="py-2 py-lg-0"><a href="http://scanthemes.com/demo/HTML/beid/profile.html#" class="text-uppercase">Friends</a></li>
                                    <li class="py-2 py-lg-0"><a href="http://scanthemes.com/demo/HTML/beid/profile.html#" class="text-uppercase">Photos</a></li>
                                    <li class="py-2 py-lg-0"><a href="http://scanthemes.com/demo/HTML/beid/profile.html#" class="text-uppercase">More</a></li>
                                  </ul>
                                </div> -->
                                        </nav>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid p-0">
                    <!-- profile -->
                    <div class="row no-gutters panel-top-line">
                        <div class="col-xl-12 panel-right-line">
                            <div class="px-5 py-6">
                                <div class="d-flex align-items-center mb-6">
                                    <div>
                                        <span class="profile-title lh-1 fw-600 mb-2">Name:
                                            {{ $adminData->name ?? 'Null' }}</span>
                                        <span class="fw-300 text-secondary">Email: {{ $adminData->email ?? 'Null' }}</span>
                                    </div>
                                    <!--   <div class="ml-auto lh-1 d-flex text-right">
                            <div class="mr-4">
                              <h5 class="mb-2 text-warning">212</h5>
                              <span>Follows</span>
                            </div>
                            <div>
                              <h5 class="mb-2 text-warning">37</h5>
                              <span>Posts</span>
                            </div>
                          </div> -->
                                </div>
                                <div class="text-light">
                                    <!-- <p class="fw-400 text-secondary">Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p> -->
                                    <!--  <div>
                            <h6 class="lh-5 mb-0"><i class="far fa-calendar-alt mr-1"></i> Joined:</h6>
                            <p class="fw-400 text-secondary">May 29, 2018</p>
                          </div> -->
                                    <div>
                                        <h6 class="lh-5 mb-0"><i class="fas fa-map-marker-alt"></i> Location:</h6>
                                        <p class="fw-400 text-secondary">{{ $adminData->country ?? 'Null' }}</p>
                                    </div>
                                    <!--  <div>
                            <h6 class="lh-5 mb-0"><i class="fas fa-globe mr-1"></i> Website:</h6>
                            <p class="fw-400 text-secondary">www.scthemes.space</p>
                          </div> -->
                                    <div class="d-flex mt-4">
                                        <!-- facebook -->
                                        <a href="#">
                                            <div class="subtn-social rounded-circle mr-2">
                                                <div class="subtn-social-item">
                                                    <i class="fab fa-facebook-f"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- /.facebook -->

                                        <!-- twitter -->
                                        <a href="#">
                                            <div class="subtn-social rounded-circle mr-2">
                                                <div class="subtn-social-item">
                                                    <i class="fab fa-twitter"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- /.twitter -->

                                        <!-- google+ -->
                                        <a href="#">
                                            <div class="subtn-social rounded-circle mr-2">
                                                <div class="subtn-social-item">
                                                    <i class="fab fa-google-plus-g"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- /.google+ -->

                                        <!-- linkedIn -->
                                        <a href="#">
                                            <div class="subtn-social rounded-circle">
                                                <div class="subtn-social-item">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- /.linkedIn -->

                                    </div>
                                </div>
                            </div>
                            <div>

                            </div>
                        </div>
                        <!-- /.panel-card -->
                    </div>
                </div>
                <!-- /.profile -->
            </div>
        </div>
        <!-- /.main content -->
    @endsection
