@extends('Backend.dashboard')
@section('title')
<b>testimonials</b>
<br>
Change Navbar Visiablity:
<input type="checkbox" data-id="{{ $nav->id }}" name="status" id="ChangeTestimonialNavVis" class="js-switch" {{ $nav->appear == 'show' ? 'checked' : '' }}>
<br>
Change Home Page Visiablity:
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangeTestimonialVis" class="js-switch" {{ $home->Testimonials == 'show' ? 'checked' : '' }}>

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
=            Start testimonials Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-testimonials-tab" data-toggle="pill" href="#pills-testimonials" role="tab" aria-controls="pills-testimonials"><i class="fa fa-pencil"></i> Edit Your testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addtestimonial-tab" data-toggle="pill" href="#pills-addtestimonial" role="tab" aria-controls="pills-addtestimonial"><i class="fa fa-plus"></i> Add New testimonial</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start features Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-testimonials" role="tabpanel" aria-labelledby="pills-testimonials-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Testimonials</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="testmonialtbl">
                            @foreach($testimonials as $testimonial)
                            <tr>
                                <th class="text-center">
                                    {{ $testimonial->name }}
                                </th>
                                <td class="text-center">
                                    <a href="{{ route('edit.testimonial', ['id'=>$testimonial->id]) }}" class="btn btn-primary">Edit Testimonial</a>
                                    <button id={{$testimonial->id }} class="delete-testmonial btn btn-danger">Delete Testimonial</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End testimonials Tab -->
                <!-- Start Add testimonial Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addtestimonial" role="tabpanel" aria-labelledby="pills-addtestimonial-tab">
                    <form method="POST" id="addTestmonial" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Testimonial Name</label>
                        <input type="text" name="name" placeholder="Enter Your testimonial name.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Testimonial Position</label>
                        <input type="text" name="position" placeholder="Enter Your testimonial position.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Testimonial Feedback</label>
                        <textarea name="feedback" placeholder="Enter your feedback here .." class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                            <label class="home-page-label">Upload Testimonial image</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
                </div>
                <!-- End Add testimonial Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
