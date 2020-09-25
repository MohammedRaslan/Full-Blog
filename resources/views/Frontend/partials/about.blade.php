<div class="about-area pt_60 pb_60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt_30">
                <div class="about-content">
                    <div class="headline-left">
                        <center><h2><span></span> {{ $heading->home_history }}</h2></center>
                        <hr class="line">
                    </div>
                    <p>{{ $about->history }}</p>
                </div>
            </div>
            <div class="col-lg-6 mt_30">
                <div class="headline-left">
                    <center><h2><span></span> {{ $heading->home_skills }}</h2></center>
                    <hr class="line">
                </div>
                <div class="progress-gallery main-prog">
                    @foreach($skills as $skill)
                    <div class="bar-container">
                        <p>{{ $skill->name }}</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-custom" role="progressbar" aria-valuenow="{{ $skill->pourcentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->pourcentage }}%;">
                            </div>
                        </div>
                        <div class="percentage-show">{{ $skill->pourcentage }} %</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
