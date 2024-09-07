<section class="fluid-one">
    <div class="auto-container">
        <div class="faq-title my-5">
            <div class="faq-subheading pt-3">{{$data->lebel}}</div>
            @php
                $title = preg_replace('/\*\*(.*?)\*\*/', "<span class='theme_color'>$1</span>", $data->title);
            @endphp
            <h2 class="faq-heading">{!! $title !!}</h2>
        </div>

        <div class="d-flex align-items-center ">
            <!-- FAQ Column -->
            <div class="faq-column">
                <div class="accordion" id="accordionExample">
                    @foreach ($faqs as $v)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{$v->id}}" aria-expanded="false" aria-controls="collapse{{$v->id}}">
                                    {{$v->question}}
                                </button>
                            </h2>
                            <div id="collapse{{$v->id}}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{$v->answear}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            
