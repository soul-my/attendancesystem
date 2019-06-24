<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav sn-bg-4 fixed">
    <ul class="custom-scrollbar">
    <!-- Logo -->
    <li class="logo-sn waves-effect">
        <div class="text-center">
            <a href="#" class="pl-0"><strong>Sistem PIBG</strong></a>
        </div>
    </li>
    <!--/. Logo -->

    <!--Search Form-->
    <li>
        <form class="search-form" role="search">
            <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
    </li>
    <!--/.Search Form-->
    <!-- Side navigation links -->
    <li>
        <ul class="collapsible collapsible-accordion">

            <li><a class="collapsible-header waves-effect arrow-r {{ isset($active) && $active == 'dashboard' ? 'active' : '' }}" href="{{ route('admin.index') }}"><i class="fa fa-home"></i>{{trans('sidebar.dashboard-parent')}}</a></li>

            
                <li>
                    <a class="collapsible-header waves-effect arrow-r {{  isset($active) && $active == 'parents' ? 'active' : '' }}"><i class="fa fa-user-circle"></i> {{trans('sidebar.parent-info-title')}}<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('admin.parent.index')}}" class="waves-effect">{{trans('sidebar.parent-list')}}</a>
                            </li>
                            <li><a href="{{route('admin.parent.create')}}" class="waves-effect">{{trans('sidebar.add')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r {{  isset($active) && $active == 'students' ? 'active' : '' }}"><i class="fa fa-graduation-cap"></i> {{trans('sidebar.student-info-title')}}<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('admin.student.index')}}" class="waves-effect">{{trans('sidebar.student-list')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @if(Auth::User()->access_level == 1 || Auth::User()->access_level == 2)
               <li><a class="collapsible-header waves-effect arrow-r {{  isset($active) && $active == 'events' ? 'active' : '' }}"><i class="fa fa-calendar"></i> {{trans('sidebar.event-info-title')}}<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{route('admin.events.index')}}" class="waves-effect">{{trans('sidebar.event-list')}}</a>
                            </li>
                            <li><a href="#" class="waves-effect">{{trans('sidebar.add')}}</a>
                            </li>
                            <li><a href="{{route('admin.report.index')}}" class="waves-effect">{{trans('sidebar.event-report')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                <a class="collapsible-header waves-effect arrow-r {{  isset($active) && $active == 'manage-users' ? 'active' : '' }}"><i class="fa fa-user-plus"></i> {{trans('sidebar.manageuser-info-title')}}<i class="fa fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('admin.manage.users.index')}}" class="waves-effect">{{trans('sidebar.manageuser-list')}}</a>
                        </li>
                        <li><a href="{{route('admin.manage.users.create')}}" class="waves-effect">{{trans('sidebar.add')}}</a>
                        </li>
                    </ul>
                </div>
                </li>
            @endif

            @if(Auth::user()->access_level == 1)
                <!-- Simple link -->    
                <li class="pt-5"><a href="{{route('admin.manage.configuration.index')}}" class="collapsible-header waves-effect {{ isset($active) && $active == 'settings' ? 'active' : '' }}"><i class="fa fa-cogs"></i> Tetapan</a></li>
            @endif

            @if(Auth::user()->access_level == 3)
                <!-- Simple link -->
                <li><a href="{{route('admin.attendance.create')}}" class="collapsible-header waves-effect {{ isset($active) && $active == 'att' ? 'active' : '' }}"><i class="fa fa-user-plus"></i> Tambah Kedatangan</a></li>
            @endif
        </ul>
    </li>
    <!--/. Side navigation links -->
    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div>
<!--/. Sidebar navigation -->