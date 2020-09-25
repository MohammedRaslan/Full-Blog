@extends('Frontend.Template.layout')
@section('title')
Contact us
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $heading->contact_title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Contact Start-->
<div class="contact-area">
    <div class="container">
        <!-- Session Alert Start -->
        @if(Session::has('success'))
        <br>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        @if(Session::has('danger'))
        <div class="row">
            <div class="col-10 offset-1">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        @endif
        <!-- Session Alert End -->
            <div class="col-12 pb_20 pt_40">
                <div class="headline">
                    <h4>{{ $heading->contact_send }}</h4>
                    <hr class="line">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="sendMessage" method="post">
                    @csrf
                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                        </div>
                        <div class="form-group col-12">
                            <textarea class="form-control" rows="8" placeholder="Message" name="message" required></textarea>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn-block btn-lg btn btn-contact btn-common" name="form_contact">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 pb_20 pt_40">
                <div class="headline">
                    <h4>{{ $heading->faq_keep }}</h4>
                    <hr class="line">
                </div>
            </div>
<!--Contact Start-->
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
    </div>
</div>
<!--Contact End-->
@endsection
