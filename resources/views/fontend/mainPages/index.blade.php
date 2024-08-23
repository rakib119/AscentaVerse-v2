@extends('fontend.layout.layout')
@section('css')

@endsection
@section('mainContent')
    @include('fontend.section.homePageSection.banner_section')          {{-- Banner Section --}}
    @include('fontend.section.homePageSection.s2About.about_section')   {{-- About Section --}}
    @include('fontend.section.homePageSection.partner_section')         {{-- Partner Section --}}
    @include('fontend.section.homePageSection.s4.service')              {{-- Service Section --}}
    @include('fontend.section.homePageSection.s7Faq.faq')               {{-- Faq & Contact Section --}}
    @include('fontend.section.homePageSection.team.team')               {{-- Team Section --}}
    @include('fontend.section.homePageSection.blog.blog')               {{-- Blog Section --}}
    @include('fontend.section.homePageSection.testimonial.testimonial') {{-- testimonial Section --}}

@endsection
@section('javaScricpt')
    <script src="{{asset('assets/js/slide-show.js')}}"></script>
@endsection

