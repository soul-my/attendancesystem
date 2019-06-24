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
                "name" => "Tambah Pelajar",
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
                <div class="col-md-8 mb-4 mr-4">
                    <form method="post" action="{{route('admin.student.store')}}">
                        @csrf

                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card user-card pb-5">

                            <!--Card Data-->
                            <div class="admin-up d-flex justify-content-start">
                                <i class="fa fa-graduation-cap deep-purple darken-1 py-4"></i>
                                <div class="data">
                                    <h5 class="font-weight-bold dark-grey-text">Tambah Maklumat Pelajar- <span class="text-muted">Sila pastikan semua ruangan diisi</span></h5>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" id="name" name="name" class="form-control form-control-sm">
                                            <label for="name" class="">Nama</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" id="icnumber" name="icnumber" class="form-control form-control-sm">
                                            <label for="icnumber" class="">No. IC:</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" id="phoneNo" name="phoneNo" class="form-control form-control-sm">
                                            <label for="phoneNo">No. Tel:</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <div class="md-form form-sm">
                                            <!--Blue select-->
                                            <select class="mdb-select colorful-select dropdown-primary" name="classroom" id="classroom" required>

                                                @foreach($classrooms as $class)
                                                    <option value="{{$class->class_id}}">{{$class->form}} {{$class->name}}</option>
                                                @endforeach

                                            </select>
                                            {{--   <input type="text" name="race" id="race" class="form-control form-control-sm"> --}}
                                            <label for="classroom" class="">Kelas</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <div class="md-form form-sm">
                                            @if($parent_id != 'none')
                                                <input type="hidden" id="parent_id" name="parent_id" class="form-control form-control-sm" value="{{ $parent_id != 'none' ? $parent_id : '' }}" >

                                            @endif
                                            @if($parent_id == null)
                                                <input type="text" id="parent_ic" name="parent_ic" class="form-control form-control-sm" value="{{ $parent_id != 'none' ? $parent_id : '' }}">
                                                <label for="parent_ic" class="">No. IC Penjaga Utama</label>
                                            @endif
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->


                                <div class="row">
                                    <div class="col-lg-12 col-md-12 text-right pt-5">
                                        
                                        <button type="submit" class="btn btn-success  btn-rounded">Simpan</button>

                                        @if($parent_id != null)
                                            <a href="{{route('admin.parent.show',['parent'=> $parent_id])}}">
                                                <button type="button" class="btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold dark-grey-text">Kembali</button>
                                            </a>
                                        @else
                                            <a href="{{route('admin.student.index')}}">
                                                <button type="button" class="btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold dark-grey-text">Kembali</button>
                                            </a>
                                        @endif
                                       
                                    </div>  
                                 
                                </div>

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                        
                    </form>
                </div>
                <!-- Grid column -->

                {{-- <!-- Grid column -->
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
                <!-- Grid column --> --}}

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Team v.1-->

    </div>

@endsection