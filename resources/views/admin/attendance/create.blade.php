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
                "name" => "Tambah Kedatangan",
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

    @include('components.modals.info2',['title'=>'Berjaya','body' =>'Maklumat Penjaga untuk kehadiran program telah berjaya dimasukkan']);
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
                            <i class="fa fa-user-circle info-color py-4"></i>
                            <div class="data">
                                <h5 class="font-weight-bold dark-grey-text">Tambah Kedatangan - <span class="text-muted">Sila pastikan semua ruangan diisi</span></h5>
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!-- Form -->
                        <form method="post" action="{{route('admin.attendance.store')}}">
                            @csrf
                            <!--Card content-->
                            <div class="card-body">
                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-6 pb-3">

                                    <div class="md-form form-sm">
                                        <input type="text" name="ic_number" id="ic_number" class="form-control form-control-sm" value="{{old('event_name')}}" required>
                                        <label for="ic_number" class="">No. IC Penjaga </label>
                                    </div>

                                </div>
                                <!-- Grid column -->


                            </div>
                            
                            <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-lg-6">

                                    <div class="md-form form-sm">
                                        @if($event_id != null)
                                            <input type="hidden" name="event_id" id="event_id" class="form-control form-control-sm" value="{{ $event_id ? $event_id : old('event_id')}}" required>
                                        @else
                                            <select class="mdb-select colorful-select dropdown-primary" name="event_id" id="event_id" required>

                                                @foreach($event_list as $event)
                                                    <option value="{{$event->event_id}}">{{$event->date}} | {{$event->event_name}} </option>
                                                @endforeach

                                            </select>
                                            <label for="event" class="">Program </label>
                                        @endif
                                        
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
                            		
                                    <button type="submit" id="submit" class="btn btn-success  btn-rounded" disabled="">Simpan</button>
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
            
            @if( app('request')->input('modal') == 'show')
                $('#centralModalInfo').modal('show');
            @endif

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