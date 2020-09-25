<div class="portfolio-area pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $heading->home_projects }}</h2>
                    <hr class="line">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="portfolio-menu">
                    <ul id="filtrnav">
                        <li class="filtr filtr-active" data-filter="all">All</li>
                        @foreach($projects_cat as $cat)
                        <li class="filtr" data-filter="{{ $cat->id }}">{{ $cat->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row filtr-container" style="justify-content:center;">
            @foreach($projects as $project)
            <div class="col-lg-4 col-md-6 filtr-item" data-category="{{ $project->category_id }}" data-sort="Menu">
                <div class="portfolio-group">
                    <div class="portfolio-photo" style="background-image: url({{ asset('uploads/projects/' . $project->image ) }})">
                    </div>
                    <div class="portfolio-text">
                        <h3>{{ $project->name }}</h3>
                        <p>{{ $project->short_description }}</p>
                        <a class="btn btn-primary btn-project" href="{{ route('singleproject', ['id'=>$project->id]) }}">Learn More <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
