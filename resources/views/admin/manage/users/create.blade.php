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
                                    <h5 class="font-weight-bold dark-grey-text">Tambah Pengguna- <span class="text-muted">Sila pastikan semua ruangan diisi</span></h5>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body ">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="text" id="name" name="name" class="form-control" required="" value="{{old('name')}}">
                                            <label for="name">Nama</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form">

                                            <input type="email" id="email" name="email" class="form-control" required="" value="{{old('email')}}">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form">
                                            <input type="password" id="password" name="password" class="form-control" required="">
                                            <label for="password">Kata Laluan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form pt-2">

                                            <select class="mdb-select colorful-select dropdown-primary" name="acc_type" id="acc_type" required>
                                                @if(Auth::User()->access_level == 1)
                                                    <option value="1" {{old('acc_type') == 1 ? 'selected' : ''}}>Superadmin</option>
                                                @endif
                                                <option value="2" {{old('acc_type') == 2 ? 'selected' : ''}}>Admin</option>
                                                <option value="3" {{old('acc_type') == 3 ? 'selected' : ''}}>Pengguna</option>

                                            </select>
                                            <label for="acc_type">Jenis Akaun</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 text-right pt-5">
                                        
                                        <button type="submit" class="btn btn-success  btn-rounded">Simpan</button>
                                        <button type="button" class="btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold dark-grey-text">Kembali</button>
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