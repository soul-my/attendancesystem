
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
    <!-- SideNav slide-out button -->
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fa fa-bars"></i></a>
    </div>
    <!-- Breadcrumb-->
    <div class="breadcrumb-dn mr-auto">
        <ol class="breadcrumb ">
            @yield("breadcrumbs")
        </ol>
    </div>


    @guest
        GUEST
    @else
        <!--Navbar links-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">

            <li class="nav-item">
                <a class="nav-link waves-effect"><span class="clearfix d-none d-sm-inline-block">Welcome, {{Auth::User()->name}}!</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Logout</span></a>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" id="logout-btn" href="{{route("logout")}}">Log Out</a>
                </div>
            </li>

        </ul>
        <!--/Navbar links-->
    @endguest
</nav>
<!-- /.Navbar -->

<form id="logout-form" method="post" action="{{route("logout")}}" >@csrf</form>
