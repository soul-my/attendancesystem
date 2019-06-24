@extends('admin')

@section("breadcrumbs")
    @include("components.navigations.breadcrumbs",[
        "breadcrumbs" => [
            [
                "name" => "Laman Utama",
                "link" => "admin.dashboard",
            ],

            [
                "name" => "Tetapan",
                "link" => "admin.manage.configuration.index",
            ],
        ]
    ])
@endsection

@section('content')

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

	<!-- content -->
    <div class="container-fluid">

        <!--Section: Team v.1-->
        <section class="section team-section">

            <!--Grid row-->
            <div class="row text-center">

                <!-- Grid column -->
                <div class="col-lg-10 col-md-12 col-xs-12 mb-4">

                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card user-card">

                        <!--Card Data-->
                        <div class="admin-up d-flex justify-content-start">
                            <i class="fa fa-cog info-color py-4"></i>
                            <div class="data">
                                <h5 class="font-weight-bold dark-grey-text">Konfigurasi Sistem - <small class="text-muted">Sebarang perubahan boleh menyebabkan kegagalan sistem berfungsi</small></h5>
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!-- Form -->
                        <form method="post" action="{{route('admin.manage.configuration.update',['configuration'=>$record->id])}}">
                            @csrf
                            {{ method_field('PUT') }}
                            <!--Card content-->
                            <div class="card-body">
                            	<h5 class="text-left pl-2"><strong>Informasi Sistem</strong></h5>
                            	<hr>
                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{$record->school_name}}" required>
                                            <label for="name" class="">Nama Sekolah</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" name="school_email" id="school_email" class="form-control form-control-sm" value="{{$record->school_email}}" required>
                                            <label for="school_email" class="">Email</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->


                                    <!-- Grid column -->
                                    <div class="col-lg-4 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="phoneNo" id="phoneNo" class="form-control form-control-sm" value="{{$record->school_tel}}" required>
                                            <label for="phoneNo" class="">No. Tel</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Grid column -->
                                    <div class="col-lg-8 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="school_address" id="school_address" class="form-control form-control-sm" value="{{$record->school_address}}" required>
                                            <label for="school_address" class="">Alamat Sekolah</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                </div>
                                <!-- Grid row -->   


                                <h5 class="text-left pl-2 pt-5"><strong>Informasi Webmaster</strong></h5>
                                <hr>
                                <!-- Grid row -->
                                <div class="row pb-5">

                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="webmaster_name" id="webmaster_name" class="form-control form-control-sm" value="{{$record->webmaster_name}}" required>
                                            <label for="webmaster_name" class="">Nama</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="webmaster_email" id="webmaster_email" class="form-control form-control-sm" value="{{$record->webmaster_email}}" required>
                                            <label for="webmaster_email" class="">Email</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="webmaster_tel" id="webmaster_tel" class="form-control form-control-sm" value="{{$record->webmaster_tel}}" required>
                                            <label for="webmaster_tel" class="">No. Tel</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->
                                </div>
                                @include('components.modals.warning', [
                                    'id' => 'warning-modal',
                                    'title'=>'Perhatian!',
                                    'body' => 'Adakah anda yakin untuk mengubah data',
                                    'btn_title' => 'Teruskan',
                                    'btn_type' => 'submit',
                                ])
                                </form>
                                <!-- /Form -->

                                <div class="row ">
                                    <div class="col-lg-12 col-md-12 text-right pt-5">
                                        <input  class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#warning-modal" value="Simpan"></input>
                                        <input type="button" class="btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold dark-grey-text" value="Kembali"></input>
                                    </div>  
                                </div>
                             
                            </div>
                            <!--/.Card content-->
                    </div>
                    <!--/.Card-->

                </div>
                <!-- Grid column -->

            {{--     <!-- Grid column -->
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

                </div>
                <!-- Grid column -->
 --}}
            </div>
            <!--Grid row-->

        </section>
        <!--Section: Team v.1-->

    </div>
    <!-- /content -->
@endsection

@section('scripts')
    
    <script type="text/javascript">
            
            $(function(){
                @if(old('education'))
                    $('#education').val(old('education'));
                @endif
            });

    </script>

@endsection