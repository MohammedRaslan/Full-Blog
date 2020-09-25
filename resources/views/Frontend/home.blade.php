@extends('Frontend.Template.layout')
@section('title')
Home Page
@endsection
@section('content')
<!-- Slider Start -->
@if($home->slider !== "hide")
@include('Frontend.partials.slider')
@endif
<!-- About Start -->
@if($home->history !== "hide")
@include('Frontend.partials.about')
@endif
<!-- Features Start -->
@if($home->features !== "hide")
@include('Frontend.partials.features');
@endif
<!-- Services Start -->
@if($home->services !== "hide")
@include('Frontend.partials.services')
@endif
<!--Counter Start-->
@if($home->counter !== "hide")
@include('Frontend.partials.counter')
@endif
<!--Portfolio Start-->
@if($home->projects !== "hide")
@include('Frontend.partials.projects')
@endif
<!--FAQ Start-->
@if($home->faq !== "hide")
@include('Frontend.partials.faq')
@endif
<!--Team Start-->
@if($home->team !== "hide")
@include('Frontend.partials.team')
@endif
<!--Pricing Table Start-->
@if($home->pricing !== "hide")
@include('Frontend.partials.pricing')
@endif
<!--Testomonial-Area Start-->
@if($home->testimonials !== "hide")
@include('Frontend.partials.testimonials')
@endif
<!--Partners Start-->
@if($home->partners !== "hide")
@include('Frontend.partials.partners')
@endif
<!--Blog Start-->
@if($home->news !== "hide")
@include('Frontend.partials.blog')
@endif
@endsection
