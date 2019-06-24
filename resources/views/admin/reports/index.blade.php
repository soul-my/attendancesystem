@extends('admin')

@section("breadcrumbs")
    @include("components.navigations.breadcrumbs",[
        "breadcrumbs" => [
            [
                "name" => "Laman Utama",
                "link" => "admin.dashboard",
            ],
            [
                "name" => "Lihat Program",
                "link" => "admin.events.index",
            ],
            [
                "name" => "Laporan",
                "link" => "disabled",
            ],
        ]
    ])
@endsection

<!-- overwrite current sidebar state-->
@section("sidebar")
    @include("components.navigations.sidebar", ["active" =>"events"])
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
                            <i class="fa fa-file-text info-color py-4"></i>
                            <div class="data">
                                <h5 class="font-weight-bold dark-grey-text">Laporan - Sila Pilih Program dan jenis laporan yang diingini<span class="text-muted"></span></h5>
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!-- Form -->
                        <form method="post" action="{{route('admin.report.genarate')}}">
                            @csrf
                            <!--Card content-->
                            <div class="card-body">
                            <!-- Grid row -->
                            <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-lg-6">

                                    <div class="md-form form-sm">
                                        
                                        <select class="mdb-select colorful-select dropdown-primary" name="event_id" id="event_id" required>

                                            @foreach($event_list as $event)
                                                <option value="{{$event->event_id}}">{{$event->date}} | {{$event->event_name}} </option>
                                            @endforeach

                                        </select>
                                        <label for="event" class="">Program </label>
                                        
                                        
                                    </div>

                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class="col-lg-6">

                                    <div class="md-form form-sm">
                                        
                                        <select class="mdb-select colorful-select dropdown-primary" name="report_type" id="report_type" required>

                                            <option value="all" selected="">Semua</option>
                                        </select>
                                        <label for="event" class="">Jenis Laporan </label>
                                        
                                        
                                    </div>

                                </div>
                                <!-- Grid column -->
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <span id="message" class=""></span>
                                </div>
                            </div>

                            <!-- Grid row -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 text-right pt-5">
                                        
                                    <button type="submit" id="submit" class="btn btn-success  btn-rounded">Jana</button>
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
            $('#ic_number').on('keyup', function(){

                var ic_no = $('#ic_number').val();

                $.ajax({
                    url: '{{route('admin.parent.validate_ic')}}?ic=' + ic_no,
                    method : 'get',
                    success: function(object){

                        if (object.status == 'berjaya') {
                            

                            for(i = 0; i < object.message.length; i++)
                            {
                                var ownerName = object.message[0].name;
                            }

                            $('#submit').prop("disabled", false); 
                            $('#message').removeClass('red-text').addClass('green-text').html(object.status+' | '+ownerName);


                        }else{
                            $('#submit').prop("disabled", true); 
                            $('#message').removeClass('green-text').addClass('red-text').html(object.message);
                        }

                        console.log("status returned from server:"+object);

                    },
                    error: function(xhr, textStatus, errorThrown){
                        console.log(errorThrown);
                    }
                });


            });
        });
    </script>
@endsection