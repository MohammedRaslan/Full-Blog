@extends('Frontend.Template.layout')
@section('title')
Support
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>Support</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Blog Start-->
<div class="blog-area pt_50 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-12 pt_10">
                <div class="headline">
                    <h4>{{ $heading->blog_share }}</h4>
                    <hr class="line">
                </div>
            </div>
            @foreach($posts as $post)
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="blog-item">
                    <a href="{{ route('singlepost',['id'=>$post->id]) }}">
                        <div class="blog-image-post" style="background-image: url({{ asset('uploads/blog/' . $post->image) }})"></div>
                    </a>
                    <div class="blog-text">
                        <h3><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{ $post->title }}</a></h3>
                        <p style="text-transform: lowercase;">{{ substr($post->post, 0, 250) }} ...</p>
                    </div>
                    <div class="blog-author">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i>{{ $post->date }}</li>
                            <li class="blog-button"><a href="{{ route('singlepost',['id'=>$post->id]) }}">Read more <i class="fa fa-chevron-circle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<!--Blog End-->
@endsection
