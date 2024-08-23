<section class="testimonial-section"  >
    <div class="pattern-layer-one" style="background-image: url({{ asset('assets/images/background/pattern-25.png')}}"></div>
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Title Column -->
            <div class="title-column col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <!-- Sec Title -->
                    <div class="sec-title_two">
                        <div class="sec-title_two-title">{{$data->lebel}}</div>
                        @php
                            $title = preg_replace('/\*\*(.*?)\*\*/', "<span>$1</span>", $data->title);
                        @endphp
                        <h2 class="sec-title_two-heading"> {!! $title !!}</h2>
                        <div class="sec-title_two-text"> {{ $data->short_description }}</div>
                    </div>
                </div>
            </div>

            <!-- Carousel Column -->
            <div class="carousel-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column" style="background-image: url({{ asset('assets/images/background/pattern-26.png')}})">
                    <div class="authors-outer">

                        @foreach ($testimonials as $v)
                            @php
                                $classArr = array('one','two','three','four');
                                $i = $loop->index;
                                if ($i==4) { break;}
                            @endphp
                            <div class="author-{{ $classArr[$i] }}">
                                <img src="{{ asset('assets/images/testimonials/'.$v->photo)}}" alt="{{$v->name}}" />
                            </div>
                        @endforeach
                    </div>
                    <div class="single-item-carousel owl-carousel owl-theme">
                        @foreach ($testimonials as $v)


                            <!-- Testimonial Block -->
                            <div class="testimonial-block">
                                <div class="inner-box">
                                    <div class="rating">
                                        @for ($i=1; $i<= $v->rating ; $i++)
                                            <span class="fa fa-star"></span>
                                        @endfor
                                    </div>
                                    <div class="text">“{{$v->comment}}”</div>
                                </div>
                                <div class="author-box">
                                    <div class="box-inner">
                                        <span class="author-image">
                                            <img src="{{ asset('assets/images/testimonials/'.$v->photo)}}" alt="{{$v->name}}" />
                                        </span>
                                        <h5>{{$v->name}}</h5>
                                        <div class="designation">{{$v->designation}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
