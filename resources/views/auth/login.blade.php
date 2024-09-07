@extends('layouts.frontend')
@section('content-frontend')
    <style>
        .ps-form--account {
            max-width: 430px;
            margin: 0 auto;
            padding-top: 0px;
        }

        .ps-form--account .ps-tab {
            background-color: black;
        }

        .ps-form--account .ps-checkbox>label {
            color: #fff;
        }

        p {
            color: #fff;
        }

        .ps-btn,
        button.ps-btn {
            background-color: red;
        }

        .ps-btn,
        button.ps-btn:hover {
            background-color: red;
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
                <form class="ps-form--account ps-tab-root" action="{{ route('login') }}" method="post">
                    @csrf
                    @php
                        $checkout_setting = App\Models\ChekoutSetting::where('status', 1)
                            ->latest()
                            ->get();
                    @endphp
                    @foreach ($checkout_setting as $setting)
                        @if ($setting->status == 1 && $setting->slug == 'order-click')
                            <div class="ps-section__header">
                                <a href="{{ route('home') }}" class="ps-btn ">আরও অর্ডার করতে এখানে ক্লিক করুন</a>
                            </div>
                        @endif
                    @endforeach

                    <ul class="ps-tab-list">
                        <li class="active"><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="sign-in">
                            <div class="ps-form__content">
                                <h5 style="color:#fff; text-align:center;font-weight:bolder;">Log In Your Account</h5>
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input class="form-control" id="username" name="username" type="text" min="0"
                                        placeholder="Enter Username">
                                    @error('username')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group form-forgot">
                                    <label for="password">Password:</label>
                                    <input class="form-control pass_log_id" name="password" type="password" id="password"
                                        placeholder="Enter Password">
                                    <a href="javascript:;" class="input-group-text mt-4 bg-transparent"><i
                                            class='fas fa-eye toggle-password'></i></a>
                                    @error('password')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="remember-me" name="remember-me" />
                                        <label for="remember-me">Rememeber me</label>
                                        <a style="float:right; color:#fff;" href="{{ route('password.request') }}">Forgot
                                            Password ?</a>
                                        <p class="mt-5">Don't have an account yet? <a href="{{ route('register') }}">Sign
                                                up here</a>
                                    </div>
                                </div>
                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Login</button>
                                </div>
                            </div>
                            <!-- <div class="ps-form__footer">
                                                                <p>Connect with:</p>
                                                                <ul class="ps-list--social">
                                                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                                                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                                                </ul>
                                                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).on('click', '.toggle-password', function() {

            $(this).toggleClass("fa-eye fa-eye-slash");

            var input = $(".pass_log_id");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });
    </script>
@endsection
