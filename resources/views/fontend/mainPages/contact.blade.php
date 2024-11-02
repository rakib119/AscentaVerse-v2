@extends('fontend.layout.layout')
@php
    extract($dataArray);
    $title = preg_replace('/\*\*(.*?)\*\*/', "<span>$1</span>", $title);
    $office_address     = asteriskSeparate($btn1);
    $telephone_number   = asteriskSeparate($link1);
    $mail_address       = asteriskSeparate($link2);
@endphp
@section('mainContent')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('assets/images/info/'.$contact_background)}})">
        <div class="auto-container">
            <h2>Contact-us</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">Home</a></li>
                <li>Contact-us</li>
            </ul>
        </div>
    </section>

    <!-- Contact One -->
    <section class="contact-one" style="background-image:url({{asset('assets/images/background/map-1.png')}})">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <div class="left-box">
                        <div class="sec-title_title">{{$lebel}}</div>

                        <h2 class="sec-title_heading">{!! $title !!}</h2>
                    </div>
                    <div class="right-box">
                        <div class="sec-title_text">{!! $short_description !!}</div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <!-- Contact Block -->
                        <div class="contact-block">
                            <div class="block-inner">
                                <span class="icon"><img src="{{asset('assets/images/info/'.$address_icon_img)}}" alt="" /></span>
                                    {!! $office_address !!}
                            </div>
                        </div>

                        <!-- Contact Block -->
                        <div class="contact-block">
                            <div class="block-inner">
                                <span class="icon"><img src="{{asset('assets/images/info/'.$call_icon_img)}}" alt="" /></span>
                                {!! $telephone_number !!}
                            </div>
                        </div>

                        <!-- Contact Block -->
                        <div class="contact-block">
                            <div class="block-inner">
                                <span class="icon"><img src="{{asset('assets/images/info/'.$message_icon_img)}}" alt="" /></span>
                                {!! $mail_address !!}
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-8 col-md-12 col-sm-12">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Message Sent Successfully.</strong>
                            Thank you for reaching out. Your message has been received, and our administrative team will contact you shortly.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="inner-column">
                        <!-- Contact Form -->
                        <div class="contact-form">
                            <form method="post" action="{{route('send_message')}}" id="contact-form">
                                <div class="row clearfix">
                                    @csrf
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="name" placeholder="Your name*" required="">
                                        @error('name')
                                            <h6 class="text-danger"> {{ $message }}</h6>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Email adress <span class="text-danger">*</span> </label>
                                        <input type="email" name="email" placeholder="Email" required="">
                                        @error('email')
                                            <h6 class="text-danger"> {{ $message }}</h6>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" placeholder="Phone" required="">
                                        @error('phone')
                                            <h6 class="text-danger"> {{ $message }}</h6>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <label>Subject <span class="text-danger">*</span> </label>
                                        <input type="text" name="subject" placeholder="Subject" required="">
                                        @error('subject')
                                            <h6 class="text-danger"> {{ $message }}</h6>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Your message <span class="text-danger">*</span></label>
                                        <textarea class="" name="message" placeholder="Your text here..."></textarea>
                                        @error('message')
                                            <h6 class="text-danger"> {{ $message }}</h6>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="btn-style-seven theme-btn">
                                            <span class="btn-wrap">
                                                <span class="text-one">Send message</span>
                                                <span class="text-two">Send message</span>
                                            </span>
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- End Comment Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact One -->

    <!-- Map One -->
    <section class="map-one">
        <div class="map-outer">
            <iframe src="{{$description1}}" allowfullscreen=""></iframe>
        </div>
    </section>
<!-- End Map One -->

@endsection
@section('javaScricpt')
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/66e01e3950c10f7a00a6d52f/1i7dnc51u';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
@endsection
