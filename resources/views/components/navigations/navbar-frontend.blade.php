
@section('styles')

    <style type="text/css">
        .scrolling-navbar {
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }
        .top-nav-collapse {
            background-color: white;
        }

        .navbar-text {
            color: #ffffff;
        }

        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: white;
                color: #000000;
            }
        }
    </style>

@append


<!--Navigation-->
<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg  navbar-light scrolling-navbar white">
        <div class="container-fluid justify-content-center align-items-center">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown ml-4 mb-0">

                        <a class="navbar-brand waves-effect waves-light dark-grey-text font-weight-bold " id="navbarDropdownMenuLink"> SyzygySys </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                     <li class="nav-item dropdown ml-4  mb-0">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" id="navbarDropdownMenuLink-2" href="{{route('admin.frontend.collection')}}"> Collection </a>

                    </li>
                    <li class="nav-item dropdown ml-4  mb-0">
                        <a href="#" class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" id="navbarDropdownMenuLink-4"> Store </a>

                    </li>
                    <li class="nav-item ml-4 mb-0">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="#">Contact
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item ml-4 mb-0">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold" href="#">About
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </div>

            <div class="navbar-nav ml-auto">

            </div>

           {{--  <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item ">
                    <a class="nav-link waves-effect waves-light">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
            </ul> --}}
        </div>

    </nav>
    <!-- /.Navbar -->

</header>
<!-- /.Navigation -->
