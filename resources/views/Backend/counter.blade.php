@extends('Backend.dashboard')
@section('title')
Counters: Change Visiabilty
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangeCounterVis" class="js-switch" {{ $home->counter == 'show' ? 'checked' : '' }}>

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
=            Start Counter Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-features-tab" data-toggle="pill" href="#pills-features" role="tab" aria-controls="pills-features"><i class="fa fa-pencil"></i> Edit Your Counters</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Counter Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-features" role="tabpanel" aria-labelledby="pills-company-tab">
                    <button class=" col-10 offset-1 btn btn-success btn-block addContainerContainer">Add New Counter</button>
                    <br>
                    <div class="row counterContainer" style="display: none">
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
                                        <form id="AddCounter" method="POST">
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

                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Counter Name</th>
                                <th class="text-center">Counter Number</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="countertbl">
                            @foreach($counters as $counter)
                            <tr>
                                <th class="text-center p-4">{{ $counter->title }}</th>
                                <td class="text-center">{{ $counter->number }}</td>
                                <td class="text-center">
                                    <a href="{{ route('edit.counter', ['id'=>$counter->id]) }}" class="btn btn-primary btn-sm">Edit Counter</a>
                                <button id="{{$counter->id}}" class="delete-counter btn btn-danger btn-sm">Delete Counter</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Counter Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section  ====-->
@endsection
