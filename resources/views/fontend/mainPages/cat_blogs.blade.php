@extends('fontend.layout.layout')
@section('mainContent')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('assets/images/info/'.$data->value)}})">
        <div class="auto-container">
			<h2>Our Blog</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>Our Blog</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<section class="news-page">
        <div class="auto-container">
            <div class="row clearfix">
                @foreach ($blogs as $v)
                    @php
                        $dtls_link = route('blog-details',$v->slug);
                    @endphp
                    <div class="news-block_one col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        @php
                            $dtls_link = route('blog-details',$v->slug);
                        @endphp
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="{{ $dtls_link }}"><img src="{{ asset('assets/images/blogs/'.$v->thumbnail)}}" alt="{{$v->title}}" /></a>
                                </div>
                                <div class="lower-content">
                                    <h5>
                                        <a href="{{ $dtls_link }}">{{$v->title}}</a>
                                    </h5>
                                    <div class="text">
                                        {{ Str::substr($v->short_description, 0, 50).'...'  }}
                                    </div>
                                    <a class="btn-style-tean theme-btn btn-item" href="{{ $dtls_link }}">
                                        <div class="btn-wrap">
                                            <span class="text-one">{{$v->button_name}} <i class="fas fa-plus"></i></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
