@extends('Backend.dashboard')
@section('title')
<br>Team</b>
<br>
Change Navbar Visiablity:
<input type="checkbox" data-id="{{ $nav->id }}" name="status" id="ChangeTeamNavVis" class="js-switch" {{ $nav->appear == 'show' ? 'checked' : '' }}>
<br>
Change Home Page Visiablity:
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangeTeamVis" class="js-switch" {{ $home->team == 'show' ? 'checked' : '' }}>

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
                    id="pills-team-tab" data-toggle="pill" href="#pills-team" role="tab" aria-controls="pills-team"><i class="fa fa-pencil"></i> Edit Your Team Members</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addteam-tab" data-toggle="pill" href="#pills-addteam" role="tab" aria-controls="pills-addteam"><i class="fa fa-plus"></i> Add New Member</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Member Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-team" role="tabpanel" aria-labelledby="pills-team-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Team Members</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="teamtbl">
                            @foreach($teams as $member)
                            <tr>
                                <th class="text-center">
                                    {{ $member->lname }} {{ $member->fname }}
                                <td class="text-center">
                                    <a href="{{ route('edit.team', ['id'=>$member->id]) }}" class="btn btn-primary">Edit Member</a>
                                <button id="{{$member->id}}" class="delete-member btn btn-danger">Delete Member</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Member Tab -->
                <!-- Start Add member Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addteam" role="tabpanel" aria-labelledby="pills-addteam-tab">
                    <form id="addTeam" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">First Name</label>
                        <input type="text" name="fname" placeholder="Enter first name.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Last Name</label>
                        <input type="text" name="lname" placeholder="Enter last name.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Position</label>
                        <input type="text" name="position" placeholder="Enter position.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Facebook Link</label>
                        <input type="text" name="facebook" placeholder="Enter facebook link.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Twitter Link</label>
                        <input type="text" name="twitter" placeholder="Enter twitter link.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Instagram Link</label>
                        <input type="text" name="instagram" placeholder="Enter instagram link.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Linkedin Link</label>
                        <input type="text" name="linkedin" placeholder="Enter linkedin link.." class="form-control">
                    </div>
                    <div class="form-group">
                            <label class="home-page-label">Upload Image</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
                </div>
                <!-- End Add member Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
