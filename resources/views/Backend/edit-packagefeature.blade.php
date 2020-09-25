@extends('Backend.dashboard')
@section('title')
Edit Package Features
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
    <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit Features of This Package : {{ $package->title }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('pricingpage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Packages List
                </a>
                <div>
                    <center><p class="heading-title">Add New Feature To This Package</p></center>
                                    <form class="row" action="{{ route('add.packagefeature', ['package_id'=> $package->id]) }}" method="POST" accept-charset="utf-8">
                                        @csrf
                                            <input type="text" name="name" class="col-6 offset-1 form-control" placeholder="Add new feature..">
                                        <button type="submit" class="col-3 offset-1 btn-sm btn btn-success">Add</button>
                                    </form>
                                    <hr>
                    <center><p class="heading-title">Edit Existants Features</p></center>
                @foreach($features as $feature)
                <form action="{{ route('update.packagefeature',['id'=>$feature->id]) }}" method="post">
                    @csrf
                    <div style="margin-bottom: 30px;" class="row" class="form-group">
                        <input type="text" class="offset-1 col-4 form-control" name="{{ $feature->id }}" value="{{ $feature->name }}">
                        <button type="submit" class="col-2 offset-1 btn btn-sm btn-primary">Save</button>
                        <a href="{{ route('delete.packagefeature', ['id'=>$feature->id]) }}" class="col-2 offset-1 btn btn-danger">Delete Feature</a>
                    </div>
                </form>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--====  End of Package Section  ====-->
@endsection
