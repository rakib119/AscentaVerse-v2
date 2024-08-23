@extends('fontend.layout.layout')
@section('mainContent')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('assets/images/info/'.$data->value)}})">
        <div class="auto-container">
            <h2>Services</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">Home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </section>
    @include('fontend.section.services.all_service')


@endsection
