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

	@include('fontend.section.blog.all_blogs')

@endsection
