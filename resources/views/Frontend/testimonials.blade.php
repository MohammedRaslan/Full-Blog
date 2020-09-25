@extends('Frontend.Template.layout')
@section('title')
Testimonials
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $heading->testimonials_title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Testomonial-Area Start-->
<div class="testimonial-area pt_50 pb_50" style="background-image: url({{ asset('Frontend/img/testimonial.jpg') }})">
    <div class="bg-testimonial"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h4 class="text-white">{{ $heading->testimonials_say }}</h4>
                    <hr style="border: 1px solid white !important;" class="line">
                </div>
            </div>
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel mt-30">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial-item" style="border:none">
                        <div class="testimonial-photo" style="width:50%; height:50%;">
                            <img style="border-radius:15px !important" src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" alt="Testimonial Image">
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
<!--Partners Start-->
<div style="background:white !important;" class="brand-area bg-area pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h4>{{ $heading->testimonials_loyals }}</h4>
                    <hr class="line">
                </div>
            </div>
            <div class="col-12">
                <div class="brand-carousel owl-carousel">
                    @foreach($partners as $partner)
                    <div class="brand-item">
                        <img src="{{ asset('uploads/partners/' . $partner->logo) }}" alt="Partner Image">
                        <b><p class="pt_20 text-center">{{ $partner->name }}</p></b>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--Partners End-->
@endsection
