@extends('Backend.dashboard')
@section('title')
Posts
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
                    id="pills-posts-tab" data-toggle="pill" href="#pills-posts" role="tab" aria-controls="pills-posts"><i class="fa fa-pencil"></i> Edit Your Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addpost-tab" data-toggle="pill" href="#pills-addpost" role="tab" aria-controls="pills-addpost"><i class="fa fa-plus"></i> Add New Post</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start features Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-posts" role="tabpanel" aria-labelledby="pills-posts-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Post Image</th>
                                <th class="text-center">Post Title</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="posttbl">
                            @foreach($posts as $post)
                            <tr>
                                <td class="text-center">
                                    <img style="max-height: 80px; vertical-align: middle;" src="{{ asset('uploads/blog/' . $post->image) }}">
                                </td>
                                <th style="vertical-align: middle;" class="text-center">
                                    {{ $post->title }}
                                </th>
                                <td class="text-center" style="vertical-align: middle;">
                                    <a href="{{ route('edit.post', ['id'=>$post->id]) }}" class="btn btn-primary btn-sm">Edit Post</a>
                                <button id="{{$post->id}}" class="delete-post btn btn-danger btn-sm">Delete Post</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End features Tab -->
                <!-- Start Add Post Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addpost" role="tabpanel" aria-labelledby="pills-addpost-tab">
                    <form id="addpost" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Post Title</label>
                            <input type="text" name="title" placeholder="Enter Your Post Title here.." class="form-control">
                        </div>
                        <div class="form-group">
                        <label class="home-page-label">Post Content</label>
                        <textarea class="form-control" placeholder="Enter Your Post Content here.." id="post" name="post"></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="home-page-label">Add Image To Your Post</label>
                            <input name="image" type="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End Add Post Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection

@section('ckeditor')
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
    CKEDITOR.replace( 'post' );
</script>
@endsection

