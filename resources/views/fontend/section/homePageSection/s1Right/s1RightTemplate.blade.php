<div class="fluid-one_carousel-column">
    <div class="image-container-wrapper">
        <div class="image-container">
            <div class="slider-container">
                @foreach ($banners as $v)
                    <div class="slide" style="background-image: url('{{asset('assets/images/banners/'.$v->image_name)}}')"></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="d-block d-xl-none">
        <div class="d-flex justify-content-center mt-3">
            <div class="button-box ">
                <a class="btn-style-five theme-btn btn-item" href="{{$data->link1}}">
                    <div class="btn-wrap">
                        <span class="text-one">{{$data->btn1}}<i class="fa-solid fa-plus"></i></span>
                        <span class="text-two">{{$data->btn1}}<i class="fa-solid fa-plus"></i></span>
                    </div>
                </a>
            </div>
            <div class="button-box" style="margin-left: 15px;">
                <a class="btn-style-two theme-btn btn-item" href="{{$data->link2}}">
                    <div class="btn-wrap">
                        <span class="text-one">{{$data->btn2}}<i class="fa-solid fa-plus"></i></span>
                        <span class="text-two">{{$data->btn2}}<i class="fa-solid fa-plus"></i></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
