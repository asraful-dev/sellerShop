@extends('layouts.frontend')
@section('content-frontend')
<main class="ps-page--my-account">
   <div class="ps-breadcrumb">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>User Information</li>
         </ul>
      </div>
   </div>
   <section class="ps-section--account">
      <div class="container">
         <div class="row">
            <div class="col-lg-4">
               <div class="card p-5">
                    @include('frontend.common.user_side_nav')
               </div>
            </div>
            @php
                $id = Auth::guard('web')->user()->id;
                $adminData = App\Models\User::where('role','user')->find($id);
            @endphp
            <div class="col-lg-8">
               <div class="card rounded-0 shadow-none border">
                  <div class="card-header pt-4 border-bottom-0">
                     <h5 class="mb-0 fs-18 fw-700 text-dark">User Password Change</h5>
                  </div>

                  <div class="card-body">
                    <form method="POST" action="{{  route('user.update.password') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{session('status')}}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                            </div>
                        @endif
                        <!-- Current Password-->
                        <label for="inputChoosePassword" class="form-label">Current Password</label> <span id="strength" class=""></span>
                        <div class="input-group mb-5" id="show_hide_password">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control border-end-0 pass_log_id" name="old_password"  autocomplete="new-password" id="inputChoosePassword" placeholder="Enter Current Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='fas fa-eye toggle-password'></i></a>
                        </div>
                        <!-- New Password-->
                        <label for="password-confirm" class="form-label">New Password</label>
                        <div class="input-group mb-5" id="show_hide_password">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control border-end-0 pass_log_id_confirm" name="new_password"  id="password-confirm" placeholder="Enter New Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='fas fa-eye toggle_password_confirm'></i></a>
                        </div>
                        <!-- Confirm Password-->
                        <label for="password-confirm" class="form-label">Confirm New Password</label>
                        <div class="input-group mb-5" id="show_hide_password">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control border-end-0 pass_log_id_confirm_new" name="confirm_password"  id="password-confirm" placeholder="Enter Confirmation Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='fas fa-eye toggle_password_confirm_new'></i></a>
                        </div>
                        <!-- Submit Button-->
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="ps-btn mt-3">Update Profile</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script type="text/javascript">
  $(document).on('click', '.toggle-password', function() {

      $(this).toggleClass("fa-eye fa-eye-slash");

      var input = $(".pass_log_id");
      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
  });
</script>

<script type="text/javascript">
  $(document).on('click', '.toggle_password_confirm', function() {

      $(this).toggleClass("fa-eye fa-eye-slash");

      var input = $(".pass_log_id_confirm");
      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
  });
</script>

<script type="text/javascript">
  $(document).on('click', '.toggle_password_confirm_new', function() {

      $(this).toggleClass("fa-eye fa-eye-slash");

      var input = $(".pass_log_id_confirm_new");
      input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
  });
</script>
@endsection

