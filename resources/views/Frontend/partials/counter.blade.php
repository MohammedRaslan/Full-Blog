<div class="counterup-area pt_60 pb_90">
    <div class="bg-counterup"></div>
    <div class="container">
        <div class="row" style="justify-content:center">
            @foreach($counters as $counter)
            <div class="col-lg-3 col-md-6">
                <div class="counter-item flex">
                    <h2 class="counter">{{ $counter->number }}</h2>
                    <h4>{{ $counter->title }}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
