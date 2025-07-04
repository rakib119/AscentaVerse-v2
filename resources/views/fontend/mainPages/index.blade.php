@extends('fontend.layout.layout')
@section('css')

@endsection
@section('mainContent')
    @include('fontend.section.homePageSection.banner_section')          {{-- Banner Section --}}
    @include('fontend.section.homePageSection.s2About.about_section')   {{-- About Section --}}
    @include('fontend.section.homePageSection.s4.service')              {{-- Service Section --}}
    @include('fontend.section.homePageSection.s7Faq.faqSection')        {{-- Faq & Contact Section --}}
    @include('fontend.section.homePageSection.team.team')               {{-- Team Section --}}
    @include('fontend.section.homePageSection.blog.blog')               {{-- Blog Section --}}
    @include('fontend.section.homePageSection.testimonial.testimonial') {{-- testimonial Section --}}
    {{-- @include('fontend.section.homePageSection.partner_section') --}}
    @include('fontend.section.homePageSection.s3Left.s3Left')         {{-- Partner Section --}}

@endsection
@section('javaScricpt')
    <script src="{{asset('assets/js/slide-show.js')}}"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 30,
                autoplay: true,
                // autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive:{
                    0:{ items:3 },
                    576:{ items:4 },
                    768:{ items:5 },
                    992:{ items:7 }
                }
            });
        });
    </script>
@endsection

