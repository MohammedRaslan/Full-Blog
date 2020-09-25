@extends('Backend.dashboard')
@section('title')
Services
<br>
Change Navbar Visiablity:
<input type="checkbox" data-id="{{ $nav->id }}" name="status" id="ChangeServicesNavVis" class="js-switch" {{ $nav->appear == 'show' ? 'checked' : '' }}>
<br>
Change Home Page Visiablity:
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangeServicesVis" class="js-switch" {{ $home->services == 'show' ? 'checked' : '' }}>

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
=            Start Services Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-services-tab" data-toggle="pill" href="#pills-services" role="tab" aria-controls="pills-services"><i class="fa fa-pencil"></i> Edit Your Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addservice-tab" data-toggle="pill" href="#pills-addservice" role="tab" aria-controls="pills-addservice"><i class="fa fa-plus"></i> Add a New Service</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Services Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Services</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="servicetbl">
                            @foreach($services as $service)
                            <tr>
                                <th class="text-center p-4">{{ $service->title }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="{{ route('edit.service', ['id'=>$service->id]) }}">Edit Service</a>
                                    <button class="delete-service btn btn-danger" id={{ $service->id }} title="">Delete Service</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Services Tab -->
                <!-- Start Add Service Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addservice" role="tabpanel" aria-labelledby="pills-addservice-tab">
                    <form id="addService" action="{{ route('add.service') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Service Title</label>
                        <input type="text" name="title" placeholder="Enter Your service title.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Service Icon</label>
                        <input type="text" name="icon" placeholder="Enter Your service icon.." class="form-control">
                    </div>
                        <div class="alert alert-warning" role="alert">
                        <small>-- Please Choose an icon & Copy Its Code From This Website --> <a class="text-danger" href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a></small>

                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Add Short Description</label>
                        <textarea name="short_description" placeholder="Enter Your service short description.." class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Edit Long Description</label>
                        <textarea name="long_description" placeholder="Enter Your service short description.." class="form-control" rows="12"></textarea>
                    </div>
                    <div class="form-group">
                            <label class="home-page-label">Upload An Image For Your Service</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
                </div>
                <!-- End Add Service Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Services  ====-->
@endsection
