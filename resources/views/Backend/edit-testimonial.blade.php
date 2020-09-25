@extends('Backend.dashboard')
@section('title')
Edit Testimonial
@endsection
@section('content')
<!--=====================================
=    Start Session & Errors Display     =
======================================-->
<!-- Session Alert Start -->
@if(Session::has('success'))
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
<!-- Dislay Errors Start -->
@if(count($errors) > 0)
<div class="row">
    <div class="col-10 offset-1">
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    </div>
</div>
@endif
<!-- Dislay Errors End -->
<!--====  End of Section Sessions & Errors Display  ====-->
<!--=====================================
=            Start Testimonial Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit Testimonial
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('testimonialspage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Testimonials List
                </a>
                <form action="{{ route('update.testimonial', ['id'=>$testimonial->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Edit Name</label>
                        <input type="text" name="name" value="{{ $testimonial->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Position</label>
                        <input type="text" name="position" value="{{ $testimonial->position }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Feedback</label>
                        <textarea rows="4" name="feedback" class="form-control">{{ $testimonial->feedback }}</textarea>
                    </div>
                    <div class="form-group">
                            <label class="home-page-label">Change Image</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                        <div class="mb-3">
                            <small style="font-weight: bold;" class="text-dark">Current Image :</small>
                            <img width="300px" src="{{ asset('uploads/testimonials/' . $testimonial->image) }}">
                        </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====  End of Partner Section  ====-->
@endsection
