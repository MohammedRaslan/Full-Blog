@extends('Frontend.Template.layout')
@section('title')
About us
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $heading->about_title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--About Start-->
<div class="about-area pt_60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt_30">
                <div class="about-content">
                    <div class="headline-left">
                        <center><h2><span></span> {{ $heading->about_mission }}</h2></center>
                        <hr class="line">
                    </div>
                    <p>{{ $about->mission }}</p>
                </div>
            </div>
            <div class="col-lg-6 mt_30">
                <div class="headline-left">
                    <center><h2><span></span> {{ $heading->about_vision }}</h2></center>
                    <hr class="line">
                </div>
                <p>{{ $about->vision }}</p>
            </div>
        </div>
        <hr>
        <div class="row pt_30 pb_40">
            <div class="col-lg-6 mt_30">
                <div class="about-content">
                    <div class="headline-left">
                        <center><h2><span></span> {{ $heading->about_history }}</h2></center>
                        <hr class="line">
                    </div>
                    <p>{{ $about->history }}</p>
                </div>
            </div>
            <div class="col-lg-6 mt_30">
                <div class="headline-left">
                    <center><h2><span></span> {{ $heading->about_skills }}</h2></center>
                    <hr class="line">
                </div>
                <div class="progress-gallery main-prog">
                    @foreach($skills as $skill)
                    <div class="bar-container">
                        <p>{{ $skill->name }}</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-custom" role="progressbar" aria-valuenow="{{ $skill->pourcentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->pourcentage }}%;">
                            </div>
                        </div>
                        <div class="percentage-show">{{ $skill->pourcentage }} %</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="counterup-area pt_60 pb_90">
   <!-- <div class="bg-counterup"></div> -->
    <div class="container">
        <div class="row">
            @foreach($counters as $counter)
            <div class="col-lg-3 col-md-6">
                <div class="counter-item flex">
                    <h2 class="counter">{{ $counter->number }}</h2>
                    <h4>{{ $counter->title }}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

</div>
<!--About End-->
@endsection
