@extends('fontend.layout.layout')
@section('mainContent')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('assets/images/info/'.$data->value)}})">
        <div class="auto-container">
            <h2>About us</h2>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">Home</a></li>
                <li>About us</li>
            </ul>
        </div>
    </section>
    @include('fontend.section.homePageSection.s2About.about_section')   {{-- About Section --}}
    @include('fontend.section.homePageSection.team.team')               {{-- Team Section --}}
    <div class="mb-5"></div>
@endsection
@section('javaScricpt')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/667870459d7f358570d28c3a/1i137d4cn';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
@endsection
