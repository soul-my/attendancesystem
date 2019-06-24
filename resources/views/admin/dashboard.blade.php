@extends('admin')

@section("breadcrumbs")
	@include("components.navigations.breadcrumbs",[
		"breadcrumbs" => [
			[
				"name" => "Admin",
				"link" => "disabled",
			],
			[
				"name" => "Dashboard",
				"link" => "admin.dashboard",
			],
    	]
	])
@endsection

<!-- overwrite current sidebar state-->
@section("sidebar")
    @include("components.navigations.sidebar", ["active" =>"dashboard"])
@endsection

@section("body")
<div class="container-fluid">

@if(Auth::User()->access_level != 3)
<!--Section: Intro-->
<section class="mt-lg-5">

    <!--Grid row-->
    <div class="row">

        
        <!--Grid column-->
        <div class="col-xl-3 col-md-6 mb-4">

            <!--Card-->
            <div class="card card-cascade cascading-admin-card">

                <!--Card Data-->
                <div class="admin-up">
                    <i class="fa fa-calendar primary-color"></i>
                    <div class="data">
                        <p>Jumlah Program</p>
                        <h4 class="font-weight-bold dark-grey-text">{{$events}}</h4>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="card-body">
                    
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-md-6 mb-4">

            <!--Card-->
            <div class="card card-cascade cascading-admin-card">

                <!--Card Data-->
                <div class="admin-up">
                    <i class="fa fa-graduation-cap warning-color"></i>
                    <div class="data">
                        <p>Jumlah Pelajar</p>
                        <h4 class="font-weight-bold dark-grey-text">{{$students}}</h4>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="card-body">
                    
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-md-6 mb-4">

            <!--Card-->
            <div class="card card-cascade cascading-admin-card">

                <!--Card Data-->
                <div class="admin-up">
                    <i class="fa fa-users light-blue lighten-1"></i>
                    <div class="data">
                        <p>Jumlah Ibu/Bapa</p>
                        <h4 class="font-weight-bold dark-grey-text">{{$parents}}</h4>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="card-body">
                    
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-md-6 mb-4">

            <!--Card-->
            <div class="card card-cascade cascading-admin-card">

                <!--Card Data-->
                <div class="admin-up">
                    <i class="fa fa-bar-chart red accent-2"></i>
                    <div class="data">
                        <p>Jumlah Pengguna</p>
                        <h4 class="font-weight-bold dark-grey-text">{{$users}}</h4>
                    </div>
                </div>
                <!--/.Card Data-->

                <!--Card content-->
                <div class="card-body">
                    
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->


    </div>
    <!--Grid row-->

</section>
<!--Section: Intro-->
@endif

