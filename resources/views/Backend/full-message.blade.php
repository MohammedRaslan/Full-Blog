@extends('Backend.dashboard')
@section('title')
Full Message
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
                    id="pills-messages-tab" data-toggle="pill" href="#pills-messages" role="tab" aria-controls="pills-messages"><i class="fa fa-pencil"></i> List Of Your Messages</a>
                </li>
                <a class="badge badge-pill badge-primary add-new-slider" href="{{ route('messagespage') }}">
                    <i class="fas  fa-arrow-left"></i>
                    Back To All Messages
                </a>
            </ul>
            <!-- End Nav -->
            <!-- Start Body -->
            <div class="row tab-content mt-2" id="pills-tabContent">
                <!-- Start subscribers Tab -->
                <div class="table-responsive col-lg-10 offset-lg-1 col-md-12 col-sm-12 tab-pane fade show active"
                    id="pills-messages" role="tabpanel" aria-labelledby="pills-messages-tab">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 25%;" class="text-center">From :</th>
                                <td class="text-center"><b>{{ $message->name }}</b> - {{ $message->email }}</td>
                            <tr>
                            <tr>
                                <th style="width: 25%;" class="text-center">Message Subject</th>
                                <td class="text-center">{{ $message->subject }}</td>
                            </tr>
                            <tr>
                                <th style="width: 25%;" class="text-center">Full Message</th>
                                <td class="text-center">{{ $message->message }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End subscribers Tab -->
            </div>
        </div>
    </div>
</div>
<!--====  End of Section Settings  ====-->
@endsection
