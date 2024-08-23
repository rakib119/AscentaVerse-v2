@php
    extract($dataArray);
    $logo_white    = asset('assets/images/info/'.$logo_white);
@endphp
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
                                    <li><a href="{{ $social_link1 }}" class="fa-brands fa-facebook-f fa-fw"></a></li>
                                    <li><a href="{{ $social_link2 }}" class="fa-brands fa-twitter fa-fw"></a></li>
                                    <li><a href="{{ $social_link3 }}" class="fa-brands fa-instagram fa-fw"></a></li>
                                    <li><a href="{{ $social_link4 }}" class="fa-brands fa-youtube fa-fw"></a></li>
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
                                                    <li> <span class="icon fa fa-link"></span> <a href=" {{ $linkEx[1] }} "> {{ $linkEx[0] }} </a> </li>
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
