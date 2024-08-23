@extends('fontend.layout.layout')
@section('mainContent')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('assets/images/info/'.$img->value)}})">
        <div class="auto-container">
			<h2>Team Member Details</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{route('home')}}">Home</a></li>
				<li><a href="#">Team Member Details</a></li>
				<li>{{$data->name;}}</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<section class="about-two">
		<div class="about-two_pattern-two" style="background-image:url({{asset('assets/images/background/pattern-13.png')}})"></div>
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Content Column -->
				<div class="about-two_image-column col-lg-5 col-md-12 col-sm-12">
					<div class="about-two_pattern-one" style="background-image:url({{asset('assets/images/background/pattern-12.png')}})"></div>
					<div class="about-two_image2">
						<img src="{{asset('assets/images/teams/'.$data->photo)}}" alt="" />
					</div>
				</div>

				<!-- Content Column -->
				<div class="about-two_content col-lg-7 col-md-12 col-sm-12">
					<div class="about-two_content-inner">
						<div class="sec-title_two">
							<h2 class="sec-title_two-heading">{{$data->name;}}</h2>
                            <div style="font-size: 15px;color: #0F67F6;"> {{$data->designation;}}</div>
						</div>
						<div class="about-two_text">{!!$data->short_description;!!}</div>

                        <div class="about-two_feature2">
							<div class="row clearfix">
								<div class="about-two_block2 col-lg-12 col-md-12 col-sm-12">
									<div class="about-two_block-inner2">
										<span class="about-two_block-icon2">
											<img src="{{asset('assets/images/icons/contact-2.png')}}" alt="" />
										</span>
										<h6 class="about-two_block-heading">{!!$data->phone;!!}</h6>
									</div>
								</div>
							</div>
						</div>
                        <div class="about-two_feature2">
							<div class="row clearfix">
								<div class="about-two_block2 col-lg-12 col-md-12 col-sm-12">
									<div class="about-two_block-inner2">
										<div class="about-two_block-icon2">
											<img src="{{asset('assets/images/icons/contact-3.png')}}" alt="" />
										</div>
                                        <div class=" d-flex align-items-center">
                                            <h6 class="about-two_block-heading">{!!$data->email;!!} <br>&nbsp;</h6>
                                        </div>
									</div>
								</div>
							</div>
						</div>
                        <div class="about-two_feature2">
							<div class="row clearfix">
								<div class="about-two_block2 col-lg-12 col-md-12 col-sm-12">
									<div class="about-two_block-inner2">
										<div class="about-two_block-icon2">
											<img src="{{asset('assets/images/icons/contact-1.png')}}" alt="" />
										</div>
                                        <div class=" d-flex align-items-center">
                                            <h6 class="about-two_block-heading">{!!$data->address;!!} </h6>
                                        </div>
									</div>
								</div>
							</div>
						</div>
                        <div class="d-flex dtls-icon">
                            <a href="{{$data->link1}}"> {!! $iconArray[$data->icon1] !!} </a>
                            <a href="{{$data->link2}}"> {!! $iconArray[$data->icon2] !!} </a>
                            <a href="{{$data->link2}}"> {!! $iconArray[$data->icon3] !!} </a>
                        </div>
					</div>
				</div>
                @if ($data->description)
                    <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                        <h3> {{$data->details_title;}}</h3>
                        <p class="mt-3">
                            {!! $data->description !!}
                        </p>
                    </div>
                @endif
			</div>
		</div>
	</section>

@endsection
