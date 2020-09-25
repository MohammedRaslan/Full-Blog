@extends('Backend.dashboard')
@section('title')
Edit Project
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
=            Start Project Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Edit This Project : {{ $project->title }}
            </div>
            <div class="card-body">
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('projectspage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To Projects List
                </a>
                <form action="{{ route('update.project',['id'=>$project->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Project Name</label>
                        <input type="text" name="name" value="{{ $project->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Project Category</label>
                        <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                            @foreach($project_cats as $cat)
                            <option @if($cat->id == $project->category_id) selected @endif value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Short Description</label>
                        <textarea name="short_description" class="form-control">{{ $project->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Long Description</label>
                        <textarea rows="5" name="long_description" class="form-control">{{ $project->long_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Client Name</label>
                        <input type="text" name="client_name" value="{{ $project->client_name }}"" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Client feedback</label>
                        <textarea name="client_feedback" class="form-control">{{ $project->client_feedback }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Start Date</label>
                        <input value="{{ $project->start_date }}" type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">End Date</label>
                        <input value="{{ $project->end_date }}" type="date" name="end_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Upload An Image For Your Project</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <small style="font-weight: bold;" class="text-dark">Current Image :</small>
                        <img src="{{ asset('uploads/projects/' . $project->image) }}" height="300px">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Save Informations</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====  End of Project Section  ====-->
@endsection
