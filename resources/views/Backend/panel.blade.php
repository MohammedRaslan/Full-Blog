@extends('Backend.dashboard')
@section('title')
Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row">
        <!-- Website Settings Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Website Settings</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('settingspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tools fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About us Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25"  style="margin-top: 20px;">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">About us</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('aboutpage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25"  style="margin-top: 20px;">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Slider</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('sliderpage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Features</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('featurespage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cubes fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Services</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('servicespage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-toolbox fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Counter Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Counter</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('counterspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-poll fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Partners Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Partners</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('partnerspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pricing Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Pricing</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('pricingpage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Team Members</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('teampage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Projects Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Projects</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('projectspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-globe fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Posts Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Blog Posts</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('postspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ's Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">FAQ's</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('faqspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribers Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Subscribers List</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('subscriberspage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Messages Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Contact Messages</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('messagespage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pages Card -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-25" style="margin-top: 20px;">
            <div class="card mt-25 border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="panel-card row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-dark text-uppercase mb-1">Pages</div>
                            <div class="h5 mb-0 text-gray-800">
                                <a href="{{ route('pagespage') }}" class="edit-section badge badge-dark">Edit</a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
