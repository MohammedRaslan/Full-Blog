<div class="testimonial-area pt_50 pb_50" style="background-image: url({{ asset('Frontend/img/testimonial.jpg') }})">
    <div class="bg-testimonial"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2 class="text-white">{{ $heading->home_testimonials }}</h2>
                    <hr class="line-white">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="testimonial-carousel owl-carousel mt-30">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-item">
                        <div class="testimonial-photo">
                            <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" alt="testimonial">
                        </div>
                        <div class="testimonial-name">
                            <h4>{{ $testimonial->name }}</h4>
                            <p>{{ $testimonial->position }}</p>
                        </div>
                        <div class="testimonial-description">
                            <p>{{ $testimonial->feedback }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--Testomonial-Area End-->
