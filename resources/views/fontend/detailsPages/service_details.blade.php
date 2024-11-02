@extends('fontend.layout.layout')
@section('mainContent')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('assets/images/info/'.$data->value)}})">
        <div class="auto-container">
			<h2>Service Details</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>Service Details</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				<!-- Sidebar Side -->
                <div class="sidebar-side left-sidebar col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar">
						<!-- Contact Widget -->
						<div class="sidebar-widget contact-widget">
							<div class="widget-content"  style="background-image:url({{ asset('assets/images/background/8.jpg')}})">
								<div class="title">Contact us now</div>
								{{-- <div class="help">If need help!</div>
								<a class="phone" href="tel:+557-3452-234">557-3452-234</a>
								<div class="form">or go to contact form:</div> --}}
								<div class="button-box text-center">
									<a href="{{route('about')}}">Let’s start now <span class="fa-solid fa-link fa-fw"></span></a>
								</div>
							</div>
						</div>
					</aside>
				</div>

				<!-- Content Side -->
                <div class="content-side right-sidebar col-lg-8 col-md-12 col-sm-12">
					<div class="service-detail">
						@if ($details)
                            <div class="inner-box">
                                @if ($details?->photo1)
                                    <div class="image">
                                        <picture>
                                            <img src="{{ asset('assets/images/services/details/'.$details?->photo1) }}" alt="not Found" />
                                        </picture>
                                    </div>
                                @endif

                                <div class="lower-content">
                                    @if ($details?->content1)
                                        {!! $details?->content1 !!}
                                    @endif
                                    <div class="two-column">
                                        <div class="row clearfix">
                                            <!-- Column -->
                                            <div class="column col-lg-6 col-md-6 col-sm-12  mt-3">
                                                @if ($details?->photo2)
                                                    <div class="image-image">
                                                        <picture>
                                                            <img  style="border-radius: 5px;" src="{{ asset('assets/images/blogs/details/'.$details?->photo2) }}" alt="not Found" />
                                                        </picture>
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- Column -->
                                            <div class="column col-lg-6 col-md-6 col-sm-12  mt-3">
                                                @if ($details?->photo3)
                                                    <div class="image-image">
                                                        <picture>
                                                            <img  style="border-radius: 5px;" src="{{ asset('assets/images/blogs/details/'.$details?->photo3) }}" alt="not Found" />
                                                        </picture>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @if ($details?->content2)
                                        {!! $details?->content2 !!}
                                    @endif
                                </div>
                            </div>
                        @else
                            <h6 class="text-center text-danger">** Content not found **</h6>
                        @endif
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection
