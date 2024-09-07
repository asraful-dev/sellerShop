@extends('layouts.frontend')
@section('content-frontend')
<main class="ps-page--my-account">
   <div class="ps-breadcrumb">
      <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>Referral Link Share</li>
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
            <div class="col-lg-8">
               <div class="card rounded-0 shadow-none border">
                  <div class="card-header pt-4 border-bottom-0">
                    <h5 class="mb-0 fs-18 fw-700 text-dark">Referral Link Share</h5>
                  </div>
                  <div class="card-body">
                    <!-- Transparent -->
                    <div class="mt-0 mb-5 m-5" style="background-image: url({{asset('frontend/assets/img/bg/bg-2.jpg')}});" data-overlay="9">
                        <div class="position-relative my-2">
                            <div class="mt-5">
                                <label>Refferal link:</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="refferal" value="{{ url('register') }}?refer_id={{ Auth::user()->username }}" name="refferal" required>
                                    @error('refferal')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-5">
                            <div class="form-group">
                                <button type="submit" onclick="copyToClipboard()"  class="btn btn-success btn-lg">Copy Link</button>
                            </div>
                            </div>

                            <div class="mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title">Social Link Share</h5>
                                        </div>
                                        <hr/>
                                        <div class="row row-cols-auto g-3">
                                            <div class="col">
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://supremesafecost.com/register?refer_id={{ Auth::user()->username }}" class="mb-3 mx-1 btn btn-info btn-lg"><span class="btn-lb"><i style="margin-right: 10px;" class="fa-brands fa-facebook"></i></span>Facebook</a>
                                            </div>
                                            <div class="col">
                                                <a href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url=http://supremesafecost.com/register?refer_id={{ Auth::user()->username }}&amp;title=Share+your+linkedin+profile&amp;summary=" target="_blank" class="mb-3 mx-1 btn btn-info btn-primary btn-lg"><span class="btn-lb"><i style="margin-right: 10px;" class="fa-brands fa-linkedin"></i></span>LinkedIn</a>
                                            </div>
                                            <div class="col">
                                                <a href="https://wa.me/?text=http://supremesafecost.com/register?refer_id={{ Auth::user()->username }}" target="_blank" class="mb-3 mx-1 btn btn-success btn-lg"><span class="btn-lb"><i style="margin-right: 10px;" class="fab fa-whatsapp"></i></span>Whatsapp</a>
                                            </div>
                                            <div class="col">
                                                <a target="_blank" href="https://telegram.me/share/url?url=http:/https://supremesafecost.com/register?refer_id={{ Auth::user()->username }}&amp;text=Share+your+telegram+profile" class="mb-3 mx-1  btn btn-danger btn-lg"><span class="btn-lb"><i style="margin-right: 10px;" class="fa-brands fa-telegram"></i></span>Telegram</a>
                                            </div>
                                        </div>
                                        <!--end row-->
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
   </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function copyToClipboard() {
        var copyGfGText = document.getElementById("refferal");
        copyGfGText.select();
        document.execCommand("copy");
        alert('Refferal Link Copy');
    }
</script>
@endsection

