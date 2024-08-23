@php
    extract($dataArray);
    $logo    = asset('assets/images/info/'.$logo);
@endphp



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
                                    @guest
                                        <li><a href="{{route('register')}}">Register</a></li>
                                    @endguest

                                    <li>
                                        @auth
                                            <a class="d-block d-sm-none" href="#">{{auth()->user()->name}}</a>
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
