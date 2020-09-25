@extends('Backend.dashboard')
@section('title')
Website Settings
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
<!--====  End of Section Sessions Display  ====-->
<!--=====================================
=            Start Settings Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link  active" id="pills-color-tab" data-toggle="pill" href="#pills-color" role="tab" aria-controls="pills-color"><i class="fas fa-palette"></i> Theme Colors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-social-tab" data-toggle="pill" href="#pills-social" role="tab" aria-controls="pills-social"><i class="fas fa-link"></i> Social Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"><i class="fas fa-home"></i> Home Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-meta-tab" data-toggle="pill" href="#pills-meta" role="tab" aria-controls="pills-meta"><i class="fas fa-code"></i> Meta Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-titles-tab" data-toggle="pill" href="#pills-titles" role="tab" aria-controls="pills-titles"><i class="fas fa-heading"></i> Headings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-navbar-tab" data-toggle="pill" href="#pills-navbar" role="tab" aria-controls="pills-navbar"><i class="fas fa-list-ol"></i> Navbar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password"><i class="fas fa-user-lock"></i> Admins</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Theme Color Tab -->
                <div class="col-10 offset-1 tab-pane fade active show" id="pills-color" role="tabpanel" aria-labelledby="pills-color-tab">
                    <form method="POST" id="changeColor">
                        @csrf
                        <label class="home-page-label">Change Your Website Theme Color :</label>
                        <div class="row">
                            <div class=" col-md-6 col-sm-6 color-box  form-check">
                                <input @if($color->color == "red") checked @endif name="color" value="red" class="form-check-input" type="radio">
                                <label class="form-check-label">
                                    <div class="div-color" style="background-color: #df3e3e;">Red</div>
                                </label>
                            </div>
                            <div class=" col-md-6 col-sm-6 color-box form-check">
                                <input @if($color->color == "green") checked @endif name="color" value="green" class="form-check-input" type="radio">
                                <label class="form-check-label">
                                    <div class="div-color" style="background-color: #049372;">Green</div>
                                </label>
                            </div>
                            <div class=" col-md-6 col-sm-6 color-box form-check">
                                <input @if($color->color == "orange") checked @endif name="color" value="orange" class="form-check-input" type="radio">
                                <label class="form-check-label">
                                    <div class="div-color" style="background-color: #EEAB31;">Orange</div>
                                </label>
                            </div>
                            <div class=" col-md-6 col-sm-6 color-box form-check">
                                <input @if($color->color == "royalblue") checked @endif name="color" value="royalblue" class="form-check-input" type="radio">
                                <label class="form-check-label">
                                    <div class="div-color" style="background-color: #2C53D1;">Royal Blue</div>
                                </label>
                            </div>
                            <div class=" col-md-6 col-sm-6 color-box form-check">
                                <input @if($color->color == "bluejay") checked @endif name="color" value="bluejay" class="form-check-input" type="radio">
                                <label class="form-check-label">
                                    <div class="div-color" style="background-color: #046593;">Blue Jay</div>
                                </label>
                            </div>
                            <div class=" col-md-6 col-sm-6 color-box form-check">
                                <input @if($color->color == "motarde") checked @endif name="color" value="motarde" class="form-check-input" type="radio">
                                <label class="form-check-label">
                                    <div class="div-color" style="background-color: #FF9800;">Motarde</div>
                                </label>
                            </div>
                            <div class=" col-md-6 col-sm-6 color-box form-check">
                                <input @if($color->color == "purple") checked @endif name="color" value="purple" class="form-check-input" type="radio">
                                <label class="form-check-label">
                                    <div class="div-color" style="background-color: #7C61D6;">Purple</div>
                                </label>
                            </div>
                            <div class=" col-md-6 col-sm-6 color-box form-check">
                                <input @if($color->color == "black") checked @endif name="color" value="black" class="form-check-input" type="radio">
                                <label class="form-check-label">
                                    <div class="div-color" style="background-color: #000;">Black</div>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Save Color</button>
                    </form>
                </div>
                <!-- End Theme Color Tab -->
                <!-- Start Social Media Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-social" role="tabpanel" aria-labelledby="pills-social-tab">
                    <form method="POST" id="changeSocials">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Facebook Link</label>
                                <input name="facebook" value="{{ $socials->facebook }}" type="text" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Twitter Link</label>
                                <input name="twitter" value="{{ $socials->twitter }}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Linkedin Link</label>
                                <input name="linkedin" value="{{ $socials->linkedin }}" type="text" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Instagram Link</label>
                                <input name="instagram" value="{{ $socials->instagram }}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Youtube Link</label>
                                <input name="youtube" value="{{ $socials->youtube }}" type="text" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <label class="home-page-label">Vimeo Link</label>
                                <input name="vimeo" value="{{ $socials->vimeo }}" type="text" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End Social Media Tab -->
                <!-- Start Home Page Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form method="POST" id="changeHomePage">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Slider</label>
                                <select name="slider" class="custom-select">
                                    <option @if($homePage->slider == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->slider == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">History & Skills</label>
                                <select name="history" class="custom-select">
                                    <option @if($homePage->history == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->history == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Features</label>
                                <select name="features" class="custom-select">
                                    <option @if($homePage->features == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->features == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Services</label>
                                <select name="services" class="custom-select">
                                    <option @if($homePage->services == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->services == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Counter</label>
                                <select name="counter" class="custom-select">
                                    <option @if($homePage->counter == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->counter == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Projects Portfolio</label>
                                <select name="projects" class="custom-select">
                                    <option @if($homePage->projects == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->projects == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">FAQ</label>
                                <select name="faq" class="custom-select">
                                    <option @if($homePage->faq == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->faq == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Team</label>
                                <select name="team" class="custom-select">
                                    <option @if($homePage->team == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->team == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Pricing Table</label>
                                <select name="pricing" class="custom-select">
                                    <option @if($homePage->pricing == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->pricing == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Testimonials</label>
                                <select name="testimonials" class="custom-select">
                                    <option @if($homePage->testimonials == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->testimonials == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Partners</label>
                                <select name="partners" class="custom-select">
                                    <option @if($homePage->partners == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->partners == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <label class="home-page-label">Blog</label>
                                <select name="news" class="custom-select">
                                    <option @if($homePage->news == "show") selected @endif value="show">Show On Home Page</option>
                                    <option @if($homePage->news == "hide") selected @endif  value="hide">Hide On Home Page</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Customization</button>
                    </form>
                </div>
                <!-- End Home Page Tab -->
                <!-- Start Meta Tags Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-meta" role="tabpanel" aria-labelledby="pills-meta-tab">
                    <form method="POST" id="changeMetas" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="home-page-label">Website Title</label>
                            <input name="title" value="{{ $metas->title }}"  type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Description Meta Tag</label>
                            <textarea name="description" class="form-control" rows="4">{{ $metas->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Keywords Tag</label>
                            <input name="keywords" value="{{ $metas->keywords }}"  type="text" class="form-control">
                            <small class="text-danger">** Separate your keywords by a comma.</small>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Copyright Footer</label>
                            <textarea name="copyright" class="form-control" rows="2">{{ $metas->copyright }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="home-page-label">Favicon</label>
                            <input name="favicon" type="file" class="form-control">
                        </div>
                        <div class="mb-3">
                            <small>Current Favicon :</small>
                            <img src="{{ asset('uploads/' . $metas->favicon) }}" height="50px">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Informations</button>
                    </form>
                </div>
                <!-- End Meta Tags Tab -->
                <!-- Start Sections Titles Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-titles" role="tabpanel" aria-labelledby="pills-titles-tab">
                    <form method="POST" id="editHeading">
                        @csrf
                        <div class="row">
                        <div class="col-6 form-group padding-and-border" >
                            <h5 class="heading-title">Edit Home Page Headings :</h5>
                            <input name="home_history" value="{{ $heading->home_history }}"  type="text" class="form-control input-uppercase">
                            <input name="home_skills" value="{{ $heading->home_skills }}"  type="text" class="form-control input-uppercase">
                            <input name="home_why" value="{{ $heading->home_why }}"  type="text" class="form-control input-uppercase">
                            <input name="home_services" value="{{ $heading->home_services }}"  type="text" class="form-control input-uppercase">
                            <input name="home_projects" value="{{ $heading->home_projects }}"  type="text" class="form-control input-uppercase">
                            <input name="home_faq" value="{{ $heading->home_faq }}"  type="text" class="form-control input-uppercase">
                            <input name="home_pricing" value="{{ $heading->home_pricing }}"  type="text" class="form-control input-uppercase">
                            <input name="home_team" value="{{ $heading->home_team }}"  type="text" class="form-control input-uppercase">
                            <input name="home_testimonials" value="{{ $heading->home_testimonials }}"  type="text" class="form-control input-uppercase">
                            <input name="home_partners" value="{{ $heading->home_partners }}"  type="text" class="form-control input-uppercase">
                            <input name="home_news" value="{{ $heading->home_news }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        <div class="col-6">
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Prices Headings :</h5>
                            <input name="prices_title" value="{{ $heading->prices_title }}"  type="text" class="form-control input-uppercase">
                            <input name="prices_most" value="{{ $heading->prices_most }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>

                        </div>
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit About us Page Headings :</h5>
                            <input name="about_title" value="{{ $heading->about_title }}"  type="text" class="form-control input-uppercase">
                            <input name="about_mission" value="{{ $heading->about_mission }}"  type="text" class="form-control input-uppercase">
                            <input name="about_vision" value="{{ $heading->about_vision }}"  type="text" class="form-control input-uppercase">
                            <input name="about_history" value="{{ $heading->about_history }}"  type="text" class="form-control input-uppercase">
                            <input name="about_skills" value="{{ $heading->about_skills }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>

                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Features Page Headings :</h5>
                            <input name="features_title" value="{{ $heading->features_title }}"  type="text" class="form-control input-uppercase">
                            <input name="features_why" value="{{ $heading->features_why }}"  type="text" class="form-control input-uppercase">
                            <input name="features_choice" value="{{ $heading->features_choice }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Services Page Headings :</h5>
                            <input name="services_title" value="{{ $heading->services_title }}"  type="text" class="form-control input-uppercase">
                            <input name="services_discover" value="{{ $heading->services_discover }}"  type="text" class="form-control input-uppercase">
                            <input name="services_other" value="{{ $heading->services_other }}"  type="text" class="form-control input-uppercase">
                            <input name="services_contact" value="{{ $heading->services_contact }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Team Page Headings :</h5>
                            <input name="team_title" value="{{ $heading->team_title }}"  type="text" class="form-control input-uppercase">
                            <input name="team_meet" value="{{ $heading->team_meet }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Projects Page Headings :</h5>
                            <input name="projects_title" value="{{ $heading->projects_title }}"  type="text" class="form-control input-uppercase">
                            <input name="projects_quality" value="{{ $heading->projects_quality }}"  type="text" class="form-control input-uppercase">
                            <input name="projects_overview" value="{{ $heading->projects_overview }}"  type="text" class="form-control input-uppercase">
                            <input name="projects_details" value="{{ $heading->projects_details }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Testimonials Page Headings :</h5>
                            <input name="testimonials_title" value="{{ $heading->testimonials_title }}"  type="text" class="form-control input-uppercase">
                            <input name="testimonials_say" value="{{ $heading->testimonials_say }}"  type="text" class="form-control input-uppercase">
                            <input name="testimonials_loyals" value="{{ $heading->testimonials_loyals }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Blog Page Headings :</h5>
                            <input name="blog_title" value="{{ $heading->blog_title }}"  type="text" class="form-control input-uppercase">
                            <input name="blog_share" value="{{ $heading->blog_share }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Contact Page Headings :</h5>
                            <input name="contact_title" value="{{ $heading->contact_title }}"  type="text" class="form-control input-uppercase">
                            <input name="contact_send" value="{{ $heading->contact_send }}"  type="text" class="form-control input-uppercase">
                            <input name="faq_keep" value="{{ $heading->faq_keep }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Faq's Page Headings :</h5>
                            <input name="faq_title" value="{{ $heading->faq_title }}"  type="text" class="form-control input-uppercase">
                            <input name="faq_any" value="{{ $heading->faq_any }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        </div>
                        </div>
                        <div class="p-0 col-12">
                        <div class="form-group padding-and-border" >
                            <h5 class="heading-title">Edit Footer Headings :</h5>
                            <input name="footer_contact" value="{{ $heading->footer_contact }}"  type="text" class="form-control input-uppercase">
                            <input name="footer_links" value="{{ $heading->footer_links }}"  type="text" class="form-control input-uppercase">
                            <input name="footer_keep" value="{{ $heading->footer_keep }}"  type="text" class="form-control input-uppercase">
                            <input name="footer_newsletter" value="{{ $heading->footer_newsletter }}"  type="text" class="form-control input-uppercase">
                            <button type="submit" class="btn btn-primary btn-block">Save Informations</button>
                        </div>
                        </div>
                    </form>
                </div>
                <!-- End Sections titles Tab -->
                <!-- Start Navbar Menu Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-navbar" role="tabpanel" aria-labelledby="pills-navbar-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Navbar Item</th>
                                <th class="text-center">Edit Item</th>
                                <th class="text-center">Show / Hide</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($navbar as $item)
                            <tr>
                                <th class="text-center">{{ $item->title }}</th>
                                <td class="text-center">
                                    <form id="changeNavbar"  method="post">
                                        @csrf
                                        <div class="row form-group">
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <input class="offset-1 col-5 form-control" type="text" value="{{ $item->title }}" name="title">
                                            <button type="submit" class="offset-1 col-4 btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form id="changeNavbarStatus"  method="post">
                                        @csrf
                                        <div class="row form-group">
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                            <select name="appear" class="col-5 offset-1 custom-select">
                                                <option @if($item->appear == "show") selected @endif value="show">Show</option>
                                                <option @if($item->appear == "hide") selected @endif  value="hide">Hide</option>
                                            </select>
                                            <button type="submit" class="offset-1 col-4 btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Navbar Menu Tab -->
                <!-- Start Admins Tab -->
                <div class="col-12 tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                    <div class="row">
                        <div class="change-admin col-lg-5 col-md-12 col-sm-12 ml-4">
                            <form method="POST" id="changeCredentials">
                                @csrf
                                <div class="form-group">
                                    <b><label class="row home-page-label">Change Your Credentials</label></b>
                                    <label>Change Email</label>
                                    <input name="new_email" type="text" value="{{ $admin->email }}" class="form-control">
                                    <label>Current Password</label>
                                    <input name="current_password" type="password" class="form-control">
                                    <label>New Password</label>
                                    <input name="new_password" type="password" class="form-control">
                                    <label>Repeat New Password</label>
                                    <input name="confirm_password" type="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12  ml-4 mr-4">
                            <form method="POST" id="addAdmin">
                                @csrf
                                <div class="form-group">
                                    <b><label class="row home-page-label">Add New Admin Account</label></b>
                                    <label>Username</label>
                                    <input placeholder="Enter a username .." name="name" type="text" class="form-control">
                                    <label>Email Address</label>
                                    <input placeholder="Enter a valid Email .." name="email" type="email" class="form-control email">
                                    <label>Password</label>
                                    <input placeholder="Choose a strong password" name="password" type="password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Admin</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                        <div class="col-lg-10 offset-1 col-md-12 col-sm-12">
                            <b><label class="row home-page-label">Manage Admins List</label></b>
                            <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Admins Email</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="tbl">
                            @foreach($users as $user)
                            <tr >
                                <th class="text-center">{{ $user->email }}</th>
                                <td class="text-center">
                                <button id="{{$user->id}}" class="btn btn-danger deleteAdmin">Delete Admin</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        </div>
                </div>
                <!-- End Admins Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
