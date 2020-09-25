@extends('Frontend.Template.layout')
@section('title')
FAQ Page
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $heading->faq_title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--FAQ Start-->
<div class="questions pt_40 pb_40">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1">
                <div class="faq-area faq-home mt_10">
                    <div class="faq-group pt-30">
                        <div id="accordion">
                            @foreach($faqs as $faq)
                            <div class="faq-item card">
                                <div class="faq-header" id="heading{{ $faq->id }}">
                                    <button class="faq-button collapsed" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}"><i class="fa fa-caret-right"></i>{{ $faq->question }} </button>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                                    <div class="faq-body">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FAQ End-->
<div class="container">
    <div class="row">
        <div class="col-12 pt_30">
            <div class="headline">
                <h4>{{ $heading->faq_any }}</h4>
                <hr class="line">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row  pb_60">
        <div class="col-xl-3 col-md-6">
            <div class="contact-item flex">
                <div class="contact-icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="contact-text">
                    <h4>Address</h4>
                    <p>{{ $infos->address }}, {{ $infos->state }}, {{ $infos->city }}, {{ $infos->country }}</p>
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
@endsection
