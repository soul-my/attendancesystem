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
                "name" => "Lihat Program",
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
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card user-card pb-5">

                        <!--Card Data-->
                        <div class="admin-up d-flex justify-content-start">
                            <i class="fa fa-calendar info-color py-4"></i>
                            <div class="data">
                                <h5 class="font-weight-bold dark-grey-text">Lihat Program - <a href="{{route('admin.events.edit',['events'=>$record->event_id])}}"><button class="btn btn-sm btn-rounded btn-outline-primary waves-effect" type="button">Kemaskini</button></a></h5>
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!-- Form -->
                        <form method="post" action="{{route('admin.events.store')}}">
                            @csrf
                            <!--Card content-->
                            <div class="card-body">
                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Nama Program:</strong> {{$record->event_name}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Tarikh Program:</strong> {{$record->date}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                              <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Keterangan:</strong> {{$record->event_description}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

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


        <div class="row">
            <div class="col-md-6 col-xs-6 text-left pb-3 pt-2">
                <h4 class="text-white pt-2"><i class="fa fa-list"></i> Senarai Kedatangan</h4>
            </div>
            <div class="col-md-6 col-xs-6 text-right pb-3">
                <a href="{{route('admin.pdf.attendance.generate')}}?event={{$record->event_id}}" target="_blank"><button type="button" class="btn btn-warning ">Cetak</button></a>
                <a href="{{route('admin.attendance.create')}}?event={{$record->event_id}}"><button type="button" class="btn btn-success ">Tambah Kedatangan</button></a>

                {{-- <h3 class="text-white pb-3"><i class="fas fa-tags"></i> All Products</h3> --}}
            </div>
        </div>


        
        <div class="col-md-12 jumbotron text-center p5">
            <div class="table-wrapper pb-4">
               @include("components.datatable.datatable", [
                        "id" => "users-table",
                        "checkbox" => "disabled",
                        "thead" => [
                            "title" => ["No","Nama Penjaga","Nama Pelajar","Hapus"],
                            "class" => "th-md",
                            "icons" => "",
                        ]
                    ])
            </div>

            <hr class="my-0">
        </div>


        <input type="hidden" name="_deleteID" id="_deleteID">
        @include('components.modals.warning',[
            'id' => 'warning-modal',
            'title'=>'Perhatian!',
            'body' => 'Adakah anda yakin untuk hapuskan maklumat?',
            'btn_type' => 'button',
            'btn_title' => 'Teruskan'
        ])

        <!-- Central Modal Medium Info -->
    <div class="modal fade" id="sucess-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead" id="info-modal-title"></p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                    <p id="info-modal-body"></p>
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Tutup</a>    
            </div>
        </div>
        <!--/.Content-->
    </div>
    </div>
    <!-- Central Modal Medium Info-->

    </div>
    <!-- /content -->
@endsection

@section('scripts')
    <script type="text/javascript">

        function delete_data(id) {
            
            var attendance_id = $('#_deleteID').val(id);

        }

       $(function(){
            //datatable
            var table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('admin.attendance.datatable.event-view')}}?event={{$record->event_id}}',
                pageLength: 5,
                columns: [
                    { data: 'event_id', name: 'event_id' },
                    { data: 'parents', name: 'parents' , searchable: true},
                    { data: 'children', name: 'children' , searchable: false},
                    { data: 'btn_edit_delete', name: 'btn_edit_delete', searchable: false },
                ],

                // dom: "<'#'>", // horizobtal scrollable datatable

            });


            $('#warning-modal-btn').on( "click", function() {

                var attendance_id = $('#_deleteID').val();
                var csrf_token = '{{csrf_token()}}';

                $.ajax({
                    url: "{{route('admin.attendee.delete')}}",
                    method : 'post',
                    data: {
                        "_token" : csrf_token,
                        "attendance_id"  : attendance_id,
                    },
                    success: function(object){
                        console.log("status returned from server:"+object);

                        if (object.status == 'success') {
                            $('#info-modal-title').html('Berjaya');
                            $('#info-modal-body').html(object.message);
                            $('#warning-modal').modal('hide');

                            table.ajax.reload();

                            $('#sucess-modal').modal('show');
                        }else{
                            $('#info-modal-title').html('Informasi');
                            $('#info-modal-body').html('Server Error, Sila cuba lagi');
                            $('#warning-modal').modal('hide');
                            $('#sucess-modal').modal('show');
                        }
                    },
                    error: function(xhr, textStatus, errorThrown){
                        
                    }
                });
            });

        })
    </script>
@endsection