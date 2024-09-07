@extends('layouts.userpanel')
@section('user_content')
<div class="d-flex align-items-center px-6 py-5">
	<div class="text-light mr-auto">
	    <h2 class="fw-100 mb-0">Chat</h2>
	    <span class="lead-1 text-info">User Chat</span>
	</div>
</div>

<div class="row no-gutters panel-top-line">
  <div class="col-xl-3 panel-right-line">
    <div class="email-search h-100">
      <form class="input-light h-100">
        <div class="input-group h-100 rounded-0">
          <div class="input-group-prepend border-0 input-group-prepend">
            <span class="input-group-text lead-1 pl-4"><span class="icon-messenger-user-avatar"></span></span>
          </div>
          <input type="text" placeholder="Search User" aria-label="Search" class="form-control form-control-lg h-100">
        </div>
      </form>
    </div>
  </div>
  <div class="col-xl-9 panel-header-oly px-4">
    <header class="h-100 d-flex align-items-center py-3">
      <div class="d-flex align-items-center w-100">
        <div class="position-relative">
          <a href="#">
            <img src="{{ asset('frontend/index_files/1.jpg ') }}" class="rounded-circle img-xs" alt="Avatar">
            <i class="fas fa-circle text-warning small-4 position-absolute b-0 r-0"></i>
          </a>
        </div>
        <div class="pl-3 lead-1 fw-500">
          <a href="#">{{ Auth::user()->name }}</a>
        </div>
        <div class="ml-auto">
          <a href="#" class="icon-star-shape-favorite"></a>
        </div>
      </div>
    </header>
  </div>
  <div class="col-12">
    <div class="row no-gutters panel-top-line">
      <div class="col-xl-3 panel-right-line">
        <div class="d-flex flex-column chat-cat-list sVH" data-scrollbar="tab" tabindex="3" style="height: 304px; overflow: hidden; outline: none;">
          <!-- item -->
          <div class="email-cat-item active">
            <div>
              <a href="#">
                <div class="px-5 py-4 d-flex align-items-center">
                  <div class="d-xl-none d-lp-inline chat-dialogue-avatar chat-dialogue-avatar-sm rounded-circle bp-c bs-c br-n" style="background: url(assets/img/avatar/1.jpg)"></div>
                  <div class="flex-1 pl-4 pl-xl-0 pl-lp-4">
                    <div class="d-flex align-items-center">
                      <span class="lead-1 fw-500">User Name</span>
                      <span class="small-3 ml-auto">Today 3:34 AM</span>
                    </div>
                    <div>
                      <div class="d-flex align-items-center small-2">
                        <div>
                          <span class="icon-closed-envelope-email mr-1"></span>
                          <span>Thank you!</span>
                        </div>
                        <div class="ml-auto">
                          <span class="icon-school-paper-clip text-warning"></span>
                          <span class="badnge badge-primary rounded-2 px-2 ml-1">65</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- /.item -->
        </div>
      </div>
      <div class="col-xl-9 pl-lg-0">
        <div class="d-flex h-100">
          <div class="flex-1 py-4 pr-4">
            <div class="px-4" data-scrollbar="chat" tabindex="4" style="overflow: hidden; outline: none;">
              <div class="chat-dialogue-sc sVHF" style="height: 211px;">
                <ul class="chat-list-section list-unstyled text-center py-4 pr-6 mb-0">
                  <!-- time -->
                  <li class="badge badge-info fw-600 mb-6">Chat History</li>
                  <!-- /.time -->
                  <!-- message -->
                  <li class="chat-dialogue-item d-flex align-items-center justify-content-end mb-6">
                    <div class="chat-dialogue-me">
                      Hello there. Thanks for the follow. Did you notice, that I am an egg? A talking egg? Damn!
                    </div>
                    <div>
                      <div class="chat-dialogue-avatar rounded-circle bp-c bs-c br-n" style="background: url(assets/img/avatar/2.jpg)"></div>
                    </div>
                  </li>
                  <!-- /.message -->
                  
                  <!-- message -->
                  <li class="chat-msg-item mb-6">
                    <div class="chat-dialogue-item d-flex align-items-center">
                      <div>
                        <div class="chat-dialogue-avatar rounded-circle bp-c bs-c br-n" style="background: url(assets/img/avatar/1.jpg)"></div>
                      </div>
                      <div class="chat-dialogue-me">
                        If you do this, you will be dead to me.
                      </div>
                    </div>
                    <div class="chat-dialogue-item d-flex align-items-center">
                      <div class="chat-dialogue-me">
                        I knew you wouldn't be able to see it through.
                      </div>
                    </div>
                  </li>
                  <!-- /.message -->
                </ul>
              </div>
              
            </div>
            <div id="sVHF_form" class="px-4 pt-4">
              <form class="input-light" action="" method="post">
                <div class="input-group">
                  <div class="input-group-prepend input-group-prepend">
                    <span class="input-group-text"><i class="icon-smiling-face"></i></span>
                  </div>
                  <input type="text" class="form-control">
                  <div class="input-group-append input-group-append">
                    <span class="input-group-text"><i class="icon-photography-frame"></i></span>
                  </div>
                  <div class="input-group-append ml-3">
                    <button class="btn btn-lg btn-theme" type="button"><i class="fas fa-paper-plane mr-1"></i>Send</button>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- user fund/main amount show ajax -->
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="package"]').on('change', function(){
          var id = $(this).val();
          $('#package_amount').val(id);
          if(id != null) {
              $.ajax({
                  url: "{{  url('/user/amount/show/ajax') }}/"+id,
                  type:"GET", 
                  dataType:"json",
                  success:function(package) {
                    // $('#package_amount').val(package.main_wallet);
                    // $('#fund_amount').val(package.fund_wallet);
                  },
              });
          }else {
            alert('danger');
          }
      });
  });
</script> 
@endsection
