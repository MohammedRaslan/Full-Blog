@extends('Backend.dashboard')
@section('title')
<b>Features</b>
<br>
Change Navbar Visiablity:
<input type="checkbox" data-id="{{ $nav->id }}" name="status" id="ChangeFeatureNavVis" class="js-switch" {{ $nav->appear == 'show' ? 'checked' : '' }}>
<br>
Change Home Page Visiablity:
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangeFeatureVis" class="js-switch" {{ $home->features == 'show' ? 'checked' : '' }}>

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
=            Start Features Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features"><i class="fa fa-pencil"></i> Edit Your Features</a>
                </li>
                <li style="visibility: hidden;" class="nav-item">
                    <a class="nav-link" id="pills-why-tab" data-toggle="pill" href="#pills-why" role="tab" aria-controls="pills-why"><i class="fa fa-pencil"></i> Why Choose us ?</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start features Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-features" role="tabpanel" aria-labelledby="pills-company-tab">
                    <button class=" col-10 offset-1 btn btn-success btn-block addFeature">Add New Feature</button>
<br>
                    <div class="row FeatureContainer" style="display:none">
                        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                            <div class="card website-settings-card shadow mb-5">
                                <!-- Start Nav -->
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-addskill-tab" data-toggle="pill" href="#pills-addskill" role="tab" aria-controls="pills-addskill"><i class="fas fa-plus"></i> Add Feature</a>
                                    </li>
                                </ul>
                                <!-- End Nav -->
                                <!-- Start Body -->
                                <div class="row tab-content mt-2" id="pills-tabContent">
                                    <!-- Start Add Feature Tab -->
                                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active" id="pills-addskill" role="tabpanel" aria-labelledby="pills-addskill-tab">
                                  
                                        <form id="storeFeature" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="home-page-label">Add feature name</label>
                                                <input type="text" placeholder="Enter feature name.." name="name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="home-page-label">Add feature image</label>
                                                <input type="text" name="icon" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-success">Save Feature</button>
                                        </form>
                                    </div>
                                    <!-- End Add Feature Tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Feature Name</th>
                                <th class="text-center">Feature Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="Featuretbl">
                            @foreach($features as $feature)
                            <tr>
                                <th class="text-center p-4">{{ $feature->title }}</th>
                                <td class="text-center"><i style="font-size: 34px" class="fa {{ $feature->icon }}"></i></td>
                                <td class="text-center">
                                    <a href="{{ route('edit.feature', ['id'=>$feature->id]) }}" class="btn btn-primary btn-sm">Edit Feature</a>
                                    <button id={{$feature->id}} class="delete-feature btn btn-danger btn-sm">Delete Feature</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End features Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
