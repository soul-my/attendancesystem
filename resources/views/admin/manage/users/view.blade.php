@extends('admin')

@section("breadcrumbs")
    @include("components.navigations.breadcrumbs",[
        "breadcrumbs" => [
            [
                "name" => "Laman Utama",
                "link" => "admin.dashboard",
            ],
            [
                "name" => "Senarai Pengguna",
                "link" => "admin.manage.users.index",
            ],
            [
                "name" => "Tambah Pengguna",
                "link" => "disabled",
            ],
        ]
    ])
@endsection


@section('content')
    <div class="container-fluid">

        @if(!$errors->isEmpty())
            @include('components.modals.error', [
                'id' => 'error-modal',
                'title' => 'Ralat!',
                'errors' => $errors,
            ])

            @section('scripts')
                <script type="text/javascript">
                    $(function(){
                        $('#error-modal').modal('show');
                    });
                </script>
            @append
        @endif

        <!--Section: Team v.1-->
        <section class="section team-section">

            <!--Grid row-->
            <div class="row text-center">

                <!-- Grid column -->
                <div class="col-md-8 mb-4">
                    <form method="post" action="{{route('admin.manage.users.store')}}">
                        @csrf

                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card user-card pb-5">

                            <!--Card Data-->
                            <div class="admin-up d-flex justify-content-start">
                                <i class="fa fa-user-plus deep-purple darken-1 py-4"></i>
                                <div class="data">
                                    <h5 class="font-weight-bold dark-grey-text">Lihat Pengguna- <a href="{{route('admin.manage.users.edit',['user'=>$record->id])}}"><button class="btn btn-sm btn-rounded btn-outline-primary waves-effect" type="button">Kemaskini</button></a></h5>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body ">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="md-form text-left">
                                            <p><strong>Nama: </strong>{{$record->name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form text-left">
                                            <p><strong>Email: </strong>{{$record->email}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form text-left">
                                            @if($record->access_level == 1)
                                                <p><strong>Jenis Akaun: </strong>Superadmin</p>
                                            @elseif($record->access_level == 2)
                                                <p><strong>Jenis Akaun: </strong>Admin</p>
                                            @elseif($record->access_level == 3)
                                                <p><strong>Jenis Akaun: </strong>Pengguna</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12 col-md-12 text-right pt-5">

                                        <a href="{{route('admin.manage.users.index')}}"><button type="button" class="btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold dark-grey-text">Kembali</button></a>
                                    </div>  
                                 
                                </div>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                        
                    </form>
                </div>
                <!-- Grid column -->

             

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Team v.1-->

    </div>

@endsection