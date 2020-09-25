@extends('Frontend.Template.layout')
@section('title')
Features
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $heading->features_title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Features Start-->
<div class="choose-area pb_60">
    <div class="container">
        <div class="row">
            <div class="col-12 pt_40">
                <div class="headline">
                    <h4>{{ $heading->features_choice }}</h4>
                    <hr class="line">
                </div>
            </div>
        </div>
        <div class="row" style="justify-content: center;">
            @foreach($features as $feature)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="choose-item flex">
                    <div class="choose-icon">
                        <i class="fa {{ $feature->icon }}" aria-hidden="true"></i>
                    </div>
                    <div class="choose-text">
                        <h4>{{ $feature->title }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--Features End-->
@endsection
