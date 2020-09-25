@extends('Backend.dashboard')
@section('title')
Edit Feature
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
=            Start About Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active" id="pills-addskill-tab" data-toggle="pill" href="#pills-editskill" role="tab" aria-controls="pills-editskill"><i class="fas fa-plus"></i> Edit Skill</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Add Skill Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active" id="pills-editskill" role="tabpanel" aria-labelledby="pills-editskill-tab">
                    <div class="alert alert-primary" role="alert">
                        -- To Change Icon , Please Choose it & Copy Its Code From This Website --> <a class="text-danger" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a><br>
                        <small>** For more Explication, Please Read Our Documentation!</small>
                    </div>
                    <form action="{{ route('update.feature', ['id'=> $feature->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Add Feature Name</label>
                            <input type="text" name="name" value="{{ $feature->title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Add Feature Icon Code</label>
                            <input type="text" name="icon" value="{{ $feature->icon }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Feature</button>
                    </form>
                </div>
                <!-- End Add Skill Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection

