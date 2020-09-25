@extends('Frontend.Template.layout')
@section('title')
{{ $singleservice->title }}
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $singleservice->title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Single-Service Start-->
<div class="single-service-area pt_30 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-info">
                    <div class="single-ser-carousel owl-carousel">
                        <div class="event-photo-item">
                            <img src="{{ asset('uploads/services/'.$singleservice->image) }}" alt="Service Image">
                        </div>
                    </div>
                    <h2>{{ $singleservice->title }}</h2>
                    <p class="single-service-p">{{ $singleservice->long_description }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="service-sidebar">
                    <div class="service-sidebar-item headstyle">
                        <h4>{{ $heading->services_other }}</h4>
                        <ul>
                            @foreach($services as $service)
                            @if($service->id !== $singleservice->id)
                            <li><a href="{{ route('singleservice', ['id'=>$service->id]) }}">{{ $service->title }}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <br>
                    <div class="service-sidebar-item headstyle">
                        <h4>{{ $heading->services_contact }}</h4>
                        <form action="{{ route('send.message') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Object" name="subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message" name="message"></textarea>
                                </div>
                                <div class="form-button">
                                    <button type="submit" class="btn btn-block" style="background:#000 !important; color: #fff !important;">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Single-Service End-->
@endsection
