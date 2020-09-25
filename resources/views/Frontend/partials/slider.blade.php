<!--Slider Start-->
<div class="slider">
    <div class="slide-carousel slider-one owl-carousel">
        @foreach($sliders as $slider)
        <div class="slider-item flex" style="background-image:url({{ asset('uploads/slider/' . $slider->image) }});">
            <div class="bg-slider"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="slider-text">
                            <div class="text-animated">
                                <h1>{{ $slider->title }}</h1>
                            </div>
                            <div class="text-animated">
                                <p>{{ $slider->description }}</p>
                            </div>
                            <div class="text-animated">
                                <ul>
                                    <li><a class="contact-button" href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--Slider End-->
