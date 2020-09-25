@extends('Backend.dashboard')
@section('title')
Partners: Change Visiabilty
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangePartnerVis" class="js-switch" {{ $home->partners == 'show' ? 'checked' : '' }}>

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
=            Start Partners Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-partners-tab" data-toggle="pill" href="#pills-partners" role="tab" aria-controls="pills-partners"><i class="fa fa-pencil"></i> Edit Your Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addpartner-tab" data-toggle="pill" href="#pills-addpartner" role="tab" aria-controls="pills-addpartner"><i class="fa fa-pencil"></i> Add New Partner</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start features Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-partners" role="tabpanel" aria-labelledby="pills-partners-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Partner Name</th>
                                <th class="text-center">Partner Logo</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="Partnertbl">
                            @foreach($partners as $partner)
                            <tr>
                                <th class="text-center">
                                    {{ $partner->name }}
                                </th>
                                <td class="text-center">
                                    <img style="max-height: 80px;" src="{{ asset('uploads/partners/' . $partner->logo) }}">
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('edit.partner',['id'=> $partner->id]) }}" class="btn btn-primary">Edit Partner</a>
                                    <button id= {{$partner->id}} class="delete-partner btn btn-danger">Delete Partner</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End features Tab -->
                <!-- Start Add partner Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addpartner" role="tabpanel" aria-labelledby="pills-addpartner-tab">
                    <form id="AddPartner" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Partner Name</label>
                        <input type="text" name="name" placeholder="Enter Your partner name.." class="form-control">
                    </div>

                    <div class="form-group">
                            <label class="home-page-label">Upload Logo of your partner</label>
                            <input name="logo" type="file" class="form-control">
                        </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
                </div>
                <!-- End Add partner Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
