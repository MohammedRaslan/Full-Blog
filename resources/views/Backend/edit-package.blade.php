@extends('Backend.dashboard')
@section('title')
Edit Package
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
=            Start Package Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This Package : {{ $package->title }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('pricingpage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Packages List
                </a>
                <form class="col-10 offset-1" action="{{ route('update.package', ['id'=> $package->id]) }}" method="POST">
                    @csrf
                    <p class="heading-title">Edit This Package Informations</p>
                    <div class="form-group">
                        <label class="home-page-label">Edit Title</label>
                        <input type="text" name="title" value="{{ $package->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Icon</label>
                        <input type="text" name="icon" value="{{ $package->icon }}" class="form-control">
                    </div>
                    <div class="alert alert-warning" role="alert">
                        <small>-- To Change Icon , Please Choose it & Copy Its Code From This Website --> <a class="text-danger" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a></small></div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Price</label>
                        <input type="text" name="price" value="{{ $package->price }}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====  End of Package Section  ====-->
@endsection
