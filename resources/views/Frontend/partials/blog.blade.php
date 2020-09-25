<div class="blog-area pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $heading->home_news }}</h2>
                    <hr class="line">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-carousel owl-carousel" style="display: flex;justify-content: center;">
                    @foreach($posts as $post)
                    <div class="blog-item">
                        <a href="{{ route('singlepost',['id'=>$post->id]) }}">
                            <div class="blog-image" style="background-image: url({{ asset('uploads/blog/' . $post->image) }})"></div>
                        </a>
                        <div class="blog-text" style="max-height: 268px; height:180px">
                            <h3><a href="{{ route('singlepost',['id'=>$post->id]) }}">{{ $post->title }}</a></h3>
                            <p style="text-transform: lowercase;">{!! substr($post->post, 0, 150) !!} ...</p>
                        </div>
                        <div class="blog-author" style="background-color: gainsboro;z-index: 100;position: relative; bottom:-1px">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>{{ $post->date }}</li>
                                <li class="blog-button"><a href="{{ route('singlepost',['id'=>$post->id]) }}">Read more <i class="fa fa-chevron-circle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
