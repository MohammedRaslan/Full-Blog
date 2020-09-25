@extends('Backend.dashboard')
@section('title')
Slider: Change Home  Page Visiablity
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangeSliderVis" class="js-switch" {{ $home->slider == 'show' ? 'checked' : '' }}>

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
=            Start Slider Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Manage Slider Images & Titles
            </div>
            <div class="card-body">
                <button class="badge badge-pill badge-success add-new-slider">
                    <i class="fas fa-plus-circle"></i>
                    Add New Slider
                </button>

                <div class="row newSlider" style="display: none">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                Add A New Slider
                            </div>
                            <div class="card-body">
                                <form method="post" id="addSlider" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="home-page-label">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="home-page-label">Description</label>
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                    <div class="form-group">
                                       <label class="home-page-label">Slider Image</label>
                                        <input name="image" type="file" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Informations</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- Slider -->
                    @foreach($sliders as $slider)
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Slider {{ $slider->id }}
                            <a href="{{ route('edit.slider', ['id' => $slider->id]) }}" class="edit-slider badge-pill badge badge-primary">
                                <i class="fas fa-edit"></i>
                                Edit This Slider
                            </a>
                        <button id="{{ $slider->id }}" class="delete-slider badge-pill badge badge-danger text-white btn-sm"><i class="fas fa-minus-circle"></i> Delete This Slider</button></center>
                        </div>
                        <img class="image-slider" src="{{ asset('uploads/slider/' . $slider->image) }}">
                        <div class="card-body text-white card-body-bg">
                        </div>
                        <h4 class="card-text slider-title">{{ $slider->title }}</h4>
                        <p class="card-text slider-text">{{ $slider->description }}</p>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--====  End of Slider Section  ====-->
@endsection