<!--Section: Team v.1-->
    <section class="section team-section">

        <!--Grid row-->
        <div class="row text-center">

            <!-- Grid column -->
            <div class="col-lg-12 col-md-12 col-xs-12 mb-4">

                <!--Card-->
                <div class="card card-cascade cascading-admin-card user-card">

                    <!--Card Data-->
                    <div class="admin-up d-flex justify-content-start">
                        <i class="fa fa-cloud info-color py-4"></i>
                        <div class="data">
                            <h5 class="font-weight-bold dark-grey-text">Selamat Datang Ke Sistem PIBG : <small class="text-muted">{{$configs->school_name}}</small></h5>
                        </div>
                    </div>
                    <!--/.Card Data-->

                        <!--Card content-->
                        <div class="card-body">
                        	<h5 class="text-left pl-2"><strong>Informasi Sekolah</strong></h5>
                        	<hr>
                            <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-lg-4">

                                    <div class="md-form form-sm">
                                        <p class="text-left"><strong>Nama Sekolah </strong>: {{$configs->school_name}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-lg-4">

                                    <div class="md-form form-sm">
                                        <p class="text-left"><strong>Email Rasmi</strong>: {{$configs->school_email}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->
                               
                            </div>
                            <!-- Grid row -->

                            <!-- Grid row -->
                            <div class="row">
                                <!-- Grid column -->
                                <div class="col-lg-4 col-md-12">

                                    <div class="md-form form-sm">
                                        <p class="text-left"><strong>Alamat Sekolah </strong>: {{$configs->school_address}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class="col-lg-4 col-md-12">

                                    <div class="md-form form-sm">
                                        <p class="text-left"><strong>No. Tel </strong>: {{$configs->school_tel}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->
                            </div>
                            <!-- Grid row -->   


                            <h5 class="text-left pl-2 pt-5"><strong>Sekiranya terdapat sebarang masalah, sila hubungi webmaster seperti berikut:</strong></h5>
                            <hr>
                            <!-- Grid row -->
                            <div class="row pb-5">

                                <!-- Grid column -->
                                <div class="col-lg-6 col-md-12">

                                    <div class="md-form form-sm">
                                        <p class="text-left"><strong>Nama </strong>: {{$configs->webmaster_name}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class="col-lg-6 col-md-12">

                                    <div class="md-form form-sm">
                                        <p class="text-left"><strong>Email</strong>: {{$configs->webmaster_email}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class="col-lg-6 col-md-12">

                                    <div class="md-form form-sm">
                                        <p class="text-left"><strong>No. Tel</strong>: {{$configs->webmaster_tel}}</p>
                                    </div>

                                </div>
                                <!-- Grid column -->
                            </div>
                        </div>
                        <!--/.Card content-->
                </div>
                <!--/.Card-->

            </div>

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Team v.1-->





<div style="height: 5px"></div>


</div>
@endsection

@section("scripts")
	<script type="text/javascript">
		$(function(){

			//line
			var ctxL = document.getElementById("lineChart1").getContext('2d');
			var myLineChart = new Chart(ctxL, {
			    type: 'line',
			    data: {
			        labels: ["January", "February", "March", "April", "May", "June", "July"],
			        datasets: [
			            {
			                label: "This year",
			               	backgroundColor : "rgb(213,0,249, 0.4)",
			               	borderColor : "rgba(233, 30, 99, 0.7)",
			               	pointBackgroundColor : "rgba(220,220,220,1)",
			               	pointBorderColor : "#fff",
			               	pointHoverBackgroundColor : "#fff",
			               	pointHoverBorderColor : "rgba(220,220,220,1)",
			                data: [20, 32, 80, 23, 60, 55, 86]
			            },
			            {
			                label: "Last year",
			                fillColor: "rgba(151,187,205,0.2)",
			                strokeColor: "rgba(151,187,205,1)",
			                pointColor: "rgba(151,187,205,1)",
			                pointStrokeColor: "#fff",
			                pointHighlightFill: "#fff",
			                pointHighlightStroke: "rgba(151,187,205,1)",
			                data: [28, 48, 40, 19, 86, 27, 90]
			            }
			        ]
			    },
			    options: {
			        responsive: true
			    }
			});


			//line
			var ctxL2 = document.getElementById("lineChart2").getContext('2d');
			var myLineChart2 = new Chart(ctxL2, {
			    type: 'line',
			    data: {
			        labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
			        datasets: [
			            {
			                label: "This week",
			               	backgroundColor : "rgb(213,0,249, 0.4)",
			               	borderColor : "rgba(233, 30, 99, 0.7)",
			               	pointBackgroundColor : "rgba(220,220,220,1)",
			               	pointBorderColor : "#fff",
			               	pointHoverBackgroundColor : "#fff",
			               	pointHoverBorderColor : "rgba(220,220,220,1)",
			                data: [20, 42, 60, 78, 88, 65, 90]
			            },
			            {
			                label: "Last week",
			                fillColor: "rgba(151,187,205,0.2)",
			                strokeColor: "rgba(151,187,205,1)",
			                pointColor: "rgba(151,187,205,1)",
			                pointStrokeColor: "#fff",
			                pointHighlightFill: "#fff",
			                pointHighlightStroke: "rgba(151,187,205,1)",
			                data: [28, 48, 40, 19, 86, 27, 90]
			            }
			        ]
			    },
			    options: {
			        responsive: true
			    }
			});

			//line
			var ctxL3 = document.getElementById("lineChart3").getContext('2d');
			var myLineChart3 = new Chart(ctxL3, {
			    type: 'line',
			    data: {
			        labels: ["January", "February", "March", "April", "May", "June", "July"],
			        datasets: [
			            {
			                label: "My First dataset",
			               	backgroundColor : "rgb(213,0,249, 0.4)",
			               	borderColor : "rgba(233, 30, 99, 0.7)",
			               	pointBackgroundColor : "rgba(220,220,220,1)",
			               	pointBorderColor : "#fff",
			               	pointHoverBackgroundColor : "#fff",
			               	pointHoverBorderColor : "rgba(220,220,220,1)",
			                data: [20, 59, 80, 81, 56, 55, 40]
			            },
			            {
			                label: "My Second dataset",
			                fillColor: "rgba(151,187,205,0.2)",
			                strokeColor: "rgba(151,187,205,1)",
			                pointColor: "rgba(151,187,205,1)",
			                pointStrokeColor: "#fff",
			                pointHighlightFill: "#fff",
			                pointHighlightStroke: "rgba(151,187,205,1)",
			                data: [28, 48, 40, 19, 86, 27, 90]
			            }
			        ]
			    },
			    options: {
			        responsive: true
			    }
			});

			//line
			var ctxL4 = document.getElementById("lineChart4").getContext('2d');
			var myLineChart4 = new Chart(ctxL4, {
			    type: 'line',
			    data: {
			        labels: ["January", "February", "March", "April", "May", "June", "July"],
			        datasets: [
			            {
			                label: "My First dataset",
			               	backgroundColor : "rgb(213,0,249, 0.4)",
			               	borderColor : "rgba(233, 30, 99, 0.7)",
			               	pointBackgroundColor : "rgba(220,220,220,1)",
			               	pointBorderColor : "#fff",
			               	pointHoverBackgroundColor : "#fff",
			               	pointHoverBorderColor : "rgba(220,220,220,1)",
			                data: [40, 59, 80, 81, 56, 55, 40]
			            },
			            {
			                label: "My Second dataset",
			                fillColor: "rgba(151,187,205,0.2)",
			                strokeColor: "rgba(151,187,205,1)",
			                pointColor: "rgba(151,187,205,1)",
			                pointStrokeColor: "#fff",
			                pointHighlightFill: "#fff",
			                pointHighlightStroke: "rgba(151,187,205,1)",
			                data: [28, 48, 40, 19, 86, 27, 90]
			            }
			        ]
			    },
			    options: {
			        responsive: true
			    }
			});

		});
	</script>
@append