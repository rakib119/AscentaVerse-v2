
<section class="fluid-one">
    <div class="auto-container">
            <div class="team-heading pb-5">
            <div class="sub-title ">{{$data->lebel}}</div>
            @php
                $title = preg_replace('/\*\*(.*?)\*\*/', "<span class='highlight'>$1</span>", $data->title);
            @endphp
            <div class="title mt-3">
                {!! $title !!}
            </div>
        </div>
        <div class="outer-container d-flex align-items-center">
            <div class="owl-carousel owl-theme pb-5">
                 @foreach ($banners as $v)
                    <div class="item"><img class="img-fluid" src="{{asset("assets/images/partners/".$v->image_name)}}" alt="{{$v->image_name}}" /></div>
                @endforeach
            </div>

        </div>
    </div>
</section>
