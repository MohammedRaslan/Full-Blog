@extends('Backend.dashboard')
@section('title')
Add Counter
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
=            Start Add Counter Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active" id="pills-addskill-tab" data-toggle="pill" href="#pills-addskill" role="tab" aria-controls="pills-addskill"><i class="fas fa-plus"></i> Add Counter</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Add Counter Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active" id="pills-addskill" role="tabpanel" aria-labelledby="pills-addskill-tab">
                    <div class="alert alert-primary" role="alert">
                        -- To Add Icon , Please Choose it & Copy Its Code From This Website --> <a class="text-danger" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a><br>
                        <small>** For more Explication, Please Read Our Documentation!</small>
                    </div>
                    <form action="{{ route('store.counter') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Add counter title</label>
                            <input type="text" placeholder="Enter counter name.." name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Add counter number</label>
                            <input type="text" placeholder="Enter number.." name="number" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Save Counter</button>
                    </form>
                </div>
                <!-- End Add Counter Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section  ====-->
@endsection
