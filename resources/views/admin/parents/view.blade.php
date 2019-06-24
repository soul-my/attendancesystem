@extends('admin')

@section("breadcrumbs")
	@include("components.navigations.breadcrumbs",[
		"breadcrumbs" => [
			[
				"name" => "Laman Utama",
				"link" => "admin.dashboard",
			],
			[
				"name" => "Maklumat Penjaga",
				"link" => "admin.parent.index",
			],
			[
				"name" => "Lihat Rekod Penjaga",
				"link" => "disabled",
			],
    	]
	])
@endsection

<!-- overwrite current sidebar state-->
@section("sidebar")
    @include("components.navigations.sidebar", ["active" =>"product"])
@endsection

@section("content")

    <div class="container-fluid">

        <!--Section: Team v.1-->
        <section class="section team-section">

            <!--Grid row-->
            <div class="row text-center">

                <!-- Grid column -->
                <div class="col-md-6 mb-4">

                    <!--Card-->
                    <div class="card card-cascade cascading-admin-card user-card pb-4">

                        <!--Card Data-->
                        <div class="admin-up d-flex justify-content-start">
                            <i class="fa fa-user-circle info-color py-4"></i>
                            <div class="data">
                                <h5 class="font-weight-bold dark-grey-text">Profil Penjaga Utama - <a href="{{route('admin.parent.edit',['parent'=>$record->parent_id])}}"><button class="btn btn-sm btn-rounded btn-outline-primary waves-effect" type="button">Kemaskini</button></a></h5>
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Nama: </strong>{{$record->name}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>No. IC: </strong>{{$record->ic_number}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Bangsa: </strong>{{$record->race->name}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Agama: </strong>{{$record->religion->name}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Pendidikan: </strong>{{$record->education->name }}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Pekerjaan: </strong>{{$record->profession}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->	


                            <!-- Grid row -->
                            <div class="row">

                            	 <!-- Grid column -->
                                <div class="col-md-8 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Alamat: </strong>{{$record->address}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>No. Tel: </strong>{{$record->ic_number}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->
                        	  
                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Email: </strong>{{$record->email}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                 <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Pendapatan: </strong>{{$record->income->name}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->


                            </div>
                            <!-- Grid row -->	
                 
{{-- 
                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4 col-md-12">

                                    <div class="md-form form-sm">
                                        <input type="text" id="form7" class="form-control form-control-sm">
                                        <label for="form7" class="">City</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 col-md-6">

                                    <div class="md-form form-sm">
                                        <input type="text" id="form8" class="form-control form-control-sm">
                                        <label for="form8" class="">Country</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 col-md-6">

                                    <div class="md-form form-sm">
                                        <input type="text" id="form9" class="form-control form-control-sm">
                                        <label for="form9" class="">Postal Code</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->
 --}}
                         {{--    <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-md-12 about-text">

                                    <h4 class="text-muted text-left my-4"><strong>About me</strong></h4>

                                    <!--Basic textarea-->
                                    <div class="md-form">
                                        <textarea type="text" id="form10" class="md-textarea form-control" rows="3"></textarea>
                                        <label for="form10">Basic textarea</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row --> --}}

                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6 mb-4">

                   <!--Card-->
                    <div class="card card-cascade cascading-admin-card user-card pb-5">

                        <!--Card Data-->
                        <div class="admin-up d-flex justify-content-start">
                            <i class="fa fa-user-circle pink darken-1 py-4"></i>
                            <div class="data">
                                <h5 class="font-weight-bold dark-grey-text">Profil Penjaga Kedua - <a href="{{route('admin.parent.edit',['parent'=>$record->parent_id])}}"><button class="btn btn-sm btn-rounded btn-outline-primary waves-effect" type="button">Kemaskini</button></a></h5>
                            </div>
                        </div>
                        <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Nama: </strong>{{$record->mother_name != null ? $record->mother_name : '-'}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>No. IC: </strong>{{$record->mother_icnumber != null ? $record->mother_icnumber : '-'}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Bangsa: </strong>{{$record->mother_race_id != 0 ? $record->mom_race->name : '-'}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Agama: </strong>{{$record->mother_religion_id != 0 ? $record->mom_religion->name : '-'}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Pendidikan: </strong>{{$record->mother_education_id != 0 ? $record->mom_education->name : '-'  }}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Pekerjaan: </strong>{{$record->mother_profession != null ? $record->mother_profession : '-'}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->   


                            <!-- Grid row -->
                            <div class="row">

                                 <!-- Grid column -->
                                <div class="col-md-8 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Alamat: </strong>{{$record->mother_name != null ? $record->address : '-'}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Phone Number: </strong>{{$record->mother_phone_number != null ? $record->mother_phone_number : "-"}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->
                              
                                <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Email: </strong>{{$record->mother_email != null ? $record->mother_email : "-"}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                 <!-- Grid column -->
                                <div class="col-lg-4 text-left">

                                    <div class="md-form form-sm">
                                        <p><strong>Pendapatan: </strong>{{$record->mother_income_id != 0? $record->mom_income->name : "-"}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->


                            </div>
                            <!-- Grid row -->   
                 
{{-- 
                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4 col-md-12">

                                    <div class="md-form form-sm">
                                        <input type="text" id="form7" class="form-control form-control-sm">
                                        <label for="form7" class="">City</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 col-md-6">

                                    <div class="md-form form-sm">
                                        <input type="text" id="form8" class="form-control form-control-sm">
                                        <label for="form8" class="">Country</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4 col-md-6">

                                    <div class="md-form form-sm">
                                        <input type="text" id="form9" class="form-control form-control-sm">
                                        <label for="form9" class="">Postal Code</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->
 --}}
                         {{--    <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-md-12 about-text">

                                    <h4 class="text-muted text-left my-4"><strong>About me</strong></h4>

                                    <!--Basic textarea-->
                                    <div class="md-form">
                                        <textarea type="text" id="form10" class="md-textarea form-control" rows="3"></textarea>
                                        <label for="form10">Basic textarea</label>
                                    </div>

                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row --> --}}

                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->

                </div>
                <!-- Grid column -->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Team v.1-->


        <section>
			<div class="row">
				<div class="col-md-6 col-xs-6 text-left pb-3 pt-2">
					<h4 class="text-white pt-2"><i class="fa fa-users"></i> Maklumat Anak</h4>
				</div>
				<div class="col-md-6 col-xs-6 text-right pb-3">
					<a href="{{route('admin.student.create')}}?parent={{$record->parent_id}}"><button type="button" class="btn btn-success ">Tambah Maklumat</button></a>
					{{-- <h3 class="text-white pb-3"><i class="fas fa-tags"></i> All Products</h3> --}}
				</div>
			</div>
	        <div class="col-md-12 jumbotron text-center p5">
			 	<div class="table-wrapper pb-4">
		           @include("components.datatable.datatable", [
		                    "id" => "users-table",
		                    "checkbox" => "disabled",
		                    "thead" => [
		                        "title" => ["No","Nama","No. IC","Kelas","Kemaskini/Hapus"],
		                        "class" => "th-md",
		                        "icons" => "",
		                    ]
		                ])
		        </div>

		        <hr class="my-0">
			</div>
		</section>
	   
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

@endsection


@section("scripts")
	<script type="text/javascript">

        function delete_data(id) {
            
            var parent_id = $('#_deleteID').val(id);

        }

		$(function(){
			//datatable
	        var table = $('#users-table').DataTable({
	            processing: true,
	            serverSide: true,
	            ajax: '{{route('admin.student.datatable')}}?parent={{$record->parent_id}}',
	            pageLength: 5,
	            columns: [
	                { data: 'parent_id', name: 'parent_id' },
	                { data: 'name', name: 'name' },
	                { data: 'ic_number', name: 'ic_number' },
	                { data: 'classroom', name: 'classroom' },
	                { data: 'btn_edit_delete', name: 'btn_edit_delete', searchable: false },
	            ],

	            // dom: "<'#'>", // horizobtal scrollable datatable

	        });

            $('#warning-modal-btn').on( "click", function() {

                var student_id = $('#_deleteID').val();
                var csrf_token = '{{csrf_token()}}';

                $.ajax({
                    url: "{{route('admin.student.delete')}}",
                    method : 'post',
                    data: {
                        "_token" : csrf_token,
                        "student_id"  : student_id,
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
@append