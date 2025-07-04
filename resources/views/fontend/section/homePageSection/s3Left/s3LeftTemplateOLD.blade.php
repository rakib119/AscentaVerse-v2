<div class="fluid-one_content-column">
    <div class="fluid-one_column-inner">
        <!-- Sec Title -->
        <div class="row border-row">
            @foreach ($banners as $v)
                @php
                    if ( $loop->iteration >3) break;
                @endphp
                <div class="service-block_two col-lg-4 col-md-6 col-sm-12">
                    <div class="service-block_two-inner">
                        <div class="service-block_two-image">
                            <img src="{{asset("assets/images/partners/".$v->image_name)}}"
                                alt="{{$v->image_name}}" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row border-row">
            @foreach ($banners as $v)
                @php
                    if ($loop->iteration <4) continue;
                    if ($loop->iteration >6) break;
                @endphp
                <div class="service-block_two col-lg-4 col-md-6 col-sm-12">
                    <div class="service-block_two-inner">
                        <div class="service-block_two-image">
                            <img src="{{asset("assets/images/partners/".$v->image_name)}}"
                                alt="{{$v->image_name}}" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
