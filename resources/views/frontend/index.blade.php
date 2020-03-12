@extends('frontend.layouts.app')
@section('content')

<!-- Slide show -->
@include('frontend.layouts.blocks.slide_show')

<!-- Mission -->
@include('frontend.layouts.blocks.mission')

<!-- Products -->
@include('frontend.layouts.blocks.product')

<!-- Service -->
@include('frontend.layouts.blocks.service')

<!-- Gallery -->
@include('frontend.layouts.blocks.gallerry')

<!-- Contact & Map -->
@include('frontend.layouts.blocks.contact_map')

@endsection