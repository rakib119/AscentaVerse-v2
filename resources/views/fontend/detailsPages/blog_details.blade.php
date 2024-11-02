@extends('fontend.layout.layout')
@section('mainContent')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('assets/images/info/'.$data->value)}})">
        <div class="auto-container">
			<h2>Blog Details</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{route('home')}}">Home</a></li>
				<li>Blog Details</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-xl-9 col-lg-8 col-md-12 col-sm-12">
                    @if ($details)
                        <div class="blog-single">
                            <div class="inner-box">
                                @if ($details?->photo1)
                                    <div class="image">
                                        <picture>
                                            <img src="{{ asset('assets/images/blogs/details/'.$details?->photo1) }}" alt="not Found" />
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
                                            <div class="column col-lg-6 col-md-6 col-sm-12 mt-3">
                                                @if ($details?->photo2)
                                                    <div class="image-image">
                                                        <picture>
                                                            <img style="border-radius: 5px;" src="{{ asset('assets/images/blogs/details/'.$details?->photo2) }}" alt="not Found" />
                                                        </picture>
                                                        @if ($details?->video_link)
                                                            <a target="_blank" href="{{$details?->video_link}}" class="btn-video" savefrom_lm_index="0" savefrom_lm="1"><i class="fa fa-play"></i></a>
                                                        @endif
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
                        </div>
                    @else
                        <h6 class="text-center text-danger">** Content not found **</h6>
                    @endif
                </div>




				<!--Sidebar Side-->
                <div class="sidebar-side col-xl-3 col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">

						<!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <div class="sidebar-title">
                                <h4>Categories</h4>
                            </div>
                            <ul class="blog-cat">
                                @foreach ($categories as $v)
                                    <li><a href="{{route('blog.category',$v['cat_name'])}}">{{ $v['cat_name'] }} <span>{{$v['total_blogs']}}</span></a></li>
                                @endforeach
                            </ul>
                        </div>

						<!-- Popular Post Widget-->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title">
                                <h4>Recent News</h4>
                            </div>
                            @foreach ($blogs as $blog_id=>$v)
                                @php
                                    if($loop?->index ==7)  { break;}
                                    if($blog_id == $details?->blog_id )      { continue;}
                                    $dtls_link = route('blog-details',$v['slug']);
                                @endphp
                                <article class="post">
                                    <figure class="post-thumb">
                                        <a href="{{  $dtls_link }}" class="overlay-box">
                                        <img src="{{ $v['thumbnail'] }}" alt=""></a>
                                    </figure>
                                    <div class="text"><a href="{{  $dtls_link }}">{{ Str::substr($v['title'], 0, 30)."..." }}</a></div>
                                </article>
                            @endforeach
						</div>
					</aside>
				</div>

			</div>
		</div>
	</div>

@endsection
