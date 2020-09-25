@extends('Backend.dashboard')
@section('title')
Edit Service
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
=            Start Service Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This Service : {{ $service->title }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('servicespage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Services List
                </a>
                <form action="{{ route('update.service', ['id'=> $service->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Edit Title</label>
                        <input type="text" name="title" value="{{ $service->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Icon</label>
                        <div class="alert alert-dark" role="alert">
                        <small>-- To Change Icon , Please Choose it & Copy Its Code From This Website --> <a class="text-danger" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a></small>
                    </div>
                        <input type="text" name="icon" value="{{ $service->icon }}" class="form-control">
                    </div>
                    <div class="mb-3">
                            <small style="font-weight: bold;" class="text-dark">- Current Icon :</small>
                            <i style="font-size: 30px; color: red;" class="fa {{ $service->icon }}"></i>
                        </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Short Description</label>
                        <textarea name="short_description" class="form-control">{{ $service->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Long Description</label>
                        <textarea name="long_description" class="form-control" rows="12">{{ $service->long_description }}</textarea>
                    </div>
                    <div class="form-group">
                            <label class="home-page-label">Upload A New Image</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                        <div class="mb-3">
                            <small style="font-weight: bold;" class="text-dark">Current Image :</small>
                            <img src="{{ asset('uploads/services/' . $service->image) }}" height="300px">
                        </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====  End of Service Section  ====-->
@endsection
