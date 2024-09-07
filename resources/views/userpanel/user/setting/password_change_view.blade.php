@extends('layouts.userpanel')
@section('user_content')
<div class="d-flex align-items-center px-6 py-5">
  <div class="text-light mr-auto">
      <h2 class="fw-100 mb-0">Password Update</h2>
      <span class="lead-1 text-info">User Password Update</span>
  </div>
</div>
<!-- Transparent -->
<div class="mt-0 mb-5 m-5" style="background-image: url({{asset('frontend/assets/img/bg/bg-2.jpg')}});" data-overlay="9">
  <div class="position-relative my-2">
    <form class="input-transparent" action="{{  route('user.update.password') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mt-0 mb-7">
       
        <div>
          <!-- <code>Balance Request</code> -->
        </div>
      </div>


      @if (session('status'))
        <div class="alert alert-success" role="alert">
           {{session('status')}}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
           {{session('error')}}
        </div>
      @endif

      <label for="inputChoosePassword" class="form-label">Current Password</label> <span id="strength" class=""></span>
      <div class="input-group mb-5" id="show_hide_password">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" class="form-control border-end-0 pass_log_id" name="old_password"  autocomplete="new-password" id="inputChoosePassword" placeholder="Enter Current Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='fas fa-eye toggle-password'></i></a>
      </div>
      @error('old_password')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <label for="password-confirm" class="form-label">New Password</label>
      <div class="input-group mb-5" id="show_hide_password">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" class="form-control border-end-0 pass_log_id_confirm" name="new_password"  id="password-confirm" placeholder="Enter New Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='fas fa-eye toggle_password_confirm'></i></a>
      </div>

      @error('new_password')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <label for="password-confirm" class="form-label">Confirm New Password</label>
      <div class="input-group mb-5" id="show_hide_password">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" class="form-control border-end-0 pass_log_id_confirm_new" name="confirm_password"  id="password-confirm" placeholder="Enter Confirmation Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='fas fa-eye toggle_password_confirm_new'></i></a>
      </div>
      @error('confirm_password')
        <small class="text-danger">{{ $message }}</small>
      @enderror

      <div class="mt-5">
        <div class="form-group">
            <button class="my-3 mx-1 btn btn-round btn-theme" type="submit">Update</button>
            <a href="{{ url()->previous() }}" style="float:right;" class="my-3 mx-1 btn btn-round btn-danger" type="button">Go Back</a>
        </div>
      </div>
    </form>
  </div>
</div>

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