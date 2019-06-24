@extends('layouts.admin-layout')

    @section("title")
        Admin Dashboard
    @endsection

    @section("sidebar")
        @include("components.navigations.sidebar")
    @endsection

    @section("navbar")
        @include("components.navigations.navbar")
    @endsection

    @section("content")
        @yield("body")
    @endsection