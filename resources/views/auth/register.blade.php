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

        /* .form-control {
                                    border: 2px solid red;
                                } */
        .ps-form--account .ps-form__content h5 {
            text-align: center;
            color: #fff;
            font-weight: 700;
        }

        .form-group>label {
            color: #ffffff;
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
                <form class="ps-form--account ps-tab-root" action="{{ route('register') }}" method="post">
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
                        <li class="active"><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="sign-in">
                            <div class="ps-form__content">
                                <h5>Register An Account</h5>

                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input class="form-control" id="name" name="name" value="{{ old('name') }}"
                                        type="text" placeholder="Enter your name">
                                    @error('name')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div>
                                @php
                                    $random = Illuminate\Support\Str::random(6);
                                    $random_no = strtoupper($random);
                                @endphp
                                <span id="match_username" class=""></span>
                                <span id="notmatch_username" class=""></span>
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input class="form-control" id="username" name="username" type="text"
                                        placeholder="Enter Username" value="{{ $random_no }}">
                                    @error('username')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input class="form-control" id="email" name="email" value="{{ old('email') }}"
                                        type="email" placeholder="Enter email address">
                                    @error('email')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!--========== Start Division Select All Data  ========-->
                                {{-- <div class="form-group">
                                    <label>Division (আপনার বিভাগ নাম):</label>
	                                <select class="ps-select" name="division_id" id="division_id" class="form-control" style="width: 100% !important;" required>
	                                	<option value="">Select Division</option>
	                                	@foreach (get_divisions() as $division)
                                          <option value="{{ $division->id }}">{{ $division->name_en }}</option>
                                        @endforeach
	                                </select>
                                </div> --}}
                                <!--========== End Division Select All Data  ========-->

                                <!--==== Start Division Select District All Data =====-->
                                {{-- <div class="form-group">
                                    <label>District (আপনার জেলার নাম):</label>
	                                <select class="ps-select" name="district_id" id="district_id" class="form-control" style="width: 100% !important;" required>
	                                	<option value="">Select District</option>
	                                </select>
                                </div> --}}
                                <!--==== End Division Select District All Data =====-->

                                <!--==== Start District Select Upazilla All Data =====-->
                                {{-- <div class="form-group">
                                    <label>Upazilla (আপনার উপজেলা নাম):</label>
	                                <select class="ps-select" name="upazilla_id" id="upazilla_id" class="form-control" style="width: 100% !important;" required>
	                                	<option value="">Select Upazilla</option>
	                                </select>
                                </div> --}}
                                <!--==== End District Select Upazilla All Data =====-->

                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                                        type="number" min="0" placeholder="Enter phone" required>
                                    @error('phone')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <style type="text/css">
                                    #match {
                                        font-size: 17px;
                                        color: red;
                                        font-weight: bold;
                                        text-align: center;
                                        padding: 0px 28px;
                                    }

                                    #match_username {
                                        font-size: 10px;
                                        color: red;
                                        font-weight: bold;
                                        text-align: left;
                                        padding: 0px 0px;
                                    }

                                    #notmatch_username {
                                        font-size: 10px;
                                        color: green;
                                        font-weight: bold;
                                        text-align: left;
                                        padding: 0px 0px;
                                    }

                                    #match_referby {
                                        font-size: 17px;
                                        color: red;
                                        font-weight: bold;
                                        text-align: center;
                                        padding: 0px 20px;
                                    }

                                    #match_placement_id {
                                        font-size: 17px;
                                        color: red;
                                        font-weight: bold;
                                        text-align: center;
                                        padding: 0px 20px;
                                    }
                                </style>
                                <span id="match" class="ml-5"></span>
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

                                <div class="form-group form-forgot">
                                    <label for="confirm_password">Confirm Password:</label>
                                    <input class="form-control pass_log_id2" type="password" name="password_confirmation"
                                        id="confirm_password" placeholder="Enter Confirmation Password">
                                    <a href="javascript:;" class="input-group-text mt-4 bg-transparent"><i
                                            class='fas fa-eye toggle-password1'></i></a>
                                    @error('password_confirmation')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <span id="match_referby" class="ml-5"></span>
                                <span id="notmatch_referby" class="ml-5"></span>
                                <div class="form-group">
                                    <label for="refer_by">Refer By:</label>
                                    <input type="text" id="refer_by" class="form-control" name="refer_by"
                                        value="{{ $_GET['refer_id'] ?? 'admin' }}" placeholder="Refer ID">
                                    @error('refer_by')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- <span id="match_placement_id" class="ml-5"></span> --}}
                                {{-- <div class="form-group">
                                    <label for="placement_id">Placement Id:</label>
                                    <input type="text" id="placement_id" class="form-control" name="placement_id" value="" placeholder="Enter Placement ID">
                                    @error('placement_id')
                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                                {{-- <div class="form-group">
                                    <label>Placement:</label>
                                    <select class="form-control" name="placement" aria-label="Default select example">
                                        <option selected>Select Position</option>
                                        <option value="left" id="left_placement">Left Placment</option>
                                        <option value="right">Right Placment</option>
                                    </select>
                                </div> --}}

                                <div class="form-group">
                                    <div class="ps-checkbox">
                                        <input class="form-control" type="checkbox" id="remember-me"
                                            name="remember-me" />
                                        <label for="remember-me">Rememeber me</label>
                                        <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                                    </div>
                                </div>
                                <div class="form-group submtit">
                                    <button class="ps-btn ps-btn--fullwidth">Register</button>
                                </div>
                            </div>
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

    <script type="text/javascript">
        $(document).on('click', '.toggle-password1', function() {

            $(this).toggleClass("fa-eye fa-eye-slash");

            var input = $(".pass_log_id2");
            input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
        });
    </script>

    <script>
        $("#confirm_password").on("keyup", function(event) {
            var passowrd = $('#password').val();
            var confirm_pass = $('#confirm_password').val();
            if (passowrd == confirm_pass) {
                $('#match').text('Password matched !');
                $('#match').addClass('fw-bold');
                $('#match').addClass('success');
            } else {
                $('#match').text('Password not matched!');
                $('#match').removeClass('fw-bold');
                $('#match').addClass('text-danger');
                $('#match').removeClass('success');
                $(".userFalse").removeClass('d-none');
                $(".userTrue").addClass('d-none');
            }
        });
    </script>

    <!-- start ajax username check -->
    <script type="text/javascript">
        $('#username').keyup(function() {
            var username = $(this).val();
            //   alert(username);
            if (username) {
                $.ajax({
                    url: "{{ url('check/register/refer') }}/" + username,
                    type: "GET",
                    dataType: "json",
                    success: function(success) {
                        console.log(success.name);
                        $('#match_username').html(success.name);
                        $('#match_username').html(success.name);
                    }


                });
            } else {
                // alert('Please Provide Valid Information.');
            }
        });
    </script>
    <!-- end ajax username check -->

    <!-- start ajax refer by check -->
    <script type="text/javascript">
        $('#refer_by').keyup(function() {
            var refer_by = $(this).val();
            //   alert(refer_by);
            if (refer_by) {
                $.ajax({
                    url: "{{ url('check/register/refer/by/user') }}/" + refer_by,
                    type: "GET",
                    dataType: "json",
                    success: function(success) {
                        console.log(success);
                        $('#match_referby').html(success.name);
                        // $('#notmatch_referby').html(success.phone);
                    }


                });
            } else {
                // alert('Please Provide Valid Information.');
            }
        });
    </script>
    <!-- end ajax refer by check -->

    <!-- start ajax placement_id  check -->
    <script type="text/javascript">
        $('#placement_id').keyup(function() {
            var placement_id = $(this).val();
            // alert(placement_id);
            if (placement_id) {
                $.ajax({
                    url: "{{ url('check/register/placement/') }}/" + placement_id,
                    type: "GET",
                    dataType: "json",
                    success: function(success) {
                        console.log(success);
                        $('#match_placement_id').html(success);
                    }


                });
            } else {
                // alert('Please Provide Valid Information.');
            }
        });
    </script>
    <!-- end ajax placement_id  check -->
    <!--===============  Start Division To District Show Ajax ===============-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/division-district/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="district_id"]').html(
                                '<option value="" selected="" disabled="">Select District</option>'
                            );
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    capitalizeFirstLetter(value.name_en) +
                                    '</option>');
                            });
                            $('select[name="upazilla_id"]').html(
                                '<option value="" selected="" disabled="">Select District</option>'
                            );
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            function capitalizeFirstLetter(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }

        });
    </script>
    <!--===============  End Division To District Show Ajax ===============-->

    <!--===============  Start  District To Upazilla Show Ajax ===============-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="district_id"]').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/district-upazilla/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="upazilla_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="upazilla_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <!--===============  End  District To Upazilla Show Ajax ===============-->
@endsection
