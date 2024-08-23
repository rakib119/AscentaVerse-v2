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

            <div class="contact-one_form-column  col-lg-6 col-md-12 col-sm-12">
                <div class="contact-one_form-inner d-none d-sm-block">
                    <!-- Default Form -->
                    <div class="default-form">
                        <form method="post" action="">
                            <div class="row clearfix">

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Your Name" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Web Address" required="">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="email" placeholder="Email Address" required="">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea class="" name="message" placeholder="Type Your Message"></textarea>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <!-- Button Box -->
                                    <div class="button-box">
                                        <button class="theme-btn btn-style-seven">
                                            <span class="btn-wrap">
                                                <span class="text-one">Send Message Now</span>
                                                <span class="text-two">Send Message Now</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- End Default Form -->
                </div>
            </div>

        </div>
    </div>
</section>
