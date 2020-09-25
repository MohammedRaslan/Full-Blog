@extends('Frontend.Template.layout')
@section('title')
Project
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $project->name }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Portfolio-Details Start-->
<div class="portfolio-details pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div>
                    <img src="{{ asset('uploads/projects/' . $project->image ) }}" alt="Project Image">
                </div>
                <div class="portfolio-details-text">
                    <h3>{{ $heading->projects_overview }}</h3>
                    <p>{{ $project->long_description }}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="portfolio-sidebar">
                    <div class="portfolio-details headstyle">
                        <h4>{{ $heading->projects_details }}</h4>
                        <ul>
                            <li><span>Client Name:</span><br>{{ $project->client_name }}</li>
                            <li><span>Project Start Date:<br></span>{{ $project->start_date }}</li>
                            <li><span>Project End Date:<br></span>{{ $project->end_date }}</li>
                            <li><span>Client Feedback:<br></span>{{ $project->client_feedback }}</li>
                        </ul>
                    </div>
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
<!--Portfolio-Details End-->
@endsection
