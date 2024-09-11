@php
    $web_info = session()->get('web_info');
    if (!$web_info) {
        $web_info = DB::table('genarel_infos')->select('field_name','value')->get();
        session()->put('web_info', $web_info);
    }
    $dataArray = array();
    foreach ($web_info as $v)
    {
        $dataArray[$v->field_name] = $v->value;
    }
    extract($dataArray);

    $logo          = asset('assets/images/info/'.$logo);
    $favicon       = asset('assets/images/info/'.$favicon);
    $logo_white    = asset('assets/images/info/'.$logo_white);
@endphp
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{ $web_title }}</title>
<link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">
<link rel="icon" href="{{ $favicon }}" type="image/x-icon">
<!-- Stylesheets -->
<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/slide-show.css')}}">
<link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
@yield('css')
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">



<!-- Responsive -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>
    <!-- Main Header / Header Style Three -->
    @if ($notice !='')
        <marquee direction="left" height="35px" width="100%" class="scroolbar" bgcolor="#23a592">
            <p class="text-white" style="font-family: var(--font-family-FiraSans);line-height: 32px;">{{ $notice }}</h4>
        </marquee>
    @endif
    <header class="main-header header-style-three">
        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Logo Box -->
                    <div class="logo"><a href="{{ route('home') }}">
                        <picture><img src="{{ $logo }}"></picture>
                    </a></div>


                    <div class="nav-outer d-flex justify-content-between align-items-center flex-wrap">

                        <!-- Main Menu -->
                        <nav class="main-menu show navbar-expand-md">
                            <div class="navbar-header">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li><a href="{{ route('home') }}">Home</a> </li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('services') }}">Services</a></li>
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route('contact_us') }}">Contact</a></li>
                                    @guest
                                        <li><a href="{{route('register')}}">Register</a></li>
                                    @endguest

                                    <li>
                                        @auth
                                            <a class="d-block d-sm-none" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                        @else
                                            <a class="d-block d-sm-none" href="{{ route('login') }}">Login</a>
                                        @endauth
                                    </li>
                                </ul>
                            </div>

                        </nav>
                        <!-- Main Menu End-->

                        <div class="outer-box d-flex align-items-center">
                            <!-- Button Box -->
                            <div class="button-box">
                                @auth
                                    <a class="btn-style-two theme-btn btn-item"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <div class="btn-wrap">
                                            <span class="text-one">Logout<i class="fas fa-sign-in-alt"></i></span>
                                            <span class="text-two">Logout<i class="fas fa-sign-in-alt"></i></span>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                    {{-- <a class="btn-style-five theme-btn btn-item" href="#">
                                        <div class="btn-wrap">
                                            <span class="text-one">{{auth()->user()->name}}</span>
                                            <span class="text-two">{{auth()->user()->name}}</span>
                                        </div>
                                    </a> --}}
                                @else
                                    <a class="btn-style-five theme-btn btn-item" href="{{route('login')}}">
                                        <div class="btn-wrap">
                                            <span class="text-one">Login<i class="fas fa-sign-in-alt"></i></span>
                                            <span class="text-two">Login<i class="fas fa-sign-in-alt"></i></span>
                                        </div>
                                    </a>
                                @endauth
                            </div>

                            <!-- Mobile Navigation Toggler -->
                            <div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('home') }}" title=""><picture><img src="{{ $logo }}"></picture></a>
                    </div>

                    <!-- Right Col -->
                    <div class="right-box d-flex align-items-center flex-wrap">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                        <!-- Main Menu End-->

                        <div class="outer-box d-flex align-items-center">
                            <!-- Button Box -->

                            <div class="button-box">
                                @auth
                                    <a class="btn-style-two theme-btn btn-item"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <div class="btn-wrap">
                                            <span class="text-one">Logout<i class="fas fa-sign-in-alt"></i></span>
                                            <span class="text-two">Logout<i class="fas fa-sign-in-alt"></i></span>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                @else
                                    <a class="btn-style-two theme-btn btn-item" href="{{route('login')}}">
                                        <div class="btn-wrap">
                                            <span class="text-one">Login<i class="fas fa-sign-in-alt"></i></span>
                                            <span class="text-two">Login<i class="fas fa-sign-in-alt"></i></span>
                                        </div>
                                    </a>
                                @endauth
                            </div>

                            <!-- Mobile Navigation Toggler -->
                            <div class="mobile-nav-toggler"><span class="icon fa-solid fa-bars fa-fw"></span></div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-020-x-mark"></span></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ route('home') }}"> <picture><img src="{{ $logo }}"></picture></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>

        </div>
        <!-- End Mobile Menu -->

    </header>

        @yield('mainContent')

        <footer class="main-footer" style="background-image:url('assets/images/background/pattern-11.png')">
            <div class="auto-container">
                <!-- Widgets Section -->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!-- Big Column -->
                        <div class="big-column col-lg-6 col-md-12 col-sm-12">
                            <div class="row clearfix">

                                <!-- Footer Column -->
                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget logo-widget">
                                        <div class="logo">
                                            <a href="{{ route('home') }}"> <picture><img src="{{ $logo_white }}" /></picture></a>
                                        </div>
                                        <div class="text">{{ $company_description }}</div>
                                    </div>
                                </div>

                                <!-- Footer Column -->
                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget newsletter-widget">
                                        <h4>{{ $footer_heading_1 }}</h4>
                                        <div class="text">{{ $footer_heading_description }}</div>
                                        <!-- Social Box -->
                                        <ul class="social-box">
                                            <li><a target="_blank" href="{{ $social_link1 }}" class="fa-brands fa-facebook-f fa-fw"></a></li>
                                            <li><a target="_blank" href="{{ $social_link2 }}" class="fa-brands fa-twitter fa-fw"></a></li>
                                            <li><a target="_blank" href="{{ $social_link3 }}" class="fa-brands fa-instagram fa-fw"></a></li>
                                            <li><a target="_blank" href="{{ $social_link4 }}" class="fa-brands fa-youtube fa-fw"></a></li>
                                        </ul>
                                        <!-- End Social Box -->

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Big Column -->
                        <div class="big-column col-lg-6 col-md-12 col-sm-12">
                            <div class="row clearfix">

                                <!-- Footer Column -->
                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget contact-widget">
                                        <h4>{{ $footer_heading_2 }}</h4>
                                        <ul class="contact-list">
                                            <li> <span class="icon fa fa-home"></span>{!! $address !!}</li>
                                            <li> <span class="icon fa fa-link"></span> {{ $phone }}</li>
                                            <li> <span class="icon fa fa-envelope"></span> {{ $email }}</li>
                                        </ul>
                                        <div class="timing">
                                            {!! $timing !!}
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer Column -->
                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget contact-widget">
                                        <h4>{{ $footer_heading_3 }}</h4>
                                        <ul class="contact-list">
                                                @for ($i=1; $i<=7; $i++)
                                                    @php
                                                        $var = 'link'.$i;
                                                    @endphp
                                                    @if (isset($$var) && $$var !='')
                                                        @php
                                                            $linkEx = explode('**',$$var);
                                                        @endphp
                                                            <li> <span class="icon fa fa-link"></span> <a target="_blank" href=" {{ $linkEx[1] }} "> {{ $linkEx[0] }} </a> </li>
                                                    @endif
                                                @endfor

                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="copyright">{{date('Y')}} &copy; All rights reserved by <a href="/">AscentaVerse</a></div>
                </div>

            </div>
        </footer>
</div>
<!-- End PageWrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/appear.js') }}"></script>
<script src="{{ asset('assets/js/owl.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/odometer.js') }}"></script>
<script src="{{ asset('assets/js/nav-tool.js') }}"></script>
<script src="{{ asset('assets/js/mixitup.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/tilt.jquery.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

@yield('javaScricpt')
</body>
</html>
