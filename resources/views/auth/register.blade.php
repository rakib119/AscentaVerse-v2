@extends('fontend.layout.layout')

@section('mainContent')
<!-- Banner One -->
<section class="banner-one">
    <div class="bubble-dotted">
        <span class="dotted dotted-1"></span>
        <span class="dotted dotted-2"></span>
        <span class="dotted dotted-3"></span>
        <span class="dotted dotted-4"></span>
        <span class="dotted dotted-5"></span>
        <span class="dotted dotted-6"></span>
        <span class="dotted dotted-7"></span>
        <span class="dotted dotted-8"></span>
        <span class="dotted dotted-9"></span>
        <span class="dotted dotted-10"></span>
    </div>
    <div class="auto-container">
        <div class="banner-one_shadow-layer" style="background-image:url({{asset("assets/images/background/pattern-27.png")}})"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="z-index: 1;">
                    <div class="sec-title centered">
                        <div class="sec-title_title">Register</div>
                        <h3 class="sec-title_heading">Passionate Personalities, <br> <span class="theme_color">Versatile</span> Brains</h3>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Mr. XXXXX" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- EMAIL --}}
                            <div class="row ">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@gmail.com">
                                        <div class="input-group-append">
                                            <button onclick="validateEmail()" id="otp-email-sending-btn" class="otp-style-btn theme-btn btn-item" type="button"> <span id="otp-email-sending-btn-html">Send Otp</span>
                                            </button>
                                        </div>
                                    </div>
                                    <p id="otp-sending-message"></p>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 d-none" id="email_verification_box" >
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Verify Otp') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="email-otp" type="text" class="form-control @error('email_otp') is-invalid @enderror" name="email_otp" placeholder="Enter Otp">
                                        <div class="input-group-append">
                                            <button class="otp-style-btn theme-btn btn-item" onclick="validateEmailOtp()" type="button" id="verifyBtn"><span>Confirm</span></button>
                                        </div>
                                    </div>
                                    <p id="email_otp_error"></p>
                                </div>
                            </div>
                            {{-- Phone Number --}}
                            <div class="row">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="01*********">
                                        <div class="input-group-append">
                                            <button onclick="validateMobileNumber()" id="otp-phone-sending-btn" class="otp-style-btn theme-btn btn-item" type="button"> <span id="otp-phone-sending-btn-html">Send Otp</span>
                                            </button>
                                        </div>
                                    </div>
                                    <p id="phone-otp-sending-message"></p>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 d-none" id="phone_verification_box" >
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Verify Otp') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="phone-otp" type="text" class="form-control @error('phone_otp') is-invalid @enderror" name="phone_otp" placeholder="Enter Otp">
                                        <div class="input-group-append">
                                            <button class="otp-style-btn theme-btn btn-item" onclick="validateMobileOtp()" type="button" id="verifyBtn"><span>Confirm</span></button>
                                        </div>
                                    </div>
                                    <p id="phone_otp_error"></p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn-style-three theme-btn btn-item">
                                        <div class="btn-wrap">
                                            <span class="text-one">Register<i class="fas fa-sign-in-alt"></i></span>
                                            <span class="text-two">Register<i class="fas fa-sign-in-alt"></i></span>
                                        </div>
								    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

