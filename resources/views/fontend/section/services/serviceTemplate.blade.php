
<section class="services-card-section" style="margin-bottom: 50px !important;">
    <div class="auto-container">
        <!-- Header Section -->
        <div class="row">
            <div class="col-12">
                <div class="card-header-section mx-auto">
                    <div class="py-5">
                        <div class="sub-title ">{{$data->lebel}}</div>
                        @php
                            $title = preg_replace('/\*\*(.*?)\*\*/', "<span class='highlight'>$1</span>", $data->title);
                        @endphp
                        <div class="title mt-3">
                            {!! $title !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($services as $v)
                <div class="col-6 col-md-4 col-lg-3 mb-md-5">
                    <div class="card card-custom h-100">
                        <picture>
                            <img src="{{asset('assets/images/services/'.$v->thumbnail)}}" class="card-img-top mx-auto" alt="{{$v->title}}">
                        </picture>
                        <div class="card-body">
                            @if ($v->icon)
                                <div class="card-icon">
                                    <img src="{{asset('assets/images/services/icon/'.$v->icon)}}">
                                </div>
                            @endif

                            <div class="card-center">
                                <h5 class="card-title">{{$v->title}}</h5>
                                <p class="card-text">{{ Str::substr($v->short_description,0, 40) }}...</p>
                                <a class="btn-style-tean theme-btn btn-item" href="{{ route( 'service.details',$v->slug )}}">
                                    <div class="btn-wrap">
                                        <span class="text-one">{{$v->button_name}} <i class="fas fa-plus"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
