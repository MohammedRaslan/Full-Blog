@extends('Frontend.Template.layout')
@section('title')
Services
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $heading->services_title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Service-Area Start-->
<div class="service-page pt_40 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12 pt_10">
                <div class="headline">
                    <h4>{{ $heading->services_discover }}</h4>
                    <hr class="line">
                </div>
            </div>
            @foreach($services as $service)
            <div class="col-lg-6 col-sm-12">
                <div class="services-item effect-item">
                    <a href="{{ route('singleservice', ['id'=>$service->id]) }}">
                        <div class="services-photo" style="background-image: url({{ asset('uploads/services/'.$service->image) }})"></div>
                    </a>
                    <div class="services-text">
                        <h3><a href="{{ route('singleservice', ['id'=>$service->id]) }}">{{ $service->title }}</a></h3>
                        <p>{{ $service->short_description }}</p>
                        <div class="services-button">
                            <a class="text-white btn btn-project" href="{{ route('singleservice', ['id'=>$service->id]) }}">Read More <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
<!--Service-Area End-->
@endsection
