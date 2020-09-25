@extends('Frontend.Template.layout')
@section('title')
{{ $currentPage->title }}
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $currentPage->title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<div class="about-area pt_40">
    <div class="pb_40">
        <div class="container">
            <div class="row">
                <div class="col-10 offset-1 text-center">
                    <p>{!! $currentPage->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Contact Start-->
<div class="col-12 pb_20 pt_20">
    <div class="headline">
        <h4>{{ $heading->faq_keep }}</h4>
        <hr class="line">
    </div>
</div>
<div class="contact-area">
    <div class="container">
        <div class="row  pb_60">
            <div class="col-xl-3 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4>Address</h4>
                        <p>{{ $infos->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4>Phone Number</h4>
                        <p>{{ $infos->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4>Email Address</h4>
                        <p>{{ $infos->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="contact-item flex">
                    <div class="contact-icon">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                    </div>
                    <div class="contact-text">
                        <h4>Social Media</h4>
                        <p><div class="social-nav-contact">
                            <ul>
                                <li><a href="{{ $socials->facebook }}" target="blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $socials->twitter }}" target="blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $socials->linkedin }}" target="blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Contact End-->
@endsection
