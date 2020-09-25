@extends('Frontend.Template.layout')
@section('title')
Prices
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $heading->prices_title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Pricing Table Start-->
<div style="background:white !important;" class="price-area bg-area pt_50 pb_50">
    <div class="container">
        <div class="row pricing-tables" style="justify-content: center;">  
            <div class="col-12 pt_10">
                <div class="headline">
                    <h4>{{ $heading->prices_most }}</h4>
                    <hr class="line">
                </div>
            </div>
            @foreach($pricing as $package)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="pricing-table table-left">
                    <div class="icon">
                        <i class="fa {{ $package->icon }}"></i>
                    </div>
                    <div class="pricing-details">
                        <h2>{{ $package->title }}</h2>
                        <span>{{ $package->price }}</span>
                        <ul>
                            @foreach($pricingfeatures->where('package_id', $package->id) as $pricingfeature)
                            <li>{{ $pricingfeature->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="plan-button">
                        <a href="{{ route('contact') }}" class="btn btn-common">Get Plan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--Pricing Table End-->
@endsection
