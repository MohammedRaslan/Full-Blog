<div class="brand-area bg-area pt_50 pb_50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="headline">
                    <h2>{{ $heading->home_partners }}</h2>
                    <hr class="line">
                </div>
            </div>
            <div class="col-12">
           
                <div class="brand-carousel owl-carousel">
                    @foreach($partners as $partner)
                    <div class="brand-item">
                        <img src="{{ asset('uploads/partners/' . $partner->logo) }}" alt="Partner">
                        <b><p class="pt_20 text-center">{{ $partner->name }}</p></b>
                    </div>  
                    @endforeach
                  
                </div>
            </div>
        </div>
    </div>
</div>
