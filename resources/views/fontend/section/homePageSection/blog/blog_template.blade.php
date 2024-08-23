<section class="news-two">
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

        <div class="news-carousel owl-carousel owl-theme">
            @foreach ($blogs as $v)
                @php
                    if ($v->is_displayed_in_home !=1) {continue;}
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
            @endforeach
        </div>
    </div>
</section>
