<div class="fluid-one_content-column">
    <div class="fluid-one_column-inner">
        <div class="sec-title">
            <div class="sec-title_title">{{$data->lebel}}</div>
            @php
                $title = preg_replace('/\*\*(.*?)\*\*/', "<span class='theme_color'>$1</span>", $data->title);
            @endphp
            <h2 class="sec-title_heading">{!! $title !!} <br></h2>
            <div class="sec-title_text">{{$data->short_description}}</div>
        </div>
    </div>
</div>
