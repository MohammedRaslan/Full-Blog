<div class="questions pt_40 pb_40">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1">
                <div class="faq-area faq-home mt_10">
                    <div class="headline headline-faq hl-white hl-left">
                        <h2>{{ $heading->home_faq }}</h2>
                        <hr class="line-white">
                    </div>
                    <div class="faq-group pt-30">
                        <div id="accordion">
                            @foreach($faqs as $faq)
                            <div class="faq-item card">
                                <div class="faq-header" id="heading{{ $faq->id }}">
                                    <button class="faq-button collapsed" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}"><i class="fa fa-caret-right"></i>{{ $faq->question }} </button>
                                </div>
                                <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                                    <div class="faq-body">
                                        <p>{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
