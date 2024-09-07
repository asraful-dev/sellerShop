@extends('admin.admin_master')
@section('admin')
<link rel="stylesheet" href="{{asset('vendor/select2/dist/css/select2.min.css')}}">
@endsection

    <div class="header bg-gradient-info pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row py-5">

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-6">
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" action="{{route('admin.quiz.store')}}" method="POST">
                    @csrf
                       
                        <!--<div class="form-group">-->
                        <!--    <label class="form-control-label" for="hints">Daily ROI</label>-->
                        <!--    <input type="text" id="hints" class="form-control" name="hints" placeholder="Write Quiz Hints if has any">-->

                           
                        <!--</div>-->
                    <div class="col text-center">
                        <button type="submit" class="btn btn-info" onclick="return confirm('Are You Sure?')">Create ROI</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
<script src="{{asset('vendor/select2/dist/js/select2.min.js')}}"></script>

@endsection

