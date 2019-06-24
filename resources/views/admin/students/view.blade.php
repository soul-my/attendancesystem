@extends('admin')

@section("breadcrumbs")
    @include("components.navigations.breadcrumbs",[
        "breadcrumbs" => [
            [
                "name" => "Laman Utama",
                "link" => "admin.dashboard",
            ],
            [
                "name" => "Senarai Pelajar",
                "link" => "admin.student.index",
            ],
            [
                "name" => "Lihat Profil",
                "link" => "disabled",
            ],
        ]
    ])
@endsection


@section('content')
    <div class="container-fluid">

        <!--Section: Team v.1-->
        <section class="section team-section">

            <!--Grid row-->
            <div class="row text-center">

                <!-- Grid column -->
                <div class="col-md-8 mb-4">
                    <form method="post" action="{{route('admin.student.store')}}">
                        @csrf

                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card user-card pb-5">

                            <!--Card Data-->
                            <div class="admin-up d-flex justify-content-start">
                                <i class="fa fa-graduation-cap deep-purple darken-1 py-4"></i>
                                <div class="data">
                                    <h5 class="font-weight-bold dark-grey-text">Profil Pelajar - <span class="text-muted"> {{$record->name}}
                                        <a href="{{route('admin.student.edit',['student' => $record->student_id])}}">
                                            <button class="btn btn-sm btn-rounded btn-outline-primary waves-effect" type="button">
                                                Kemaskini
                                            </button>
                                        </a></span></h5>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Grid row -->
                                <div class="row text-left">

                                    <!-- Grid column -->
                                    <div class="col-lg-6">

                                        <div class="md-form form-sm">
                                            <p><strong>Nama: </strong>{{$record->name}}</p>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-6">

                                        <div class="md-form form-sm">
                                            <p><strong>No. IC: </strong>{{$record->ic_number}}</p>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                </div>

                                <!-- Grid row -->
                                <div class="row text-left">

                                    <!-- Grid column -->
                                    <div class="col-lg-6">
                                        <div class="md-form form-sm pt-3">
                                            <p><strong>Kelas: </strong>{{$record->class->form}} {{$record->class->name}}</p>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-6">
                                        <div class="md-form form-sm">
                                            <p><strong>Ibu/Bapa: </strong>{{$record->parents->name}}
                                                <span class="text-muted">
                                                    <a class="btn-floating btn-sm purple-gradient" href="{{route('admin.parent.show',['parent'=>$record->parent_id])}}"><i class="fa fa-chevron-right"></i></a>
                                                   {{--  <button class="btn btn-sm btn-rounded btn-outline-secondary waves-effect" type="button"></button> --}}
                                                </span>
                                            </p>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                </div>
                                
                              <!-- Grid row -->
                                <div class="row text-left">
                                    <!-- Grid column -->
                                    <div class="col-lg-6">
                                        <div class="md-form form-sm">
                                            <p><strong>No. Tel: </strong>{{$record->phone_number}}</p>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                </div>

                         

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 text-left pt-5">
                                        
                                        <a href="{{route('admin.student.index')}}"><button type="button" class="btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold dark-grey-text">Kembali</button></a>
                                    </div>  
                                 
                                </div>

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                        
                    </form>
                </div>
                <!-- Grid column -->

               {{--  <!-- Grid column -->
                <div class="col-md-4 mb-4">

                    <!--Card-->
                    <div class="card profile-card">

                        <!--Avatar-->
                        <div class="avatar z-depth-1-half mb-4">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle" alt="First sample avatar image">
                        </div>

                        <div class="card-body pt-0 mt-0">
                            <!--Name-->
                            <h3 class="mb-3 font-weight-bold"><strong>Anna Deynah</strong></h3>
                            <h6 class="font-weight-bold cyan-text mb-4">Web Designer</h6>

                            <p class="mt-4 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip consequat.</p>

                            <a class="btn btn-info btn-rounded waves-effect waves-light"> Follow</a>

                        </div>

                    </div>
                    <!--Card-->

                </div> --}}
                <!-- Grid column -->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Team v.1-->

    </div>

@endsection