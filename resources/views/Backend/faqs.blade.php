@extends('Backend.dashboard')
@section('title')
Frequently Asked Questions
<br>
Change Navbar Visiablity:
<input type="checkbox" data-id="{{ $nav->id }}" name="status" id="ChangeFaqNavVis" class="js-switch" {{ $nav->appear == 'show' ? 'checked' : '' }}>
<br>
Change Home Page Visiablity:
<input type="checkbox" data-id="{{ $home->id }}" name="status" id="ChangeFaqVis" class="js-switch" {{ $home->faq == 'show' ? 'checked' : '' }}>

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
<!--====  End of Section Sessions & Errors Display  ====-->
<!--=====================================
=            Start Features Section     =
======================================-->
<div class="row">
    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
        <div class="card website-settings-card shadow mb-5">
            <!-- Start Nav -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >
                <li class="nav-item">
                    <a class="nav-link active"
                    id="pills-questions-tab" data-toggle="pill" href="#pills-questions" role="tab" aria-controls="pills-questions"><i class="fa fa-pencil"></i> Edit Your Questions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-addquestion-tab" data-toggle="pill" href="#pills-addquestion" role="tab" aria-controls="pills-addquestion"><i class="fa fa-plus"></i> Add a New Question</a>
                </li>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start Questions Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active" id="pills-questions" role="tabpanel" aria-labelledby="pills-questions-tab">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Questions</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody  class="faqtbl">
                            @foreach($faqs as $faq)
                            <tr>
                                <th class="text-center p-4">{{ $faq->question }}</th>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="{{ route('edit.faq', ['id'=>$faq->id]) }}">Edit Faq</a>
                                <button class="delete-faq btn btn-danger" id="{{$faq->id}}" title="">Delete Faq</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Services Tab -->
                <!-- Start Add Faq Tab -->
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade" id="pills-addquestion" role="tabpanel" aria-labelledby="pills-addquestion-tab">
                    <form id="addfaq" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="home-page-label">Question</label>
                        <input type="text" name="question" placeholder="Enter Your question.." class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="home-page-label">Answer</label>
                        <textarea name="answer" placeholder="Enter Your Answer.." class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Informations</button>
                </form>
                </div>
                <!-- End Add Service Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Services  ====-->
@endsection
