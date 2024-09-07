@extends('layouts.frontend')
@section('content-frontend')
@section('title')
   Forgot-Password Page
@endsection
<style>
    .ps-form--account {
        max-width: 430px;
        margin: 0 auto;
        padding-top:0px;
    }
</style>
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account">
        <div class="container">
            <form class="ps-form--account ps-tab-root" action="{{ route('password.email') }}" method="post">
                @csrf
                @php
                    $checkout_setting  = App\Models\ChekoutSetting::where('status',1)->latest()->get();
                @endphp
                @foreach($checkout_setting as $setting)
                    @if($setting->status == 1 && $setting->slug == 'order-click')
                        <div class="ps-section__header">
                            <a href="{{ route('home') }}" class="ps-btn ">আরও অর্ডার করতে এখানে  ক্লিক করুন</a>
                        </div>
                    @endif
                @endforeach
                <ul class="ps-tab-list">
                    <li class="active">
                        <a href="#">Forgot your password?</a>
                    </li>
                </ul>
                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h5>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" id="email" name="email" value="{{ old('email')}}" type="email" placeholder="Enter your email" required>
                                @error('email')
                                    <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="remember-me" name="remember-me" />
                                    <label for="remember-me">Rememeber me</label>
                                    <a style="float:right;" href="{{ route('login') }}">Login ?</a>
                                    <p class="mt-5">Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a>
                                </div>
                            </div>
                            <div class="form-group submtit">
                                <button class="ps-btn ps-btn--fullwidth">Email Password Reset Link</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
