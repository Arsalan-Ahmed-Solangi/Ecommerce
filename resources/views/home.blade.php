@extends('layouts.app')

@section('header-top-menus-slider')
    @include('layouts.header-top-menus-with-slider')
@endsection

@section('content')
    @includeIf('home-page-contents')
@endsection

@section('footer-bottom-widget')
    @includeIf('layouts.footer-bottom-widgets')
@endsection
