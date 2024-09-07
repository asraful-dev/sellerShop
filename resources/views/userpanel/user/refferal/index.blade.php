@extends('layouts.userpanel')
@section('user_content')
<div class="d-flex align-items-center px-6 py-5">
	<div class="text-light mr-auto">
	    <h2 class="fw-100 mb-0">Refferal link</h2>
	    <span class="lead-1 text-info">User Refferal link</span>
	</div>
</div>

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
	        <button type="submit" onclick="copyToClipboard()"  class="my-3 mx-1 btn btn-round btn-theme">Copy Link</button>
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
							<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://supremesafecost.com/register?refer_id={{ Auth::user()->username }}" class="mb-3 mx-1 btn btn-label btn-facebook"><span class="btn-lb"><i class="fab fa-facebook-f"></i></span>Facebook</a>
						</div>
						<div class="col">
							<a href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url=http://supremesafecost.com/register?refer_id={{ Auth::user()->username }}&amp;title=Share+your+linkedin+profile&amp;summary=" target="_blank" class="mb-3 mx-1 btn btn-label btn-linkedin"><span class="btn-lb"><i class="fab fa-linkedin-in"></i></span>LinkedIn</a>
						</div>
						<div class="col">
							<a href="https://wa.me/?text=http://supremesafecost.com/register?refer_id={{ Auth::user()->username }}" target="_blank" class="mb-3 mx-1 btn btn-label btn-linkedin"><span class="btn-lb"><i class="fab fa-whatsapp"></i></span>Whatsapp</a>
						</div>
						<div class="col">
							<a target="_blank" href="https://telegram.me/share/url?url=http:/https://supremesafecost.com/register?refer_id={{ Auth::user()->username }}&amp;text=Share+your+telegram+profile" class="mb-3 mx-1 btn btn-label btn-dribbble"><span class="btn-lb"><i class="fab fa-dribbble"></i></span>Telegram</a>
						</div>
					</div>
					<!--end row-->
				</div>
			</div>
	    </div>
	
	</div>
</div>

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
