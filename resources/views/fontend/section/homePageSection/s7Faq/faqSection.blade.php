@include('fontend.section.homePageSection.s7Faq.faq')

            <div class="contact-one_form-column  col-lg-6 col-md-12 col-sm-12">
                <div class="contact-one_form-inner d-none d-sm-block">
                    <!-- Default Form -->
                    <div class="default-form">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Message Sent Successfully.</strong>
                                Thank you for reaching out. Your message has been received, and our administrative team will contact you shortly.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form method="post" action="{{ route('send_message') }}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="name" placeholder="Your Name *" required="">
                                    @error('name')
                                        <h6 class="text-danger"> {{ $message }}</h6>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email Address *" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone *" required="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject *" required="">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea class="" name="message" placeholder="Type Your Message *" required=""></textarea>
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
