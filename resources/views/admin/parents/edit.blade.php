@extends('admin')

@section("breadcrumbs")
    @include("components.navigations.breadcrumbs",[
        "breadcrumbs" => [
            [
                "name" => "Laman Utama",
                "link" => "admin.dashboard",
            ],
            [
                "name" => "Lihat Penjaga",
                "link" => "admin.parent.index",
            ],
            [
                "name" => "Kemaskini ",
                "link" => "disabled",
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
                <div class="col-md-8 mb-4">

                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card user-card">

                        <!--Card Data-->
                        <div class="admin-up d-flex justify-content-start">
                            <i class="fa fa-users info-color py-4"></i>
                            <div class="data">
                                <h5 class="font-weight-bold dark-grey-text">Kemaskini Profil Penjaga - <span class="text-muted">Sila pastikan semua ruangan diisi</span></h5>
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!-- Form -->
                        <form method="post" action="{{route('admin.parent.update',['parent'=>$record->parent_id])}}">
                            {{ method_field('PUT') }}
                            @csrf
                            <!--Card content-->
                            <div class="card-body">
                                <h5 class="text-left pl-2"><strong>Informasi Penjaga Utama</strong><small><font style="color: red"> * Diperlukan</font></small></h5>
                                <hr>
                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{$record->name ? $record->name : old('name')}}" required>
                                            <label for="name" class="">Nama </label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" name="icnumber" id="icnumber" class="form-control form-control-sm" value="{{$record->ic_number ? $record->ic_number : old('icnumber')}}" required>
                                            <label for="icnumber" class="">No. IC</label>
                                        </div>
                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">
                                        <div class="md-form form-sm">
                                            <!--Blue select-->
                                            <select class="mdb-select colorful-select dropdown-primary" name="race" id="race" required>

                                                @foreach($races as $race)
                                                    <option value="{{$race->race_id}}" {{ $record->race_id == $race->race_id || old('race') == $race->race_id ? 'selected' : ''}}>{{$race->name}}</option>
                                                @endforeach

                                            </select>
                                          {{--   <input type="text" name="race" id="race" class="form-control form-control-sm"> --}}
                                            <label for="race">Bangsa</label>
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
                                            <select class="mdb-select colorful-select dropdown-primary" name="religion" id="religion" required>

                                                @foreach($religions as $religion)
                                                    <option value="{{$religion->religion_id}}" {{ $record->religion_id == $religion->religion_id || old('religion') == $religion->religion_id ? 'selected' : ''}}>{{$religion->name}}</option>
                                                @endforeach

                                            </select>
                                          {{--   <input type="text" name="race" id="race" class="form-control form-control-sm"> --}}
                                            <label for="religions">Agama</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <div class="md-form form-sm">
                                            <!--Blue select-->
                                            <select class="mdb-select colorful-select dropdown-primary" name="education" id="education" required>

                                                @foreach($educations as $education)
                                                    <option value="{{$education->education_id}}" {{$record->education_id == $education->education_id || old('education') == $education->education_id ? 'selected' : ''}}>{{$education->name}}</option>
                                                @endforeach

                                            </select>
                                          {{--   <input type="text" name="race" id="race" class="form-control form-control-sm"> --}}
                                            <label for="education">Pendidikan</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="email" id="email" class="form-control form-control-sm" value="{{$record->email ? $record->email : old('email')}}" required>
                                            <label for="email" class="">Email</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->


                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm">
                                            <input type="text" name="phoneNo" id="phoneNo" class="form-control form-control-sm" value="{{$record->phone_number ? $record->phone_number  : old('phoneNo')}}" required>
                                            <label for="phoneNo" class="">No. Tel</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->   


                                <h5 class="text-left pl-2 pt-5"><strong>Informasi Pekerjaan</strong></h5>
                                <hr>
                                <!-- Grid row -->
                                <div class="row pb-5">

                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="profession" id="profession" class="form-control form-control-sm" value="{{$record->profession ? $record->profession : old('profession')}}" required>
                                            <label for="profession" class="">Pekerjaan</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->


                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm">
                                             <!--Blue select-->
                                            <select class="mdb-select colorful-select dropdown-primary" name="income" id="income" required>

                                                @foreach($incomes as $income)
                                                    <option value="{{$income->income_id}}" {{ $record->income_id == $income->income_id || old('income') == $income->income_id ? 'selected' : ''}}>{{$income->name}}</option>
                                                @endforeach

                                            </select>
                                            <label for="income" class="">Pendapatan</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>

                                <!--mother information -->
                                <h5 class="text-left pl-2 pt-5"><strong>Informasi Penjaga Kedua - </strong><small class="text-muted"> optional</small></h5>
                                <hr>
                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" name="mother_name" id="mother_name" class="form-control form-control-sm" value="{{$record->mother_name ?  $record->mother_name : old('mother_name')}}">
                                            <label for="mother_name" class="">Nama</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" name="mother_icnumber" id="mother_icnumber" class="form-control form-control-sm" value="{{$record->mother_icnumber ? $record->mother_icnumber : old('mother_icnumber')}}">
                                            <label for="mother_icnumber" class="">No. IC</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">
                                        <div class="md-form form-sm">
                                            <!--Blue select-->
                                            <select class="mdb-select colorful-select dropdown-primary" name="mother_race" id="mother_race">

                                                @foreach($races as $race)
                                                    <option value="{{$race->race_id}}" {{$record->mother_race_id == $race->race_id || old('mother_race') == $race->race_id ? 'selected' : ''}}>{{$race->name}}</option>
                                                @endforeach

                                            </select>
                                          {{--   <input type="text" name="race" id="race" class="form-control form-control-sm"> --}}
                                            <label for="mother_race">Bangsa</label>
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
                                            <select class="mdb-select colorful-select dropdown-primary" name="mother_religion" id="mother_religion">

                                                @foreach($religions as $religion)
                                                    <option value="{{$religion->religion_id}}" {{$record->mother_religion_id == $religion->religion_id || old('mother_religion') == $religion->religion_id ? 'selected' : ''}}>{{$religion->name}}</option>
                                                @endforeach

                                            </select>
                                          {{--   <input type="text" name="race" id="race" class="form-control form-control-sm"> --}}
                                            <label for="mother_religions">Agama</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <div class="md-form form-sm">
                                            <!--Blue select-->
                                            <select class="mdb-select colorful-select dropdown-primary" name="mother_education" id="mother_education">

                                                @foreach($educations as $education)
                                                    <option value="{{$education->education_id}}" {{$record->mother_education_id == $education->education_id || old('mother_education') == $education->education_id ? 'selected' : ''}}>{{$education->name}}</option>
                                                @endforeach

                                            </select>
                                          {{--   <input type="text" name="race" id="race" class="form-control form-control-sm"> --}}
                                            <label for="mother_education">Pendidikan</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="mother_email" id="mother_email" class="form-control form-control-sm" value="{{$record->mother_email ? $record->mother_email : old('mother_email')}}">
                                            <label for="mother_email" class="">Email</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->


                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm">
                                            <input type="text" name="mother_phoneNo" id="mother_phoneNo" class="form-control form-control-sm" value="{{$record->mother_phone_number ? $record->mother_phone_number : old('mother_phoneNo')}}">
                                            <label for="mother_phoneNo" class="">No. Tel</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->   


                                <h5 class="text-left pl-2 pt-5"><strong>Informasi Pekerjaan</strong></h5>
                                <hr>
                                <!-- Grid row -->
                                <div class="row pb-4">

                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" name="mother_profession" id="mother_profession" class="form-control form-control-sm" value="{{$record->mother_profession ? $record->mother_profession : old('mother_profession')}}">
                                            <label for="mother_profession" class="">Pekerjaan</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->


                                    <!-- Grid column -->
                                    <div class="col-lg-6 col-md-6">

                                        <div class="md-form form-sm">
                                             <!--Blue select-->
                                            <select class="mdb-select colorful-select dropdown-primary" name="mother_income" id="mother_income">

                                                @foreach($incomes as $income)
                                                    <option value="{{$income->income_id}}" {{$record->mother_income_id == $income->income_id || old('mother_income') == $income->income_id ? 'selected' : ''}}>{{$income->name}}</option>
                                                @endforeach

                                            </select>
                                            <label for="mother_income" class="">Pendapatan</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>

                                <h5 class="text-left pl-2 pt-5"><strong>Informasi Alamat</strong></h5>
                                <hr>
                                <!-- Grid row -->
                                <div class="row">
                                    
                                    <!-- Grid column -->
                                    <div class="col-md-8">

                                        <div class="md-form form-sm">
                                            <input type="text" name="address" id="address" class="form-control form-control-sm" value="{{$record->address ? $record->address : old('address')}}" required>
                                            <label for="address" class="">Alamat</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 text-right pt-5">
                                        
                                        <button type="submit" class="btn btn-success  btn-rounded">Simpan</button>
                                        <button type="button" class="btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold dark-grey-text">Kembali</button>
                                    </div>  
                                 
                                </div>

                              
                            </div>
                            <!--/.Card content-->
                        </form>
                        <!-- /Form -->

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