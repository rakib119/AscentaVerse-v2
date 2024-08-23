@extends('fontend.layout.layout')
@section('mainContent')
<!-- Page Title -->
<section class="page-title" style="background-image:url({{asset("assets/images/background/4.jpg")}})">
    <div class="auto-container">
        <h2>Kyc</h2>
        <ul class="bread-crumb clearfix">
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Kyc</li>
        </ul>
    </div>
</section>
@endsection
