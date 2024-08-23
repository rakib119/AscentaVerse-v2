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
                	<div class="blog-single">
						<div class="inner-box">
							<div class="image">
								<img src="{{ asset('assets/images/resource/news-7.jpg') }}" alt="" />
							</div>
							<div class="lower-content">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum The man, who is in a stable condition inhospital, has "potentially life-changing injuries" after the overnight attack in Garvagh, County Lonodonderry. He was shot in the arms and legs."What sort of men would think it is accepttable to subject a young girl to this level of brutality and violence?</p>
								<p>"Every child has the right to feel safe and protected in their own home - how is this poor child going to sleep tonight or in coming nights? What are the long term effects on her going to be?"</p>
								<h4>Content without backward-compatible data.</h4>
								<p>"There is absolutely no justification for an attack like this in our communities and we must all work together to bring those responsible to justice and to stop this from happening to another child." Their community. I wonder how they wou if their own child witnessed such a level of violence?</p>
								<p>Earlier this month, <span>the PSNI launched a hard-hitting advertisement campaign</span> aimed at changing public attitudes to paramilitary attacks.</p>
								<div class="two-column">
									<div class="row clearfix">
										<!-- Column -->
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<div class="lower-image">
												<img src="{{ asset('assets/images/resource/news-8.jpg') }}" alt="" />
											</div>
										</div>
										<!-- Column -->
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<div class="lower-image">
												<img src="{{ asset('assets/images/resource/news-9.jpg') }}" alt="" />
											</div>
										</div>
									</div>
								</div>
								<h4>A Kentucky woman who was accused last year.</h4>
								<p>The intruders chased the girl in the house and threatened her when she hid from them, according to the PSNI Limavady Facebook page. "She came out petrified with her Piggy Bank, HER PIGGY BANK! hoping that the men would take it and leave her dad alone," one outraged officer wrote. Denounce with righteous indignation and dislike men who are so beguiled & demoralized our power of pleasure is to be welcomed. Denounce with the indignation and dislike men who are so beguiled & demoralized our power of choice.</p>
								<blockquote>
									“What sort of men would think it is acceptable to subject to this level of <br> brutality and violence? an attack like thiop.”
									<span class="designation">Neil Borton</span>
								</blockquote>
								<p>The intruders chased the girl in the house and threatened her when she hid from them, according to the PSNI to Limavady Facebook page.</p>
								<p>"She came out petrified with her Piggy Bank, HER PIGGY BANK! hoping that the men would take it and leave her dad alone," one outraged officer wrote. especially in capital projects and the suppliers and consultants that work for you know the value of a customer like that. As a consultant executing two projects for a large multinational, I realise how very difficult it sometimes can be on the receiving-end.</p>
							</div>
						</div>
					</div>
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
                                    if($loop->index ==5)  { break;}
                                    if($blog_id ==2)      { continue;}
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
