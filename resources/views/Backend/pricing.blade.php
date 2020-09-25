@extends('Backend.dashboard')
@section('title')
<b>Pricing</b>
<br>
Change Navbar Visiablity:
<input type="checkbox" data-id="{{ $nav->id }}" name="status" id="ChangePriceNavVis" class="js-switch" {{ $nav->appear == 'show' ? 'checked' : '' }}>
<br>
Change Home Page Visiablity:
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangePriceVis" class="js-switch" {{ $home->pricing == 'show' ? 'checked' : '' }}>

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
=            Start Pricing Section     =
======================================-->
<div class="row">
    <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages"><i class="fa fa-pencil"></i> Edit Your Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addpackage-tab" data-toggle="pill" href="#pills-addpackage" role="tab" aria-controls="pills-addpackage"><i class="fa fa-plus"></i> Add New Package</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Package Tab -->
                <div class="table-responsive col-lg-10 offset-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Packages</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="pricingtbl">
                            @foreach($pricing as $package)
                            <tr>
                                <th style="vertical-align:middle;" class="text-center">{{ $package->title }}<br><i style="margin-top:20px;font-size: 32px;"class="fa {{ $package->icon }}"></i></th>
                                <td style="vertical-align:middle;"  class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('edit.package', ['id'=>$package->id]) }}">Edit Package Infos</a><hr>
                                    <a class="btn btn-info btn-sm" href="{{ route('edit.packagefeatures', ['id'=>$package->id]) }}">Add & Edit Package Features</a><hr>
                                <button class="delete-package btn btn-danger btn-sm" id="{{$package->id}}" title="">Delete Package</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Package Tab -->
                <!-- Start Add Package Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addpackage" role="tabpanel" aria-labelledby="pills-addpackage-tab">
                    <form id="AddPricing" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Package Title</label>
                        <input type="text" name="title" placeholder="Enter Your package title.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Package Price</label>
                        <input type="text" name="price" placeholder="Enter Your package price.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Package Icon</label>
                        <input type="text" name="icon" placeholder="Enter Your package icon.." class="form-control">
                    </div>
                        <div class="alert alert-warning" role="alert">
                        <small>-- Please Choose an icon & Copy Its Code From This Website --> <a class="text-danger" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a></small>

                    </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
                </div>
                <!-- End Add Package Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
