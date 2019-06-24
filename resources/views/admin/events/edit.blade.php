@extends('admin')

@section("breadcrumbs")
    @include("components.navigations.breadcrumbs",[
        "breadcrumbs" => [
            [
                "name" => "Laman Utama",
                "link" => "admin.dashboard",
            ],

            [
                "name" => "Senarai Program",
                "link" => "admin.events.index",
            ],

            [
                "name" => "Kemaskini Program",
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
                            <i class="fa fa-calendar info-color py-4"></i>
                            <div class="data">
                                <h5 class="font-weight-bold dark-grey-text">Kemaskini Program - <span class="text-muted">Sila pastikan semua ruangan diisi</span></h5>
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!-- Form -->
                        <form method="POST" action="{{route('admin.events.update',  ['event'=>$record->event_id])}}">
                            @csrf
                            {{ method_field('PUT') }}
                            <!--Card content-->
                            <div class="card-body">
                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4">

                                    <div class="md-form form-sm">
                                        <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{ isset($record) ? $record->event_name : old('name') }}" required>
                                        <label for="name" class="">Nama Program </label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4">

                                    <div class="md-form form-sm">
                                       <input placeholder="Pilih Tarikh" type="text" id="date" name="date" class="form-control datepicker" value="{{ isset($record) ? $record->date : old('date') }}">
                                        <label for="date">Tarikh</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                              <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-6">

                                    <div class="md-form form-sm">
                                        <input type="text" name="description" id="description" class="form-control form-control-sm" value="{{ isset($record) ? $record->event_description : old('description') }}" required>
                                        <label for="description" class="">Keterangan </label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>

                                <!-- Grid row -->
                                <div class="row">
                            	  	<div class="col-lg-12 col-md-12 text-right pt-5">
                                		
                                        <button type="submit" class="btn btn-success  btn-rounded">Simpan</button>
                                        <a href="{{route('admin.events.show',['event'=>$record->event_id])}}"><button type="button" class="btn btn-flat grey lighten-3 btn-rounded waves-effect font-weight-bold dark-grey-text">Kembali</button></a>
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

               
            </div>
            <!--Grid row-->

        </section>
        <!--Section: Team v.1-->

    </div>
    <!-- /content -->
@endsection

@section('scripts')
    <script type="text/javascript">
        // Data Picker Initialization
        $('.datepicker').pickadate({
            // Escape any “rule” characters with an exclamation mark (!).
            format: 'dddd, dd mmm, yyyy',
            formatSubmit: 'yyyy-mm-dd',
            hiddenPrefix: 'prefix__',
            hiddenSuffix: '__suffix',

            // Strings and translations
            monthsFull: ['Januri', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'],
            monthsShort: ['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            weekdaysFull: ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'],
            weekdaysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
            showMonthsShort: undefined,
            showWeekdaysFull: undefined,

            today: 'Hari Ini',
            clear: 'Hapus',
            close: 'Tutup',
        })
    </script>
@endsection