@extends('layouts.admin-layout-min')

@section('title')
    SyzygySys Pltd.
@endsection

@section('seo')
    @include('components.seo.seo', [
        "sitename" => "SyzygySys",
        "description" => "syzygy Pltd is a startup company specialize in web development",
        "url" => '{{route("admin.frontend")}}',
        "author" => "Muhammad Iqmal",
        "keyword" => "syzygysys;syzygy pltd;killyparadox;web developer;new startup;specialize in web application",
        "title" => "SyzygySys Pltd",
        "type" => "profile",
        "imguri" => "https://avatars2.githubusercontent.com/u/13929043?s=400&v=4",
        "twithandle" => "@killyparadox",
        "favicon" => "https://assets-cdn.github.com/favicon.ico",
    ])
@endsection

@section('body-class')
    class="night-mode"
@endsection

@section('navbar')
    @include('components.navigations.navbar-frontend')
@endsection

@section('content')
    <!-- carousel section-->

        @include('components.carousel.carousel-video')

    <!-- /carousel section-->


<!--Footer-->
<footer class="page-footer font-small unique-color-dark pt-0">

    <div style="background-color: white;">
        <div class="container">
            <!--Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!--Grid column-->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0 black-text">Get connected with us on social networks!</h6>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <!--Facebook-->
                    <a class="fb-ic ml-0">
                        <i class="fa fa-facebook mr-lg-4"> </i>
                    </a>
                    <!--Twitter-->
                    <a class="tw-ic">
                        <i class="fa fa-twitter mr-lg-4"> </i>
                    </a>
                    <!--Google +-->
                    <a class="gplus-ic">
                        <i class="fa fa-google-plus mr-lg-4"> </i>
                    </a>
                    <!--Linkedin-->
                    <a class="li-ic">
                        <i class="fa fa-linkedin mr-lg-4"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fa fa-instagram mr-lg-4"> </i>
                    </a>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
    </div>
</footer>
<!--/.Footer-->

@endsection

