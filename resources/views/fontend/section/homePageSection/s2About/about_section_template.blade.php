<section class="about-one">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Content Column -->
            <div class="about-one_content col-lg-6 col-md-12 col-sm-12">
                <div class="about-one_content-inner">
                    <div class="sec-title">
                        <div class="sec-title_title">{{ $data->lebel }}</div>
                        @php
                            $title = preg_replace('/\*\*(.*?)\*\*/', "<span>$1</span>", $data->title);
                        @endphp
                        <h2 class="sec-title_heading">{!! $title !!}</h2>
                        <div class="sec-title_text">{{$data->short_description}}</div>
                    </div>

                    <!-- About Info Tabs -->
                    <div class="about-info-tabs">
                        <!-- About Tabs -->
                        <div class="about-tabs tabs-box">

                            <!-- Tab Btns -->
                            <ul class="tab-btns tab-buttons clearfix">
                                <li data-tab="#prod-mission" class="tab-btn active-btn">{{$data->btn1}}</li>
                                <li data-tab="#prod-vision" class="tab-btn">{{$data->btn2}}</li>
                                <li data-tab="#prod-value" class="tab-btn">{{$data->btn1}}</li>
                            </ul>

                            <!-- Tabs Container -->
                            <div class="tabs-content">

                                <!-- Tab / Active Tab -->
                                <div class="tab active-tab" id="prod-mission">
                                    <div class="content">
                                        <div class="text">{{$data->description1}}</div>
                                    </div>
                                </div>

                                <!-- Tab -->
                                <div class="tab" id="prod-vision">
                                    <div class="content">
                                        <div class="text">{{$data->description2}}</div>
                                    </div>
                                </div>

                                <!-- Tab -->
                                <div class="tab" id="prod-value">
                                    <div class="content">
                                        <div class="text">{{$data->description3}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- About One Detail -->
                    <a class="about-one_detail lightbox-video" href="{{$data->link2}}">
                        {{$data->link1}}
                        <span class="play-icon"><span class="fa-solid fa-play fa-fw"></span><i class="ripple"></i></span>
                    </a>

                </div>
            </div>
            <!-- Image Column -->
            <div class="about-one_image-column col-lg-6 col-md-12 col-sm-12">
                <div class="about-one-image-inner">
                    <div class="about-one_color-layer"></div>
                    <div class="about-cicle_layer">
                        <img src="{{asset('assets/images/icons/circle-layer.png')}}" alt="" />
                    </div>
                    <div class="about-one_image">
                        <img src="{{asset('assets/images/about/'.$data->img1)}}" alt="" />
                    </div>
                    <div class="about-one_bold-text">{{ $data->lebel }}</div>
                    <div class="about-one_image-text">{{$data->img2}}</div>
                </div>
            </div>
        </div>
    </div>
</section>
