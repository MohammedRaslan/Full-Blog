<!-- Services Section Start -->
<div id="services" class="pb_50 pt_50">
    <div class="container">
        <div class="row pb_30">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $heading->home_services }}</h2>
                    <hr class="line">
                </div>
            </div>
        </div>
        <div class="row" style="justify-content:center">
            @foreach($services as $service)
            <div class="col-md-6 col-lg-4 col-sm-12">
                <div class="item-boxes">
                    <div class="icon">
                        <i class="fa {{ $service->icon }}" aria-hidden="true"></i>
                    </div>
                    <h4><a href="{{ route('singleservice', ['id'=> $service->id]) }}">{{ $service->title }}</a></h4>
                    <p>{{ $service->short_description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services Section End -->
