@extends('Frontend.Template.layout')
@section('title')
Single Post
@endsection
@section('content')
<!--Banner Start-->
<div class="banner-slider">
    <div class="bg"></div>
    <div class="banner-table">
        <div class="banner-text">
            <h1>{{ $post->title }}</h1>
        </div>
    </div>
</div>
<!--Banner End-->
<!--Blog-One Start-->
<div class="blog-one-area pt_60 pb_90">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-blog">
                    <img src="{{ asset('uploads/blog/' . $post->image) }}" alt="Post Image">
                    <h3>{{ $post->title }}</h3>
                    <ul>
                        <li>
                            <i class="fa fa-calendar-o"></i> {{ $post->date }}
                        </li>
                    </ul>
                    <p class="post-text">{!! $post->post !!}</p>
                </div>
            </div>
            <!--Sidebar Start-->
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-item">
                        <h3>{{ $heading->blog_recent }}</h3>
                        @foreach($posts->sortByDesc('id') as $recentpost)
                        @if($loop->iteration > 6)
                        @break
                        @endif
                        @if($recentpost->id !== $post->id)
                        <div class="sidebar-recent-item">
                            <div class="recent-photo">
                                <a href="">
                                    <img src="{{ asset('uploads/blog/' . $recentpost->image) }}" alt="Blog Photo">
                                </a>
                            </div>
                            <div class="recent-text">
                                <a href="">{{ $recentpost->title }}</a>
                                <div class="rpwwt-post-date">
                                    {{ $recentpost->date }}
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="service-sidebar-item headstyle">
                    <h4>{{ $heading->services_contact }}</h4>
                    <form action="{{ route('send.message') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Address" name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Object" name="subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message" name="message"></textarea>
                        </div>
                        <div class="form-button">
                            <button type="submit" class="btn btn-block" style="background:#000 !important; color: #fff !important;">Send</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <!--Sidebar End-->
        </div>
    </div>
</div>
<!--Blog-One End-->
@endsection
