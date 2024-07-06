@extends('frontend.home.master')
@section('title')
    Grow Soft
@endsection
@section('content')
     <!-- Hero Section Begin -->
     @include('frontend.section.slider')
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    @include('frontend.section.category')
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    @include('frontend.section.featured')
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    @include('frontend.section.banner')
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    @include('frontend.section.latestProduct')
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    @include('frontend.section.blog')
    <!-- Blog Section End -->
@endsection